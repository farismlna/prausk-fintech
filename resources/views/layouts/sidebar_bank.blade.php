<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #F1F5F9">
    <div id="app">
        <div class="" style="height: 100%; width: 260px; position: fixed; z-index: 1; top: 0; left: 0; background-color: hsl(223, 72%, 37%); overflow-x: hidden; padding-top: 20px">
            <p class="mb-3" style="padding: 6px 8px 6px 35px; font-size: 25px; font-weight: bold; color: white; display: block; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Fintech Bank</p>
            <a style="padding: 6px 8px 6px 35px; text-decoration: none; font-size: 20px; color: white; display: block;" href="{{route('home')}}">Home</a>
            <a style="padding: 6px 8px 6px 35px; text-decoration: none; font-size: 20px; color: white; display: block;" href="{{route('getTopUpRequest')}}">Top Up</a>
            <a style="padding: 6px 8px 6px 35px; text-decoration: none; font-size: 20px; color: white; display: block;" href="{{route('getWithdrawRequest')}}">Tarik Tunai</a>
            <a style="padding: 6px 8px 6px 35px; text-decoration: none; font-size: 20px; color: white; display: block;" href="#">Laporan</a>
            <a style="padding: 6px 8px 6px 35px; text-decoration: none; font-size: 20px; color: white; display: block;" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
