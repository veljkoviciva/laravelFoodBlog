<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div id="app">
        @include('/include/navbar');

        <div class="container">
            <main class="py-4">
                @include('/include/messages')
                @yield('content')
            </main>
        </div>
    </div>

    {{-- <script src="js/users.js"></script> --}}
</body>
</html>
