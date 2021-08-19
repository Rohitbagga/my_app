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

@if ($message = Session::get('message'))
    <div style="display:flex;justify-content:center">
        <div class="col-7">
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ $message }}</p>

            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div style="display:flex;justify-content:center">
        <div class="col-7">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
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
