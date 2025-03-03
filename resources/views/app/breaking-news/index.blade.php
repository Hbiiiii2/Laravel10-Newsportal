@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Postingan</h4>

                    <!-- Filter Buttons -->
                    <div class="mb-3">
                        <a href="{{ route('breaking-news.index', ['filter' => 'all']) }}" class="btn btn-info {{ $filter == 'all' ? 'active' : '' }}">Semua</a>
                        <a href="{{ route('breaking-news.index', ['filter' => 'in_breaking_news']) }}" class="btn btn-info {{ $filter == 'in_breaking_news' ? 'active' : '' }}">Tampil Trending</a>
                        <a href="{{ route('breaking-news.index', ['filter' => 'not_in_breaking_news']) }}" class="btn btn-info {{ $filter == 'not_in_breaking_news' ? 'active' : '' }}">Belum tampil Trending</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @if (\App\Models\BreakingNews::where('post_id', $post->id)->exists())
                                            <form action="{{ route('breaking-news.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Batal</button>
                                        @else
                                            <form action="{{ route('breaking-news.store') }}" method="POST" id="form-{{ $post->id }}">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="button" class="btn btn-primary" onclick="showSwal('{{ $post->id }}')">Pilih</button>
                                            </form>
                                        @endif
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
    function showSwal(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Postingan akan tampil di Trending",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-' + id).submit();
            }
        })
    }
</script>

@endsection
