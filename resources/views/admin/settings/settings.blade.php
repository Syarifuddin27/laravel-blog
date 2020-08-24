@extends('layouts.app') 
@section('content')
    @include('admin.includes.errors')
<div class="card">
    <div class="card-header">
        Edit blog Setting
    </div>
    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">User</label>
                <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Number Phone</label>
                <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Quotes</label>
                <textarea name="quotes" cols="5" rows="5" class="form-control">{{ $settings->quotes }}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update site settings  <i class="fa fa-upload"></i></button>
                </div>
                
                    

            </div>
        </form>
    </div>
</div>
@endsection