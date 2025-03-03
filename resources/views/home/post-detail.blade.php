@extends('layouts.home')

@section('content')
<main>
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post Details -->
                    <div class="about-right mb-90 mt-50">
                        <div class="card mb-3 shadow-sm">
                            <img class="card-img-top" src="{{ $post->image }}" alt="Post Image" style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <div class="d-flex align-items-center mb-2 small">
                                    <i class="fas fa-user mr-2"></i>
                                    <p class="card-text mb-0"><span class="font-weight-bold">Author:</span> {{ $post->user->name }}</p>
                                </div>
                                <div class="d-flex align-items-center mb-2 small">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <p class="card-text mb-0"><span class="font-weight-bold">Created:</span> {{ $post->created_at->format('M d, Y') }}</p>
                                </div>
                                @if($post->published_at)
                                    <div class="d-flex align-items-center mb-2 small">
                                        <i class="fas fa-clock mr-2"></i>
                                        <p class="card-text mb-0"><span class="font-weight-bold">Published:</span> {{ $post->published_at->diffForHumans() }}</p>
                                    </div>
                                @endif
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-solid fa-list mr-2"></i>
                                    <p class="card-text mb-0"><span class="font-weight-bold">Category:</span> {{ $post->category->name }}</p>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-eye mr-2"></i>
                                    <p class="card-text mb-0"><span class="font-weight-bold">Views:</span> {{ $post->views }}</p>
                                </div>
                                <p class="card-text mt-3">{!! $post->body !!}</p>
                            </div>
                        </div>
                        <div class="social-share pt-30">
                            <div class="section-title">
                                <h3 class="mr-20">Share:</h3>
                                <ul class="d-flex list-unstyled">
                                    <li class="mr-3"><a href="#"><img src="{{ asset('home/img/news/icon-ins.png') }}" alt="Instagram"></a></li>
                                    <li class="mr-3"><a href="#"><img src="{{ asset('home/img/news/icon-fb.png') }}" alt="Facebook"></a></li>
                                    <li class="mr-3"><a href="#"><img src="{{ asset('home/img/news/icon-tw.png') }}" alt="Twitter"></a></li>
                                    <li class="mr-3"><a href="#"><img src="{{ asset('home/img/news/icon-yo.png') }}" alt="YouTube"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mb-50">
                        <h4 class="mb-4">Comments</h4>
                        @if($post->comments->isEmpty())
                            <p>Belum ada komentar</p>
                        @else
                            @foreach($post->comments as $comment)
                                <div class="comment mb-3 p-3 bg-light border">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user mr-2"></i>
                                        <p class="mb-0 font-weight-bold">{{ $comment->name }}</p>
                                    </div>
                                    <p class="mb-0" style="white-space: pre-wrap; word-wrap: break-word;">{{ $comment->content }}</p>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Comment Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            @auth
                                <form class="form-contact contact_form mb-80" action="{{ route('comments.store') }}" method="post" id="commentForm">
                                    @csrf

                                    <input type="hidden" name="post_slug" value="{{ $post->slug }}">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="9" placeholder="Enter Comment"></textarea>
                                                @error('content')
                                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" value="{{ auth()->user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" value="{{ auth()->user()->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <button type="button" class="btn btn-primary text-white rounded-pill px-4 py-2" data-toggle="modal" data-target="#loginModal">
                                        <i class="fas fa-sign-in-alt mr-2"></i>
                                        Login untuk Berdiskusi
                                    </button>
                                </div>
                            @endauth
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
                                        <a href="#"><img src="{{ asset("home/img/news/icon-{$key}.png") }}" alt="{{ $value }}"></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>{{ $value }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Advertisement -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="{{ asset('home/img/news/news_card.jpg') }}" alt="Advertisement">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('home/img/logo/logo-header.svg') }}" alt="Login Icon" class="img-fluid mb-3 mx-auto d-block" style="max-width: 100px;">
                <h5 class="mb-3">Login untuk Berdiskusi</h5>
                <form action="{{ route('login.submit') }}" method="post" id="login-form">
                    @csrf

                    <input type="hidden" name="post_slug" id="post_slug" value="{{ $post->slug }}">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary text-white rounded-pill px-4 py-3">Login</button>
                </form>
                <hr>
                <a href="{{ route('login.google.slug', ['post_slug' => $post->slug]) }}" class="btn btn-primary text-white rounded-pill px-4 py-3">
                    <i class="fab fa-google mr-2"></i>
                    Login dengan Google
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            // Initialize Bootstrap modal
            $('#loginModal').modal({
                show: false
            });
        });
    </script>
@endpush

@endsection
