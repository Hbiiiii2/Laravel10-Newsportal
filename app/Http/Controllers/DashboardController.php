<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $chartData = $this->getChartData();
        $viewsData = (object)[
            'labels' => $chartData['labels'],
            'values' => $chartData['views']
        ];
    
        // Format data untuk chart kategori
        $categoryStats = $this->getCategoryStats();
        $categoryData = (object)[
            'labels' => array_column($categoryStats, 'name'),
            'values' => array_column($categoryStats, 'posts_count')
        ];
    
        $data = [
            'cardStats' => $this->getCardStats(),
            'viewsData' => $viewsData,
            'categoryData' => $categoryData,
            'popularPosts' => $this->getPopularPosts(),
            'recentPosts' => $this->getRecentPosts(),
            'categoryStats' => $categoryStats
        ];
    
        return view('app.dashboard.index', $data);
    }

    private function getCardStats()
    {
        $now = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        // Total Views
        $currentViews = Post::where('created_at', '>=', $lastMonth)->sum('views');
        $previousViews = Post::where('created_at', '<', $lastMonth)->sum('views');
        $viewsGrowth = $previousViews > 0 
            ? (($currentViews - $previousViews) / $previousViews) * 100 
            : 100;

        // Posts Count
        $totalPosts = Post::count();
        $newPosts = Post::where('created_at', '>=', $lastMonth)->count();
        $postsGrowth = ($totalPosts - $newPosts > 0) 
            ? ($newPosts / ($totalPosts - $newPosts)) * 100 
            : 100;

        return [
            'total_views' => [
                'count' => number_format($currentViews),
                'growth' => round($viewsGrowth, 1),
                'label' => 'Total Views',
                'icon' => 'mdi-eye'
            ],
            'total_posts' => [
                'count' => number_format($totalPosts),
                'growth' => round($postsGrowth, 1),
                'label' => 'Total Posts',
                'icon' => 'mdi-file-document'
            ],
            'categories' => [
                'count' => Category::count(),
                'label' => 'Categories',
                'icon' => 'mdi-folder'
            ],
            'new_posts' => [
                'count' => $newPosts,
                'label' => 'New Posts This Month',
                'icon' => 'mdi-plus-circle'
            ]
        ];
    }

    private function getChartData()
    {
        $dates = [];
        $viewsData = [];
        $postsData = [];

        // Data untuk 30 hari terakhir
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = Carbon::now()->subDays($i)->format('d M');

            // Views per day
            $views = Post::whereDate('created_at', $date)->sum('views');
            $viewsData[] = $views;

            // Posts per day
            $posts = Post::whereDate('created_at', $date)->count();
            $postsData[] = $posts;
        }

        return [
            'labels' => $dates,
            'views' => $viewsData,
            'posts' => $postsData
        ];
    }

    private function getPopularPosts()
    {
        $posts = Post::with(['category', 'user'])
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        $formattedPosts = [];
        foreach ($posts as $post) {
            $formattedPosts[] = [
                'title' => $post->title,
                'slug' => $post->slug,
                'views' => number_format($post->views),
                'category' => $post->category ? $post->category->name : 'Uncategorized',
                'author' => $post->user ? $post->user->name : 'Anonymous',
                'date' => $post->created_at->format('d M Y'),
                'image' => $post->image ?? 'default.jpg'
            ];
        }

        return $formattedPosts;
    }

    private function getRecentPosts()
    {
        $posts = Post::with(['category', 'user'])
            ->latest()
            ->take(5)
            ->get();

        $formattedPosts = [];
        foreach ($posts as $post) {
            $formattedPosts[] = [
                'title' => $post->title,
                'slug' => $post->slug,
                'views' => number_format($post->views),
                'category' => $post->category ? $post->category->name : 'Uncategorized',
                'author' => $post->user ? $post->user->name : 'Anonymous',
                'date' => $post->created_at->format('d M Y'),
                'image' => $post->image ?? 'default.jpg'
            ];
        }

        return $formattedPosts;
    }

    private function getCategoryStats()
    {
        $categories = Category::withCount('posts')->get();
        $totalPosts = Post::count();

        $stats = [];
        foreach ($categories as $category) {
            $totalViews = Post::where('category_id', $category->id)->sum('views');
            $stats[] = [
                'name' => $category->name,
                'posts_count' => $category->posts_count,
                'views' => number_format($totalViews),
                'percentage' => $totalPosts > 0 
                    ? round(($category->posts_count / $totalPosts) * 100, 1)
                    : 0
            ];
        }

        return collect($stats)->sortByDesc('posts_count')->values()->all();
    }

    public function getPerformanceMetrics()
    {
        return [
            'total_views' => number_format(Post::sum('views')),
            'average_views_per_post' => round(Post::avg('views'), 2),
            'most_viewed_category' => $this->getMostViewedCategory(),
            'posting_trends' => $this->getPostingTrends()
        ];
    }

    private function getMostViewedCategory()
    {
        $categoryViews = DB::table('posts')
            ->select('categories.name', DB::raw('SUM(posts.views) as total_views'))
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('total_views')
            ->first();

        return $categoryViews ? [
            'name' => $categoryViews->name,
            'views' => number_format($categoryViews->total_views)
        ] : null;
    }

    private function getPostingTrends()
    {
        $lastMonth = Carbon::now()->subMonth();
        
        return [
            'this_month' => Post::where('created_at', '>=', $lastMonth)->count(),
            'last_month' => Post::whereBetween('created_at', [
                $lastMonth->copy()->subMonth(),
                $lastMonth
            ])->count(),
        ];
    }
}