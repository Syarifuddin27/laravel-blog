@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                POSTS
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">{{ $post_count }}</h2>
                            </div>
                        </div>
                    </div></br>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                CATEGORIES
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">{{ $category_count }}</h2>
                            </div>
                        </div>
                    </div></br>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                USER
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">{{ $user_count }}</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
