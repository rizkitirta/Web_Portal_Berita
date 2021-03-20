@extends('admin.layouts.master')
@section('content')
    <!-- general form elements -->
    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Create Article</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('article.update', $articles->article_id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="article">Judul Article</label>
                    <input type="text" class="form-control" id="article" placeholder="Enter Article" name="judul"
                        value="{{ $articles->judul }}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <option selected="" disabled="">Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $articles->category_id == $category->id ? 'selected' : '' }}> {{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <textarea id="summernote" name="isi">{{ $articles->isi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
