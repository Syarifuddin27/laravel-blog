@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Table Category 
        </div>
        <div class="card-body">
            <table class="table teble-hover">
                <thead>
                    <th>Category Name</th>
                    <th> Editing</th>
                    <th>Deleting</th>
                </thead>
                <tbody>
                    @if ($category->count() > 0)
                        @foreach ($category as $ctg)
                            <tr>
                                <td>{{ $ctg->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $ctg->id) }}" class="btn btn-primary btn-sm">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy',$ctg->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colSpan="5" class="text-center">No Categories yet.</th>
                            <a href="{{ route('category.create') }}" class="btn btn-info btn-sm">Add New Categories</a>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
        
    </div>
@endsection