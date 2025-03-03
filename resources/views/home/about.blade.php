@extends('layouts.home')

@section('content')
<main>
    <!-- About Us Start -->
    <div class="about-area">
        <div class="container">

            <!-- Main Content -->
            <div class="row">
                <!-- About Content -->
                <div class="col-lg-8">
                    <div class="about-right mb-90 mt-50">
                        <div class="about-img">
                            <img src="{{ $about->image }}" alt="About Us" class="img-fluid rounded shadow-sm">
                        </div>
                        <div class="section-title mb-30 pt-30">
                            <h3 class="text-primary">{{ $about->title }}</h3>
                        </div>
                        <div class="about-prea">
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Follow Us Section -->
                    <div class="section-title mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            @foreach(['fb' => 'Facebook', 'tw' => 'Twitter', 'ins' => 'Instagram', 'yo' => 'YouTube'] as $key => $value)
                                <div class="follow-us d-flex align-items-center mb-3">
                                    <div class="follow-social mr-3">
                                        <a href="#"><img src="{{ asset("home/img/news/icon-{$key}.png") }}" alt="{{ $value }}" class="img-fluid"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>{{ $value }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- New Poster Section -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="{{ asset('home/img/news/news_card.jpg') }}" alt="New Poster" class="img-fluid rounded shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->
</main>
@endsection

@push('styles')
<style>
    .about-area {
        background: #f9f9f9;
        padding: 60px 0;
    }
    .trending-title {
        background: #ff4b5c;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .about-img img {
        transition: transform 0.3s;
    }
    .about-img img:hover {
        transform: scale(1.05);
    }
    .follow-us {
        transition: background-color 0.3s;
    }
    .follow-us:hover {
        background-color: #f1f1f1;
    }
    .follow-social img {
        width: 40px;
        height: 40px;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        $('#js-news').ticker();
    });
</script>
@endpush
