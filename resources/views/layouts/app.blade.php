<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>
        img {
            width: 100px;
            height: 100px;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('wishlists.index') }}">Wishlist<span
                        class="sr-only">(current)</span></a>
            </li>


        </ul>



        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>

</nav>
@if ($message = Session::get('success'))
    <div style="display:flex;justify-content:center">
        <div class="col-7">
            <div class="alert alert-success mt-2" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ $message }}</p>

            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div style="display:flex;justify-content:center">
        <div class="col-7">
            <div class="alert alert-danger mt-2" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>

@endif

<body class="font-sans antialiased">
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
