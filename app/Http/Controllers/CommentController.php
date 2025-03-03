<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $comments = Comment::latest()->paginate(10);
        return view('app.comments.index', compact('comments'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => [
                'required',
                'min:10',
                'max:500',
            ],
        ]);

        $validated['email'] = auth()->user()->email;
        $validated['name'] = auth()->user()->name;

        $post = Post::where('slug', $request->post_slug)->firstOrFail();
        $validated['post_id'] = $post->id;

        Comment::create($validated);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
