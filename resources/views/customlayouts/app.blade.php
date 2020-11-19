<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>
        @yield('title')
    </title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <a class="" href="{{ route('home') }}">CMS</a>

            <div>
                <ul class="navbar-nav">

                    @auth
                    <li class="nav-item active"><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Welcome {{ Auth::user()->name }}</a></li>
                    <li class="nav-item active">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </li>

                    @else
                    <li class="nav-item active"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>

                    @if (Route::has('register'))
                    <li class="nav-item active"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                    @endif
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    <main class="py-4">

        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts.index') }}">Posts</a>
                        </li>
                    </ul>

                    <ul class="list-group mt-5">
                        <li class="list-group-item">
                            <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@yield("scripts")


</body>
</html>
