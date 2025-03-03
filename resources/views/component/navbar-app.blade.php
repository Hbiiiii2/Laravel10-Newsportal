<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="{{ asset('app/images/faces/face1.jpg') }}" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->name }}</span>
                <span class="text-secondary icon-sm text-center">{{ Auth::user()->role->name }}</span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="index.html">
              <img class="sidebar-brand-logo" src="{{ asset('home/img/logo/logo-header.svg') }}" style="width: 150px;" alt="" />
              <img class="sidebar-brand-logomini" src="{{ asset('home/img/logo/logo-tb.svg') }}" alt="" />
              <div class="small font-weight-light pt-1">Elementary Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Side Bar</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Postingan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('posts.index') }}">List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('posts.create') }}">Tambah</a>
                </li>
              </ul>
            </div>
          </li>

          @can('admin-fitur')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('breaking-news.index') }}">
              <i class="mdi mdi-trending-up menu-icon"></i>
              <span class="menu-title">Trending</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="mdi mdi-apps menu-icon"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('comments.index') }}">
              <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
              <span class="menu-title">Komentar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('videos.index') }}">
              <i class="mdi mdi-youtube menu-icon"></i>
              <span class="menu-title">Youtube</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about.index') }}">
              <i class="mdi mdi-information-outline menu-icon"></i>
              <span class="menu-title">Tentang Kami</span>
            </a>
          </li>
          @endcan

        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="/" target="_blank" style="filter: invert(100%);">
              <img src="{{ asset('home/img/logo/logo-tb.svg') }}" style="filter: invert(100%);" alt="logo" />
            </a>
            </div>

            <ul class="navbar-nav navbar-nav-right">

              <li class="nav-item nav-logout d-none d-md-block">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">Keluar</button>
                </form>
              </li>

              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="/" target="_blank">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
