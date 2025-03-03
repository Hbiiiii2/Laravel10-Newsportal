@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Kategori</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <!-- Bagian untuk menampilkan gambar -->
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($category->image)
                            <img src="{{ asset($category->image) }}" alt="Gambar Lama" class="img-thumbnail mt-2" width="200">
                        @else
                            Tidak ada gambar
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bagian untuk input form -->
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('categories.update', $category->slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $category->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="postImage">Gambar</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" id="postImage" placeholder="Upload Image" name="image">
                                </div>
                                @error('image')
                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <script>
                                function updateFileName() {
                                    var fileName = document.getElementById('image').files[0].name;
                                    var label = document.querySelector('.custom-file-label');
                                    label.innerHTML = fileName;
                                }
                            </script>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
