@extends('layouts.app')

@section('content')
<div class="content-wrapper pb-0">
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="{{ route('about.creator') }}" class="btn btn-primary mb-2 mb-md-0 mr-2">Tentang Kami</a>
      <a href="https://wa.me/6282338520959" class="btn btn-outline-primary bg-white mb-2 mb-md-0" target="_blank">Butuh Bantuan?</a>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
      <div class="d-flex align-items-center">
        <a href="{{ route('dashboard') }}">
          <p class="m-0 pr-3">Dashboard</p>
        </a>
        <a class="pl-3 mr-4" href="#">
          <p class="m-0">{{ auth()->user()->name }}</p>
        </a>
      </div>
      <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
        <i class="mdi mdi-plus-circle"></i> Tambah Postingan
      </a>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Selamat Datang, {{ auth()->user()->name }}!</h4>
          <p class="card-description">Silakan baca dan setujui syarat dan ketentuan berikut:</p>

          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Syarat dan Ketentuan</h5>
              <p class="card-text">
                Dengan menggunakan situs web ini, Anda setuju dengan syarat dan ketentuan berikut:
                <ul>
                  <li>Hormati privasi dan pendapat pengguna lain.</li>
                  <li>Jangan berbagi informasi pribadi atau rahasia.</li>
                  <li>Patuhi semua hukum dan peraturan yang berlaku.</li>
                  <li>Gunakan situs web hanya untuk tujuan yang dimaksudkan.</li>
                  <li>Jangan terlibat dalam bentuk pelecehan atau diskriminasi apa pun.</li>
                  <li>Laporkan aktivitas mencurigakan atau tidak pantas kepada administrator situs.</li>
                </ul>
              </p>
            </div>
          </div>

          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Kebijakan Privasi</h5>
              <p class="card-text">
                Privasi Anda penting bagi kami. Silakan tinjau kebijakan privasi kami untuk memahami bagaimana kami menangani informasi pribadi Anda:
                <ul>
                  <li>Kami mengumpulkan dan menggunakan data Anda sesuai dengan hukum yang berlaku.</li>
                  <li>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi data Anda.</li>
                  <li>Kami tidak membagikan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.</li>
                  <li>Anda memiliki hak untuk mengakses, memodifikasi, dan menghapus informasi pribadi Anda.</li>
                  <li>Jika Anda memiliki kekhawatiran tentang privasi Anda, silakan hubungi tim dukungan kami.</li>
                </ul>
              </p>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Informasi Terbaru</h4>
          <p class="card-description">Kami telah melakukan beberapa pembaruan dan perbaikan pada situs web ini:</p>

          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Pembaruan Fitur</h5>
              <p class="card-text">
                Kami dengan senang hati mengumumkan beberapa fitur baru yang tersedia di situs kami:
                <ul>
                  <li><strong>Berbagi Informasi:</strong> Sekarang Anda dapat berbagi informasi dan postingan dengan lebih mudah melalui formulir baru kami.</li>
                  <li><strong>Kategori Baru:</strong> Kami telah menambahkan kategori baru untuk membantu Anda mengelompokkan postingan sesuai dengan topiknya.</li>
                  <li><strong>Desain Diperbarui:</strong> Antarmuka pengguna telah diperbarui untuk pengalaman yang lebih bersih dan mudah digunakan.</li>
                  <li><strong>Keamanan yang Ditingkatkan:</strong> Kami telah meningkatkan langkah-langkah keamanan untuk melindungi data pribadi Anda.</li>
                  <li><strong>Popup Informasi:</strong> Fitur popup baru untuk memberikan informasi penting atau konfirmasi kepada pengguna.</li>
                  <li><strong>Komentar Baru:</strong> Sekarang Anda dapat memberikan komentar pada setiap postingan, membantu memberikan kontribusi dan diskusi lebih seru.</li>
                </ul>
              </p>
            </div>
          </div>

          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Perbaikan Bug</h5>
              <p class="card-text">
                Kami juga telah memperbaiki beberapa bug dan masalah yang dilaporkan oleh pengguna:
                <ul>
                  <li><strong>Perbaikan Login:</strong> Masalah dengan proses login telah diperbaiki untuk memastikan akses yang lebih lancar.</li>
                  <li><strong>Peningkatan Kecepatan:</strong> Optimalisasi dilakukan untuk meningkatkan kecepatan pemuatan halaman.</li>
                  <li><strong>Kompabilitas Browser:</strong> Situs ini sekarang lebih kompatibel dengan berbagai browser dan perangkat.</li>
                  <li><strong>Perbaikan Tampilan:</strong> Beberapa masalah tampilan pada berbagai ukuran layar telah diperbaiki.</li>
                  <li><strong>Komentar Harus Login:</strong> Sekarang pengguna harus login untuk dapat berkomentar pada setiap postingan.</li>
                </ul>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
