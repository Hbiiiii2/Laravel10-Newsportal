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
                                <p class="card-text mt-3" style="">{!! $post->body !!}</p>
                            </div>
                        </div>
                    
                        <div class="social-share pt-30">
                            <div class="section-title d-flex align-items-center">
                                <h3 class="mr-20 mb-0">Share:</h3>
                                <ul class="d-flex list-unstyled mb-0">
                                    <!-- Facebook Share -->
                                    <li class="mr-2">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($post->title) }}" 
                                           target="_blank" 
                                           class="share-link"
                                           title="Share on Facebook">
                                            <div class="social-icon facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <!-- WhatsApp Share -->
                                    <li class="mr-2">
                                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" 
                                           target="_blank" 
                                           class="share-link"
                                           title="Share on WhatsApp">
                                            <div class="social-icon whatsapp">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                        </a>
                                    </li>
                        
                                    <!-- Instagram Share -->
                                    <li class="mr-2">
                                        <a href="https://www.instagram.com/sharer.php?u={{ urlencode(url()->current()) }}" 
                                           target="_blank" 
                                           class="share-link"
                                           title="Share on Instagram">
                                            <div class="social-icon instagram">
                                                <i class="fab fa-instagram"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <style>
                        .social-share {
                            background: #fff;
                            border-radius: 8px;
                            padding: 15px 0;
                        }
                        
                        .social-share .section-title {
                            margin-bottom: 0;
                        }
                        
                        .social-share h3 {
                            color: #333;
                            font-size: 18px;
                            font-weight: 600;
                        }
                        
                        .social-icon {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #fff;
                            transition: all 0.3s ease;
                        }
                        
                        .social-icon i {
                            font-size: 16px;
                        }
                        
                        /* Facebook */
                        .social-icon.facebook {
                            background: #1877f2;
                            box-shadow: 0 4px 12px rgba(24, 119, 242, 0.2);
                        }
                        
                        .social-icon.facebook:hover {
                            background: #0d6efd;
                            transform: translateY(-2px);
                        }
                        
                        /* WhatsApp */
                        .social-icon.whatsapp {
                            background: #25d366;
                            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.2);
                        }
                        
                        .social-icon.whatsapp:hover {
                            background: #20ba5a;
                            transform: translateY(-2px);
                        }
                        
                        /* Instagram */
                        .social-icon.instagram {
                            background: #e4405f;
                            box-shadow: 0 4px 12px rgba(228, 64, 95, 0.2);
                        }
                        
                        .social-icon.instagram:hover {
                            background: #d63154;
                            transform: translateY(-2px);
                        }
                        
                        /* Shared hover effects */
                        .share-link {
                            display: block;
                            position: relative;
                        }
                        
                        .share-link:hover {
                            text-decoration: none;
                        }
                        
                        .share-link:active .social-icon {
                            transform: translateY(0);
                        }
                        
                        /* Responsive adjustments */
                        @media (max-width: 576px) {
                            .social-share .section-title {
                                flex-direction: column;
                                align-items: flex-start;
                            }
                        
                            .social-share h3 {
                                margin-bottom: 10px;
                            }
                        
                            .social-icon {
                                width: 35px;
                                height: 35px;
                            }
                        
                            .social-icon i {
                                font-size: 14px;
                            }
                        }
                        </style>
                        
                        @push('scripts')
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const shareLinks = document.querySelectorAll('.share-link');
                            
                            shareLinks.forEach(link => {
                                link.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    
                                    const width = 600;
                                    const height = 400;
                                    const left = (window.innerWidth - width) / 2;
                                    const top = (window.innerHeight - height) / 2;
                                    
                                    window.open(
                                        this.href,
                                        'share',
                                        `width=${width},height=${height},top=${top},left=${left},toolbar=0,status=0,menubar=0`
                                    );
                                });
                            });
                        });
                        </script>
                        @endpush
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
