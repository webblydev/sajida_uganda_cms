<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title', '') | SAJIDA Foundation</title>
        @include('frontend.include.head')
    </head>

    <body id="app">
        @include('frontend.include.header')

        <div>
            @yield('content')

        </div>
        @include('frontend.include.footer')

        @include('frontend.include.script')
        @yield('customscript2')
        @yield('customscript')
    </body>
</html>
