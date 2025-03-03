<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><a href="https://www.instagram.com/sobattangsel/" target="_blank"><i
                                                class="fab fa-instagram"></i></a> sobattangsel </li>
                                    {{-- <li><a href="https://api.whatsapp.com/send?phone=6282338520959" target="_blank"><i class="fab fa-whatsapp"></i></a> +62 823 3852 0959</li> --}}
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    {{-- <li><a href="https://api.whatsapp.com/send?phone=6282338502959" target="_blank" ><i style="color: #fff;" class="fab fa-whatsapp"></i></a></li> --}}
                                    <li><a href="https://www.instagram.com/sobattangsel/" target="_blank"><i
                                                style="color: #fff;" class="fab fa-instagram"></i></a></li>
                                    {{-- <li><a href="https://t.me/irhamkaraman" target="_blank" ><i style="color: #fff;" class="fab fa-telegram"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('home/img/logo/logo-header.svg') }}"
                                        style="width: 150px;" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('home/img/hero/header_card.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="/"><img src="{{ asset('home/img/logo/logo-header.svg') }}"
                                        style="width: 200px;" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Beranda</a></li>
                                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                                        <li><a href="{{ route('categories') }}">Kategori</a></li>

                                        @auth
                                            {{-- <li>
                                                    <a href="{{ route('dashboard') }}">
                                                        <i class="fas fa-sign-in-alt"></i> Dashboard
                                                    </a>
                                                </li> --}}
                                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn p-1"
                                                    style="background: none; border: none; color: inherit; font: inherit;">
                                                    <i class="fas fa-sign-out-alt" style="font-size: 14px"></i>
                                                    <span style="font-size: 14px;">Logout</span>
                                                </button>
                                            </form>
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <i class="fas fa-sign-in-alt"></i> Login
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box search-btn">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input type="text" name="query" placeholder="Cari berita..."
                                            value="{{ request('query') }}" required minlength="3">
                                        <button type="submit" class="search-btn"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none">
                                <!-- Mobile Search Box -->
                                <div class="mobile-search-container">
                                    <form action="{{ route('search') }}" method="GET">
                                        <div class="mobile-search-wrapper">
                                            <input type="text" 
                                                   name="query" 
                                                   placeholder="Cari berita..." 
                                                   value="{{ request('query') }}"
                                                   required 
                                                   minlength="3">
                                            <button type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                        /* Mobile Search Styles */
                        .mobile-search-container {
                            padding: 15px;
                            background: #f8f9fa;
                            border-bottom: 1px solid #eee;
                        }
                        
                        .mobile-search-wrapper {
                            position: relative;
                            display: flex;
                            align-items: center;
                            background: #fff;
                            border-radius: 25px;
                            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                            overflow: hidden;
                        }
                        
                        .mobile-search-wrapper input {
                            flex: 1;
                            border: none;
                            padding: 12px 15px;
                            font-size: 15px;
                            color: #333;
                            width: 100%;
                            background: transparent;
                        }
                        
                        .mobile-search-wrapper input:focus {
                            outline: none;
                        }
                        
                        .mobile-search-wrapper input::placeholder {
                            color: #999;
                        }
                        
                        .mobile-search-wrapper button {
                            background: none;
                            border: none;
                            padding: 0 15px;
                            height: 100%;
                            color: #666;
                            font-size: 16px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.3s ease;
                        }
                        
                        .mobile-search-wrapper button:hover {
                            color: #dc3545;
                        }
                        
                        /* Active States */
                        .mobile-search-wrapper:focus-within {
                            box-shadow: 0 0 0 2px #dc3545;
                        }
                        
                        .mobile-search-wrapper input:focus + button {
                            color: #dc3545;
                        }
                        
                        /* Animation */
                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                                transform: translateY(-10px);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }
                        
                        .mobile-search-container {
                            animation: fadeIn 0.3s ease-out;
                        }
                        
                        /* Ensure mobile only */
                        @media (min-width: 768px) {
                            .mobile-search-container {
                                display: none;
                            }
                        }
                        
                        @media (max-width: 767px) {
                            .mobile-search-container {
                                position: sticky;
                                top: 0;
                                z-index: 1000;
                            }
                            
                            .mobile-search-wrapper {
                                margin: 0 auto;
                                max-width: 95%;
                            }
                            
                            .mobile-search-wrapper input {
                                height: 42px;
                            }
                            
                            .mobile-search-wrapper button {
                                width: 42px;
                                height: 42px;
                            }
                        }
                        </style>
    <!-- Header End -->
</header>
