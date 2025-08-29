<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | SAJIDA Foundation</title>
    @include('frontend.include.head')
</head>

<body id="app">
    <div>
        @yield('content')
    </div>
</body>

</html>
