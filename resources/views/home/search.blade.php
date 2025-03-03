@extends('layouts.home')

@section('content')
<main>
    <section class="search-results-area pt-50 pb-20">
        <div class="container">
            <!-- Search Header -->
            <div class="search-header text-center mb-5 mt-3">
                <h2 class="section-title mb-3">Hasil Pencarian</h2>
                <div class="search-info">
                    <span class="result-count">{{ $posts->total() }} hasil ditemukan</span>
                    <span class="search-query">untuk "{{ $query }}"</span>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="search-results">
                        <div class="row g-4">
                            @forelse($posts as $post)
                                <div class="col-md-6">
                                    <article class="post-card">
                                        <div class="post-thumb">
                                            <img src="{{ $post->image }}" 
                                                 alt="{{ $post->title }}"
                                                 class="img-fluid lazy"
                                                 loading="lazy">
                                            <div class="post-category">
                                                <span>{{ $post->category->name }}</span>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta">
                                                <span class="post-date">
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{ $post->created_at->format('d F Y') }}
                                                </span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="no-results">
                                        <div class="no-results-icon">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <h3>Tidak ada hasil ditemukan</h3>
                                        <p>Coba kata kunci lain atau periksa ejaan Anda</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        @if($posts->total() > 0)
                            <div class="pagination-wrapper">
                                {{ $posts->appends(['query' => $query])->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget latest-posts">
                            <h3 class="widget-title">Berita Terbaru</h3>
                            <div class="widget-content">
                                @foreach($latest_posts as $latest)
                                    <div class="latest-post-item">
                                        <div class="post-thumb">
                                            <img src="{{ $latest->image }}" 
                                                 alt="{{ $latest->title }}"
                                                 loading="lazy">
                                        </div>
                                        <div class="post-info">
                                            <h4 class="post-title">
                                                <a href="{{ route('posts.show', $latest->slug) }}">
                                                    {{ Str::limit($latest->title, 50) }}
                                                </a>
                                            </h4>
                                            <span class="post-date">
                                                {{ $latest->created_at->format('d F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* General Styles */
.search-results-area {
    background-color: #f8f9fa;
}

/* Search Header */
.search-header {
    padding: 30px 0;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 30px;
}

.section-title {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.search-info {
    color: #666;
    font-size: 16px;
}

.search-query {
    color: #dc3545;
    font-weight: 600;
}

/* Post Card */
.post-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.post-card:hover {
    transform: translateY(-5px);
}

.post-thumb {
    position: relative;
    padding-top: 65%;
    overflow: hidden;
}

.post-thumb img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-category {
    position: absolute;
    top: 15px;
    left: 15px;
}

.post-category span {
    background: #dc3545;
    color: #fff;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.post-content {
    padding: 20px;
}

.post-meta {
    margin-bottom: 10px;
    color: #666;
    font-size: 14px;
}

.post-title {
    font-size: 18px;
    line-height: 1.4;
    margin-bottom: 0;
}

.post-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.2s;
}

.post-title a:hover {
    color: #dc3545;
}

/* Sidebar */
.sidebar {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
}

.widget-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #eee;
}

.latest-post-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.latest-post-item:last-child {
    border-bottom: none;
}

.latest-post-item .post-thumb {
    width: 80px;
    height: 60px;
    padding-top: 0;
    margin-right: 15px;
    flex-shrink: 0;
}

.latest-post-item .post-info h4 {
    font-size: 14px;
    margin-bottom: 5px;
}

.latest-post-item .post-date {
    font-size: 12px;
    color: #666;
}

/* No Results */
.no-results {
    text-align: center;
    padding: 50px 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
}

.no-results-icon {
    font-size: 48px;
    color: #ddd;
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .search-header {
        padding: 20px;
    }

    .section-title {
        font-size: 24px;
    }

    .post-card {
        margin-bottom: 20px;
    }

    .sidebar {
        margin-top: 30px;
    }

    .post-title {
        font-size: 16px;
    }
}
</style>
@endsection