@extends('layouts.home')

@section('content')
    <main>
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Header Kategori -->
                        <div class="category-header mb-4">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-3">
                                    <div class="section-tittle">
                                        <h3 class="fw-bold">Kategori Berita</h3>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="category-tabs">
                                        <nav>
                                            <div class="nav nav-tabs custom-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                    href="#nav-home" role="tab" aria-selected="true">Semua</a>
                                                @foreach ($categories as $category)
                                                    <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab"
                                                        data-toggle="tab" href="#nav-{{ $category->id }}" role="tab"
                                                        aria-selected="false">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konten Tab as -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Tab Semua Berita -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel">
                                <div class="row">
                                    @foreach ($allNews as $news)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="news-card mb-4">
                                                <div class="news-img">
                                                    <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                                </div>
                                                <div class="news-content p-3">
                                                    <div class="news-meta mb-2">
                                                        <span class="category-badge">{{ $news->category->name }}</span>
                                                        <span
                                                            class="date-badge">{{ $news->created_at->format('d F Y') }}</span>
                                                    </div>
                                                    <h5 class="news-title">
                                                        <a
                                                            href="{{ route('posts.show', $news->slug) }}">{{ $news->title }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->
                                <div class="pagination-wrapper mt-4 mb-5">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            {{ $allNews->links() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <!-- Tab Kategori -->
                            @foreach ($categories as $category)
                                <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel">
                                    <div class="row">
                                        @forelse($category->posts as $news)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="news-card mb-4">
                                                    <div class="news-img">
                                                        <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                                    </div>
                                                    <div class="news-content p-3">
                                                        <div class="news-meta mb-2">
                                                            <span class="category-badge">{{ $category->name }}</span>
                                                            <span
                                                                class="date-badge">{{ $news->created_at->format('d F Y') }}</span>
                                                        </div>
                                                        <h5 class="news-title">
                                                            <a
                                                                href="{{ route('posts.show', $news->slug) }}">{{ $news->title }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <div class="empty-state">
                                                    <i class="fas fa-newspaper mb-3"
                                                        style="font-size: 48px; color: #ddd;"></i>
                                                    <h5>Belum ada berita dalam kategori ini</h5>
                                                    <p class="text-muted">Nantikan update berita terbaru dari kami</p>
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
                        <div class="sidebar-wrapper">
                            <!-- Social Media Section -->
                            <div class="social-section mb-4">
                                <h3 class="sidebar-title mb-3">Ikuti Kami</h3>
                                <div class="social-links">
                                    <a href="#" class="social-link facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="count">2,150 Pengikut</span>
                                    </a>
                                    <a href="#" class="social-link twitter">
                                        <i class="fab fa-twitter"></i>
                                        <span class="count">8,045 Pengikut</span>
                                    </a>
                                    <a href="#" class="social-link instagram">
                                        <i class="fab fa-instagram"></i>
                                        <span class="count">8,045 Pengikut</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Advertisement -->
                            <div class="advertisement">
                                <img src="{{ asset('home/img/news/news_card.jpg') }}" alt="Advertisement"
                                    class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            /* Tab Styling */
            .custom-tabs {
                border: none;
                margin-bottom: 20px;
            }

            .custom-tabs .nav-link {
                border: none;
                padding: 8px 16px;
                margin-right: 8px;
                border-radius: 20px;
                color: #666;
                font-size: 14px;
                transition: all 0.3s ease;
            }

            .custom-tabs .nav-link:hover {
                background-color: #f8f9fa;
            }

            .custom-tabs .nav-link.active {
                background-color: #dc3545;
                color: white;
            }

            /* News Card Styling */
            .news-card {
                background: white;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s;
            }

            .news-card:hover {
                transform: translateY(-5px);
            }

            .news-img {
                position: relative;
                padding-top: 60%;
            }

            .news-img img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .news-meta {
                display: flex;
                gap: 10px;
                align-items: center;
            }

            .category-badge {
                background: #dc3545;
                color: white;
                padding: 4px 12px;
                border-radius: 15px;
                font-size: 12px;
            }

            .date-badge {
                color: #666;
                font-size: 12px;
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
            .sidebar-wrapper {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .sidebar-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .social-links {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .social-link {
                display: flex;
                align-items: center;
                padding: 12px;
                border-radius: 8px;
                color: white;
                text-decoration: none;
                transition: opacity 0.2s;
            }

            .social-link:hover {
                opacity: 0.9;
            }

            .social-link i {
                margin-right: 10px;
                font-size: 18px;
            }

            .facebook {
                background: #3b5998;
            }

            .twitter {
                background: #1da1f2;
            }

            .instagram {
                background: #e1306c;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .custom-tabs {
                    overflow-x: auto;
                    white-space: nowrap;
                    -webkit-overflow-scrolling: touch;
                }

                .custom-tabs::-webkit-scrollbar {
                    display: none;
                }

                .news-card {
                    margin-bottom: 20px;
                }
            }
        </style>
    </main>
@endsection
