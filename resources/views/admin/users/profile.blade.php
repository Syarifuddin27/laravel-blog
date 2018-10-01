@extends('layouts.app') 
@section('content')
    @include('admin.includes.errors')
<div class="card">
    <div class="card-header">
        Edit Your Profile
    </div>
    <div class="card-body">
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">User</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <img src="{{ asset($user->profile->avatar) }}" alt="" width="100" height="auto">
                <label for="image">Upload New Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Facebook Profile</label>
                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">YouTube Profile</label>
                <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="about">About You</label>
                <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile <i class="fa fa-upload"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection