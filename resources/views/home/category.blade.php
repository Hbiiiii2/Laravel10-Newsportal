@extends('layouts.home')

@section('content')
    <main>
        <section class="category-section">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <!-- Category Header -->
                        <div class="category-header">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="section-title">Kategori Berita</h3>
                            </div>

                            <!-- Category Tabs -->
                            <div class="category-tabs">
                                <nav>
                                    <div class="nav nav-tabs custom-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-selected="true">
                                            <i class="fas fa-globe"></i> Semua
                                        </a>
                                        @foreach ($categories as $category)
                                            <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab" data-toggle="tab"
                                                href="#nav-{{ $category->id }}" role="tab" aria-selected="false">
                                                <i class="fas fa-folder"></i> {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </nav>
                            </div>
                        </div>

                        <!-- Tab Contents -->
                        <div class="tab-content mt-4" id="nav-tabContent">
                            <!-- All News Tab -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel">
                                <div class="row g-4">
                                    @forelse($allNews as $news)
                                        <div class="col-md-6">
                                            <article class="news-card">
                                                <div class="news-img">
                                                    <img src="{{ $news->image }}" alt="{{ $news->title }}"
                                                        class="img-fluid" loading="lazy">
                                                    <div class="category-tag">
                                                        {{ $news->category->name }}
                                                    </div>
                                                </div>
                                                <div class="news-content">
                                                    <div class="news-meta">
                                                        <span class="date">
                                                            <i class="far fa-calendar-alt"></i>
                                                            {{ $news->created_at->format('d F Y') }}
                                                        </span>
                                                    </div>
                                                    <h4 class="news-title">
                                                        <a href="{{ route('posts.show', $news->slug) }}">
                                                            {{ $news->title }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </article>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="empty-state">
                                                <i class="fas fa-newspaper"></i>
                                                <h4>Belum ada berita</h4>
                                                <p>Nantikan update berita terbaru dari kami</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>

                                <!-- Pagination -->
                                @if ($allNews->hasPages())
                                    <div class="pagination-wrapper mt-4">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <!-- Previous Page -->
                                                <li class="page-item {{ $allNews->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $allNews->previousPageUrl() }}"
                                                        aria-label="Previous">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>

                                                <!-- Page Numbers -->
                                                @for ($i = 1; $i <= $allNews->lastPage(); $i++)
                                                    <li
                                                        class="page-item {{ $allNews->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $allNews->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <!-- Next Page -->
                                                <li class="page-item {{ !$allNews->hasMorePages() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $allNews->nextPageUrl() }}"
                                                        aria-label="Next">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                @endif

                            </div>

                            <!-- Category Tabs -->
                            @foreach ($categories as $category)
                                <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel">
                                    <div class="row g-4">
                                        @forelse($category->posts as $news)
                                            <div class="col-md-6">
                                                <article class="news-card">
                                                    <div class="news-img">
                                                        <img src="{{ $news->image }}" alt="{{ $news->title }}"
                                                            class="img-fluid" loading="lazy">
                                                        <div class="category-tag">
                                                            {{ $category->name }}
                                                        </div>
                                                    </div>
                                                    <div class="news-content">
                                                        <div class="news-meta">
                                                            <span class="date">
                                                                <i class="far fa-calendar-alt"></i>
                                                                {{ $news->created_at->format('d F Y') }}
                                                            </span>
                                                        </div>
                                                        <h4 class="news-title">
                                                            <a href="{{ route('posts.show', $news->slug) }}">
                                                                {{ $news->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </article>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="empty-state">
                                                    <i class="fas fa-newspaper"></i>
                                                    <h4>Belum ada berita dalam kategori ini</h4>
                                                    <p>Nantikan update berita terbaru dari kami</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- Social Media Links -->
                            <div class="widget social-widget">
                                <h4 class="widget-title">Ikuti Kami</h4>
                                <div class="social-links">
                                    <a href="#" class="social-link facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>2,150 Pengikut</span>
                                    </a>
                                    <a href="#" class="social-link instagram">
                                        <i class="fab fa-instagram"></i>
                                        <span>8,045 Pengikut</span>
                                    </a>
                                    <a href="#" class="social-link twitter">
                                        <i class="fab fa-twitter"></i>
                                        <span>8,045 Pengikut</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Advertisement -->
                            <div class="widget ad-widget">
                                <img src="{{ asset('home/img/news/news_card.jpg') }}" alt="Advertisement"
                                    class="img-fluid rounded">
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        /* Pagination Styling */
        .pagination {
            gap: 5px;
        }

        .page-item .page-link {
            border: none;
            padding: 8px 16px;
            color: #666;
            background-color: #fff;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .page-item .page-link:hover {
            background-color: #f8f9fa;
            color: #dc3545;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .page-item.active .page-link {
            background-color: #dc3545;
            color: white;
            border: none;
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);
        }

        .page-item.disabled .page-link {
            background-color: #f8f9fa;
            color: #999;
            cursor: not-allowed;
        }

        /* Hover Animation */
        .page-link:active {
            transform: scale(0.95);
        }

        @media (max-width: 768px) {
            .page-item .page-link {
                padding: 6px 12px;
                font-size: 13px;
            }
        }

        /* Section Styling */
        .category-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 0;
        }

        /* Tab Styling */
        .custom-tabs {
            border: none;
            display: flex;
            gap: 10px;
            padding: 5px 0;
            margin-bottom: 0;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .custom-tabs::-webkit-scrollbar {
            display: none;
        }

        .custom-tabs .nav-link {
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
            background-color: #fff;
            border: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .custom-tabs .nav-link i {
            font-size: 12px;
        }

        .custom-tabs .nav-link:hover {
            background-color: #fff;
            border-color: #dc3545;
            color: #dc3545;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.1);
        }

        .custom-tabs .nav-link.active {
            background-color: #dc3545;
            color: white;
            border-color: #dc3545;
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);
        }

        /* News Card Styling */
        .news-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-img {
            position: relative;
            padding-top: 65%;
        }

        .news-img img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #dc3545;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .news-content {
            padding: 20px;
        }

        .news-meta {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .news-meta i {
            margin-right: 5px;
        }

        .news-title {
            font-size: 16px;
            line-height: 1.4;
            margin: 0;
        }

        .news-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.2s;
        }

        .news-title a:hover {
            color: #dc3545;
        }

        /* Sidebar Styling */
        .sidebar {
            position: sticky;
            top: 20px;
        }

        .widget {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .widget-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .social-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-link {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .social-link:hover {
            opacity: 0.9;
            color: #fff;
        }

        .social-link i {
            margin-right: 10px;
            font-size: 18px;
        }

        .facebook {
            background: #3b5998;
        }

        .instagram {
            background: #e1306c;
        }

        .twitter {
            background: #1da1f2;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .empty-state i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: #333;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #666;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .category-section {
                padding: 30px 0;
            }

            .section-title {
                font-size: 20px;
            }

            .custom-tabs .nav-link {
                padding: 8px 16px;
                font-size: 13px;
            }

            .news-card {
                margin-bottom: 20px;
            }

            .widget {
                margin-top: 30px;
            }
        }
    </style>
@endsection
