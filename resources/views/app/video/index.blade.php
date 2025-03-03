@extends('layouts.app')

@section('content')
<script>
    // Tambahkan script ini di awal content
    window.onload = function() {
        Swal.fire({
            title: 'Pemberitahuan',
            text: 'Mohon maaf, fitur Video YouTube ini sedang dalam masa pemeliharaan (maintenance)',
            icon: 'info',
            confirmButtonText: 'Mengerti'
        });
    }
</script>

<div class="content-wrapper">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buat Video Baru</h4>
                    <p>Anda dapat menggunakan link video dari YouTube. Silakan ikuti langkah-langkah berikut:</p>
                    <ol>
                        <li>Salin URL video dari YouTube.</li>
                        <li>Buka <a href="https://www.classynemesis.com/projects/ytembed/" target="_blank">https://www.classynemesis.com/projects/ytembed/</a>.</li>
                        <li>Tempelkan URL video yang disalin ke dalam kotak input di halaman tersebut.</li>
                        <li>Klik tombol "Get Embed Code".</li>
                        <li>Pastikan ada dua URL yang dihasilkan. URL pertama adalah untuk menampilkan video dalam mode tampilan yang lebih besar, sedangkan URL kedua adalah untuk menampilkan video dalam mode tampilan yang lebih kecil. Anda dapat memilih salah satu dari keduanya.</li>
                        <li>Pastikan juga ada ID video yang dihasilkan. ID video adalah bagian yang muncul setelah tanda "v=" dalam URL video.</li>
                        <li>Gunakan URL dan ID video yang dihasilkan untuk mengisi bidang "URL Video" di formulir di bawah ini.</li>
                    </ol>
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="title">Judul Video</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Judul Video" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">Url Video</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="https://www.youtube.com/embed/..." required>
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
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
                    <h4 class="card-title">List Video</h4>
                    <div class="table-responsive">
                        <p>Mohon pastikan URL video yang dimasukkan sudah benar dan video dapat dimuat dengan baik. Jika tidak dapat menampilkan video dengan benar, coba gunakan URL video lain atau periksa kembali URL yang diberikan.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Video</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <iframe width="150" height="100" src="{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </td>
                                    <td>{{ $video->title }}</td>
                                    <td>
                                        <button class="btn btn-danger" onclick="confirmDelete('{{ $video->id }}')">Hapus</button>
                                        <form id="delete-form-{{ $video->id }}" action="{{ route('videos.destroy', $video->id) }}" method="POST" class="d-none">
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
                        <p class="mb-0">Menampilkan {{ $videos->firstItem() }} - {{ $videos->lastItem() }} dari {{ $videos->total() }} video</p>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        @if ($videos->previousPageUrl())
                        <a href="{{ $videos->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
                        @else
                        <button class="btn btn-secondary" disabled>Previous</button>
                        @endif

                        @if ($videos->nextPageUrl())
                        <a href="{{ $videos->nextPageUrl() }}" class="btn btn-secondary">Next</a>
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
        title: 'Yakin hapus video?',
        text: "Video yang dihapus tidak dapat dikembalikan!",
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
    });
}
</script>

@endsection

