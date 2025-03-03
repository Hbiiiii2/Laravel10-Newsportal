<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function home()
    {
        $firstPost = Post::orderBy('created_at', 'desc')->first();

        $secondPosts = Post::where('id', '!=', $firstPost->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $excludedIds = $secondPosts->pluck('id')->toArray();
        array_push($excludedIds, $firstPost->id);

        $thirdPosts = Post::whereNotIn('id', $excludedIds)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();


        $categories = Category::latest()->get();
        $allNews = $categories->pluck('posts')->flatten()->sortByDesc('created_at')->values();
        $hotnews = $categories->map(fn($category) => $category->posts)
            ->flatten(1) // Flatten satu level
            ->sortByDesc('created_at')
            ->values();

        // dd($categories->pluck('posts'));

        $latest_posts = Post::latest()->take(6)->get();

        $breakingNews = Post::whereHas('breakingNews')->get();

        $mostViews = Post::orderBy('views', 'desc')->take(6)->get();


        $postsWithMostComments = Post::has('comments')
            ->withCount('comments as comments_count')
            ->orderBy('comments_count', 'desc')
            ->take(6)
            ->get();


        $videos = Video::latest()->get();

        return view('home.index', [
            'firstPost' => $firstPost,
            'secondPosts' => $secondPosts,
            'thirdPosts' => $thirdPosts,
            'categories' => $categories,
            'allNews' => $allNews,
            'hotnews' => $hotnews,
            'latest_posts' => $latest_posts,
            'breakingNews' => $breakingNews,
            'mostViews' => $mostViews,
            'postsWithMostComments' => $postsWithMostComments,
            'videos' => $videos,
        ]);
    }

    public function detail($slug)
    {
        $breakingNews = Post::whereHas('breakingNews')->get();
        $post = Post::where('slug', $slug)->first();
        $latest_posts = Post::latest()->take(6)->get();

        if ($post) {
            $post->increment('views');
        }

        return view('home.post-detail', [
            'post' => $post,
            'breakingNews' => $breakingNews,
            'latest_posts' => $latest_posts,
        ]);
    }

    public function about()
    {
        $about = About::first();
        $breakingNews = Post::whereHas('breakingNews')->get();
        $latest_posts = Post::latest()->take(6)->get();


        return view('home.about', [
            'about' => $about,
            'breakingNews' => $breakingNews,
            'latest_posts' => $latest_posts
        ]);
    }

    public function categories()
    {
        // Paginasi untuk masing-masing kategori
        $categories = Category::with(['posts' => function ($query) {
            $query->latest()->take(100); // Ambil 6 postingan terbaru
        }])->get();

        // Paginasi untuk semua postingan
        $allNews = Post::latest()->paginate(6);

        $latest_posts = Post::latest()->take(6)->get();
        $breakingNews = Post::whereHas('breakingNews')->get();

        return view('home.category', [
            'categories' => $categories,
            'allNews' => $allNews,
            'breakingNews' => $breakingNews,
            'latest_posts' => $latest_posts,
        ]);
    }
}
