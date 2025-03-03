@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Create Post</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Postingan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Post</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Post</h4>
                    <p class="card-description">Create new post</p>
                    <form class="forms-sample" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="authorName">Author</label>
                            <input type="text" class="form-control" id="authorName" value="{{ Auth::user()->name }}" disabled />
                            @error('user_id')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
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
                        <div class="form-group">
                            <label for="postTitle">Judul</label>
                            <input type="text" class="form-control" name="title" id="postTitle" placeholder="Title" value="{{ old('title') }}" />
                            @error('title')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postCategory">Kategori</label>
                            <select class="form-control" name="category_id" id="postCategory">
                                <option value="">- Select Category -</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="postBody">Konten</label>
                            <textarea class="form-control" name="body" id="postBody" placeholder="Body" rows="10">{{ old('body') }}</textarea>
                            @error('body')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
