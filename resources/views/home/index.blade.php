@extends('layouts.home')

@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        @foreach ($breakingNews as $news)
                                            <li class="news-item">{{ $news->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- First Post -->
                            @if ($firstPost)
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ asset($firstPost->image) }}" alt="{{ $firstPost->title }}">
                                        <div class="trend-top-cap">
                                            <span>{{ $firstPost->category->name }}</span>
                                            <h2><a
                                                    href="{{ route('posts.show', $firstPost->slug) }}">{{ $firstPost->title }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Second Post -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($secondPosts as $secondPost)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="{{ asset($secondPost->image) }}"
                                                        alt="{{ $secondPost->title }}"
                                                        style="width: 100%; object-fit: cover; height: 100px;">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1">{{ $secondPost->category->name }}</span>
                                                    <h4><a
                                                            href="{{ route('posts.show', $secondPost->slug) }}">{{ $secondPost->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Thirt Post -->
                        <div class="col-lg-4">
                            @foreach ($thirdPosts as $thirdPost)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img src="{{ asset($thirdPost->image) }}" alt="{{ $thirdPost->title }}"
                                            width="150" height="100">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">{{ $thirdPost->category->name }}</span>
                                        <h4><a
                                                href="{{ route('posts.show', $thirdPost->slug) }}">{{ $thirdPost->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->

        <!-- Whats New Start -->
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
                                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                                    aria-selected="true">Semua</a>
                                                @foreach ($categories as $category)
                                                    <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab"
                                                        data-toggle="tab" href="#nav-{{ $category->id }}" role="tab"
                                                        aria-controls="nav-{{ $category->id }}"
                                                        aria-selected="false">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konten Tab -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Tab Semua Berita -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    @foreach ($allNews->take(12) as $news)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="news-card mb-4">
                                                <div class="news-img">
                                                    <img src="{{ $news->image }}" alt="{{ $news->title }}"
                                                        class="img-fluid">
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
                            </div>

                            <!-- Tab Kategori -->
                            @foreach ($categories as $category)
                                <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel"
                                    aria-labelledby="nav-{{ $category->id }}-tab">
                                    <div class="row">
                                        @foreach ($category->posts->take(100) as $news)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="news-card mb-4">
                                                    <div class="news-img">
                                                        <img src="{{ $news->image }}" alt="{{ $news->title }}"
                                                            class="img-fluid">
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
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Ikuti Kami</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="home/img/news/icon-fb.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>2,150</span>
                                        <p>Pengikut</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="home/img/news/icon-tw.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Pengikut</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="home/img/news/icon-ins.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Pegnikut</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="home/img/news/icon-yo.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Pengikut</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block">
                            <img src="{{ asset('home/img/news/news_card.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->



    
        <!-- Start Youtube -->

        @if (count($videos) >= 6)
            <div class="youtube-area video-padding py-5">
                <div class="container">
                    <!-- Judul Seksi -->
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="section-tittle">
                                <h3 class="fw-bold">Video Terkini</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Video Utama -->
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="main-video-container">
                                <div class="video-items text-center">
                                    <iframe class="main-video" src="{{ $videos->first()->url }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <h4 class="mt-3 text-center">{{ $videos->first()->title }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Video Thumbnail Grid -->
                    <div class="row">
                        @foreach ($videos->skip(1)->take(6) as $video)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="video-thumbnail-container">
                                    <div class="video-thumbnail">
                                        <iframe src="{{ $video->url }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <h6 class="mt-2">{{ $video->title }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tambahkan CSS berikut di bagian head atau file CSS Anda -->
            <style>
                .youtube-area {
                    background-color: #f8f9fa;
                }

                .main-video-container {
                    width: 100%;
                    max-width: 900px;
                    margin: 0 auto;
                }

                .main-video {
                    width: 100%;
                    height: 500px;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .video-thumbnail-container {
                    background: white;
                    padding: 10px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                    transition: transform 0.2s;
                }

                .video-thumbnail-container:hover {
                    transform: translateY(-5px);
                }

                .video-thumbnail {
                    position: relative;
                    width: 100%;
                    padding-top: 56.25%;
                    /* Aspek rasio 16:9 */
                }

                .video-thumbnail iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    border-radius: 6px;
                }

                .video-thumbnail-container h6 {
                    margin: 10px 0;
                    font-size: 14px;
                    color: #333;
                    line-height: 1.4;
                    height: 40px;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                }

                @media (max-width: 768px) {
                    .main-video {
                        height: 300px;
                    }
                }
            </style>
        @else
            <!-- Tampilan ketika tidak ada video yang cukup -->
            <div class="weekly2-news-area weekly2-pading">
                <div class="container">
                    <div class="weekly2-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="d-flex flex-column flex-lg-row justify-content-center align-items-center text-center py-5">
                                    <div>
                                        <img src="https://i.pinimg.com/originals/0e/c0/db/0ec0dbf1e9a008acb9955d3246970e15.gif"
                                            alt="" width="150" height="150" class="mb-4">
                                        <h3 class="mb-3">Video belum tersedia</h3>
                                        <p class="text-muted">
                                            Segera kembali dengan video populer terbaru. Nantikan update selanjutnya!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- End Start youtube -->

    </main>
@endsection
