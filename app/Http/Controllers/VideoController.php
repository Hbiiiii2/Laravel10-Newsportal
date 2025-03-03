<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VideoController extends Controller
{
    public function index()
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }
        $videos = Video::paginate(10);
        return view('app.video.index', compact('videos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required',
        ]);

        // Format URL YouTube menjadi format embed
        $url = $request->url;
        if (strpos($url, 'watch?v=') !== false) {
            $videoId = explode('watch?v=', $url)[1];
            $validatedData['url'] = 'https://www.youtube.com/embed/' . $videoId;
        } elseif (strpos($url, 'youtu.be/') !== false) {
            $videoId = explode('youtu.be/', $url)[1];
            $validatedData['url'] = 'https://www.youtube.com/embed/' . $videoId;
        }

        $video = Video::create($validatedData);
        return redirect()->route('videos.index')->with('success', 'Video berhasil ditambahkan');
    }
    public function destroy($id)
    {
        // Cek apakah user memiliki akses admin
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus video.');
        }

        try {
            // Cari video berdasarkan ID
            $video = Video::findOrFail($id);

            // Hapus video
            $video->delete();

            return redirect()->route('videos.index')
                ->with('success', 'Video berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('videos.index')
                ->with('error', 'Gagal menghapus video. Silakan coba lagi.');
        }
    }
}
