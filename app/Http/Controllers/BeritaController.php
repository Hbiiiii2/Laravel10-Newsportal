<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian

        // Lakukan pencarian berdasarkan judul
        $results = Post::where('title', 'like', "%$query%")->paginate(10);

        return view('home/search', compact('results', 'query'));
    }
}