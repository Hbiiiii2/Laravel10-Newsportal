@extends('layouts.app')

@section('content')

<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">List Postingan</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Postingan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Postingan</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Postingan</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Author</th>
                            <th>Dibuat</th>
                            <th>Diperbarui</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts->take(10) as $post)
                          <tr>
                            <td>
                              @if ($post->image)
                                <img src="{{ asset($post->image) }}" alt="Image" style="object-fit: cover; width: 100px; border-radius: 0px;">
                              @else
                                No image
                              @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at->format('d, M, Y') }}</td>
                            <td>{{ $post->updated_at->format('d, M, Y') }}</td>
                            <td>
                              <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Lihat</a>
                              <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning">Edit</a>
                              <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ $post->slug }}')">Hapus</a>
                              <form id="delete-form-{{ $post->slug }}" action="{{ route('posts.destroy', $post->slug) }}" method="POST" class="d-none">
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
                        <p class="mb-0">Menampilkan {{ $posts->firstItem() }} - {{ $posts->lastItem() }} dari {{ $posts->total() }} postingan</p>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        @if ($posts->previousPageUrl())
                        <a href="{{ $posts->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
                        @else
                        <button class="btn btn-secondary" disabled>Previous</button>
                        @endif

                        @if ($posts->nextPageUrl())
                        <a href="{{ $posts->nextPageUrl() }}" class="btn btn-secondary">Next</a>
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
    title: 'Yakin hapus postingan?',
    text: "Postingan yang dihapus tidak dapat kembali!",
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
    })
}
</script>

@endsection


