<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | SAJIDA Foundation Uganda</title>
    @include('frontend.include.head')
</head>

<body id="app">
    <div>
        @yield('content')
    </div>
</body>

</html>
