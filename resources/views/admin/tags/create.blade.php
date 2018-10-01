@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create a new Tags
        </div>
        <div class="card-body">
            <form action="{{ route('tags.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Store Tag <span class="fa fa-upload"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection