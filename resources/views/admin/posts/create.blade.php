@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create a new Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" style="text-transform: capitalize;">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select Tag</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="title">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" style="text-transform: capitalize;">
                </div>
                <div class="form-group">
                    <label for="title">Harga Grosir</label>
                    <input type="number" name="harga_grosir" class="form-control" style="text-transform: capitalize;">
                </div>
                <div class="form-group">
                    <label for="title">Jumlah Barang</label>
                    <input type="number" name="jumlahBarang" class="form-control" style="text-transform: capitalize;">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="summary-ckeditor" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Store Post <i class="fa fa-upload"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            extraPlugins: 'codesnippet',
            codeSnippet_theme: 'dark'
        } );
    </script>
@endsection