<?php

namespace App\Http\Controllers;

use App\Models\BreakingNews;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BreakingNewsController extends Controller
{
    public function index(Request $request, BreakingNews $breakingNews)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $currentUser = auth()->user();
        $postsQuery = Post::orderBy('updated_at', 'desc');

        if ($currentUser->role->name != 'admin') {
            $postsQuery->where('user_id', $currentUser->id);
        }

        // Filter logic
        $filter = $request->input('filter');
        if ($filter == 'in_breaking_news') {
            $postsQuery->whereHas('breakingNews');
        } elseif ($filter == 'not_in_breaking_news') {
            $postsQuery->whereDoesntHave('breakingNews');
        }

        $posts = $postsQuery->paginate(5);

        return view('app.breaking-news.index', compact('posts', 'breakingNews', 'filter'))->with('i', ($request->input('page', 1) - 1) * 5);
    }



    public function store(Request $request)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }

        $request->validate([
            'post_id' => 'required',
        ]);

        $post = Post::where('id', $request->post_id)->firstOrFail();

        $breakingNews = new BreakingNews();
        $breakingNews->post_id = $post->id;
        $breakingNews->save();

        return redirect()->route('breaking-news.index')->with('success', 'Berita Terbit');
    }


    public function destroy(Request $request, BreakingNews $breakingNews)
    {
        if (Gate::denies('admin-fitur')) {
            abort(403, 'Lagi Mencari APA Bro!.');
        }
        
        $breakingNews->where('post_id', $request->id)->delete();

        return redirect()->route('breaking-news.index')->with('success', 'Berita Dihapus');
    }

}
