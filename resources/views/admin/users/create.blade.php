@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create a new User
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add User <i class="fa fa-upload"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection