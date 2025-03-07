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
    {{-- <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

    <script>
        // Initialize CKEditor
        CKEDITOR.replace('description');
        CKEDITOR.replace('body');
    </script> --}}

    <script src="https://cdn.tiny.cloud/1/658ii5nw9tiuifmtoo87zgafa84kcp2vrxk49eo33u31xzny/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
          selector: 'textarea#description, textarea#body, textarea#postBody',
          plugins: 'code table lists link image',
          toolbar: [
              // Baris 1
              {
                  items: 'undo redo | cut copy paste pastetext | selectall | removeformat | help'
              },
              // Baris 2
              {
                  items: 'styles | fontfamily fontsize | bold italic underline strikethrough | subscript superscript | forecolor backcolor | alignleft aligncenter alignright alignjustify | lineheight'
              },
              // Baris 3
              {
                  items: 'blocks | bullist numlist | indent outdent | ltr rtl'
              },
              // Baris 4
              {
                  items: 'link image media table emoticons charmap hr | pagebreak nonbreaking anchor | insertdatetime'
              },
              // Baris 5
              {
                  items: 'preview | code | fullscreen'
              }
          ],
          menubar: 'file edit view insert format tools table help',
          menu: {
              file: { 
                  title: 'File', 
                  items: 'newdocument restoredraft | preview | export print | deleteallconversations' 
              },
              edit: { 
                  title: 'Edit', 
                  items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' 
              },
              view: { 
                  title: 'View', 
                  items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' 
              },
              insert: { 
                  title: 'Insert', 
                  items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' 
              },
              format: { 
                  title: 'Format', 
                  items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' 
              },
              tools: { 
                  title: 'Tools', 
                  items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' 
              }
          },
          content_style: `
              body {
                  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                  font-size: 16px;
                  line-height: 1.6;
                  color: #333;
                  max-width: 100%;
              }
          `,
          height: 500,
          image_advtab: true,
          image_caption: true,
          automatic_uploads: true,
          file_picker_types: 'image',
          images_upload_url: '/upload',
          images_upload_credentials: true,
          relative_urls: false,
          remove_script_host: false,
          convert_urls: true,
          browser_spellcheck: true,
          contextmenu: 'link image table',
          custom_colors: false,
          visual: true,
          fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
          style_formats: [
              { title: 'Headings', items: [
                  { title: 'Heading 1', format: 'h1' },
                  { title: 'Heading 2', format: 'h2' },
                  { title: 'Heading 3', format: 'h3' },
                  { title: 'Heading 4', format: 'h4' },
                  { title: 'Heading 5', format: 'h5' },
                  { title: 'Heading 6', format: 'h6' }
              ]},
              { title: 'Inline', items: [
                  { title: 'Bold', format: 'bold' },
                  { title: 'Italic', format: 'italic' },
                  { title: 'Underline', format: 'underline' },
                  { title: 'Strikethrough', format: 'strikethrough' },
                  { title: 'Code', format: 'code' }
              ]},
              { title: 'Blocks', items: [
                  { title: 'Paragraph', format: 'p' },
                  { title: 'Blockquote', format: 'blockquote' },
                  { title: 'Div', format: 'div' },
                  { title: 'Pre', format: 'pre' }
              ]}
          ],
          formats: {
              alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img,audio,video', classes: 'text-left' },
              aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img,audio,video', classes: 'text-center' },
              alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img,audio,video', classes: 'text-right' },
              alignjustify: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img,audio,video', classes: 'text-justify' }
          },
          table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
          table_appearance_options: true,
          table_grid: true,
          table_resize_bars: true,
          table_default_attributes: {
              border: '1'
          },
          table_default_styles: {
              'border-collapse': 'collapse',
              'width': '100%'
          },
          setup: function(editor) {
              editor.on('init', function() {
                  editor.getContainer().style.transition = "border-color 0.15s ease-in-out";
              });
              editor.on('focus', function() {
                  editor.getContainer().style.borderColor = "#80bdff";
              });
              editor.on('blur', function() {
                  editor.getContainer().style.borderColor = "#ced4da";
              });
          }
      });
      </script>

</body>

</html>
