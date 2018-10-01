@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table teble-hover">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            
                                <tr>
                                    <td>
                                        <img src="{{ asset($user->profile->avatar) }}" alt="" width="100" height="auto" style="border-radius: 50%;">
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        @if ($user->admin)
                                            <a href="{{ URL::to('admin/users/'. $user->id . '/edit') }}" class="btn btn-sm btn-warning">Remove Permissions</a>
                                        @else
                                            <a href="{{ URL::to('admin/users/'. $user->id . '/edit') }}" class="btn btn-sm btn-success">Make Admin</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::id() !== $user->id)
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            
                        @endforeach
                    @else
                            <tr>
                                <th colSpan="5" class="text-center">No Users</th>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection