<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    @yield('index')
    @yield('signin')
    @yield('signup')
    @yield('about')
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>