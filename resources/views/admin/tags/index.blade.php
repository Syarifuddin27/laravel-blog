@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Table Tags 
        </div>
        <div class="card-body">
            <table class="table teble-hover">
                <thead>
                    <th>Tag</th>
                    <th> Editing</th>
                    <th>Deleting</th>
                </thead>
                <tbody>
                    @if ($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colSpan="5" class="text-center">No Tags yet.</th>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
        
    </div>
@endsection