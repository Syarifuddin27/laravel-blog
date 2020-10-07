<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--  Flashy  -->
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-key"></i> {{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered"></i>{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <i class="fa fa-user-circle-o"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-cogs"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if (Auth::check())
                        <div class="col-lg-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('admin/category') }}"><i class="fa fa-map-signs"></i> All Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('admin/tags') }}"><i class="fa fa-hashtag"></i> All Tags</a>
                                </li>
                                
                                <li class="list-group-item">
                                    <a href="{{ url('admin/post') }}"><i class="fa fa-send-o"></i> All Posts</a>
                                </li>
                                @if (Auth::user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{ url('admin/users') }}"><i class="fa fa-book"></i> All User</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('users.create') }}">Create New User</a>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{ route('user.profile') }}">My Profile</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('category.create') }}">Create New Category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('tags.create') }}">Create New Tag</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('post.create') }}">Create New Post</a>
                                </li>
                                @if (Auth::user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{ route('settings') }}">Settings</a>
                                    </li>
                                @endif
                                
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">

        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> --}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    @yield('js')
    
    <!--  Flashy  -->
    {{-- <script src="//code.jquery.com/jquery.js"></script> --}}
    @include('flashy::message')

    
</body>

</html>
