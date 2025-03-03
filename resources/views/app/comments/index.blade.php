@extends('layouts.app')

@section('content')

<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">List Komentar</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Komentar</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Komentar</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Komentar</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Post</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($comments as $comment)
                          <tr>
                            <td><a href="{{ route('posts.show', $comment->post->slug) }}" target="_blank">{{ $comment->post->title }}</a></td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>
                                <a href="{{ route('posts.show', $comment->post->slug) }}" class="btn btn-primary" target="_blank">Lihat</a>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $comment->id }}')">Hapus</button>
                                <form id="delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-none">
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
                        <p class="mb-0">Menampilkan {{ $comments->firstItem() }} - {{ $comments->lastItem() }} dari {{ $comments->total() }} komentar</p>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        @if ($comments->previousPageUrl())
                        <a href="{{ $comments->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
                        @else
                        <button class="btn btn-secondary" disabled>Previous</button>
                        @endif

                        @if ($comments->nextPageUrl())
                        <a href="{{ $comments->nextPageUrl() }}" class="btn btn-secondary">Next</a>
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
function confirmDelete(id) {
    Swal.fire({
    title: 'Yakin hapus komentar?',
    text: "Komentar yang dihapus tidak dapat kembali!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
    }
    })
}
</script>

@endsection

