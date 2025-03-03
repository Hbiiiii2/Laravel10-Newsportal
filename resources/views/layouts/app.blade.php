<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistem Manajemen</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('app/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('app/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('app/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('app/css/demo_1/style.css') }}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('home/img/logo/logo-favicon-tb.svg') }}" />

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_horizontal-navbar.html -->
      @include('component.navbar-app')

      <!-- partial -->
      <div class="main-panel">

    @yield('content')

     @include('component.footer-app')
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('app/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="{{ asset('app/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script> -->
    <!-- <script src="{{ asset('app/vendors/chart.js/Chart.min.js') }}"></script> -->
    <script src="{{ asset('app/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('app/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('app/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('app/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('app/vendors/flot/jquery.flot.stack.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('app/js/off-canvas.js') }}"></script>
    <script src="{{ asset('app/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('app/js/misc.js') }}"></script>
    <script src="{{ asset('app/js/settings.js') }}"></script>
    <script src="{{ asset('app/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="{{ asset('app/js/dashboard.js') }}"></script> -->
    <!-- End custom js for this page -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}"
            });
        </script>
    @endif

        <!-- Include CKEditor from CDN -->
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

    <script>
        // Initialize CKEditor
        CKEDITOR.replace('description');
        CKEDITOR.replace('body');
    </script>


  </body>
</html>
