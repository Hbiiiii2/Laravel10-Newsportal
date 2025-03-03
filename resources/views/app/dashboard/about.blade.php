@extends('layouts.app')

@section('content')
<div class="content-wrapper pb-0">
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="{{ route('dashboard') }}" class="btn btn-warning mb-2 mb-md-0 mr-2">Kembali</a>
      <a href="https://wa.me/6282338520959" class="btn btn-outline-primary bg-white mb-2 mb-md-0 target="_blank"">Butuh Bantuan?</a>
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
            <h4 class="card-title">Tentang Kami</h4>
            <p class="card-description">{{ $about->title }}</p>
            <div class="mt-4 text-center">
              <img src="{{ asset($about->image) }}" alt="Gambar Tentang Kami" class="img-fluid mx-auto d-block" style="max-width: 100%;">
            </div>
          <div class="mt-4">
            <!-- Isi dari parameter $about -->
            {!! $about->description !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
