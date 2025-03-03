@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Post</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Postingan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <p class="card-description">Edit post</p>
                    <form class="forms-sample" action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="authorName">Author</label>
                            <input type="text" class="form-control" id="authorName" value="{{ $post->user->name }}" disabled />
                            @error('user_id')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postImage">Gambar</label>
                            <div class="text-center mb-3">
                                <img src="{{ asset($post->image) }}" class="img-fluid mx-auto d-block" style="height: 100px;" />
                            </div>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" id="postImage" placeholder="Upload Image" name="image">
                            </div>
                            @error('image')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postTitle">Judul</label>
                            <input type="text" class="form-control" name="title" id="postTitle" placeholder="Title" value="{{ $post->title }}" />
                            @error('title')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postCategory">Kategori</label>
                            <select class="form-control" name="category_id" id="postCategory">
                                <option value="">- Select Category -</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="postBody">Konten</label>
                            <textarea class="form-control" name="body" id="postBody" placeholder="Body" rows="10">{{ $post->body }}</textarea>
                            @error('body')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

