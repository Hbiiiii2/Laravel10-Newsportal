@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buat Kategori Baru</h4>
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Kategori" required>
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
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Kategori</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ $category->image }}" alt="{{ $category->name }}" style="object-fit: contain; height: 50px;"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('categories.edit', $category->slug) }}">Edit</a>
                                        <button class="btn btn-danger" onclick="confirmDelete('{{ $category->slug }}')">Hapus</button>
                                        <form id="delete-form-{{ $category->slug }}" action="{{ route('categories.destroy', $category->slug) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <p class="mb-0">Menampilkan {{ $categories->firstItem() }} - {{ $categories->lastItem() }} dari {{ $categories->total() }} kategori</p>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        @if ($categories->previousPageUrl())
                        <a href="{{ $categories->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
                        @else
                        <button class="btn btn-secondary" disabled>Previous</button>
                        @endif

                        @if ($categories->nextPageUrl())
                        <a href="{{ $categories->nextPageUrl() }}" class="btn btn-secondary">Next</a>
                        @else
                        <button class="btn btn-secondary" disabled>Next</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function confirmDelete(slug) {
    Swal.fire({
        title: 'Yakin hapus kategori?',
        text: "Postingan yang tertaut dengan kategori akan terhapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + slug).submit();
        }
    });
}
</script>

@endsection
