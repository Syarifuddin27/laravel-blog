@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Published Post
        </div>
        <div class="card-body">
            <table class="table teble-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($post->count() > 0)
                        @foreach ($post as $po)
                            <tr>
                                <td><img src="{{ $po->featured }}" alt="{{ $po->title }}" width="90px" height="auto"></td>
                                <td>{{ $po->title }}</td>
                                <td>
                                    <a href="{{ route('post.edit', $po->id) }}" class="btn btn-info btn-sm">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('post.destroy',$po->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colSpan="5" class="text-center">No Published Posts</th>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection