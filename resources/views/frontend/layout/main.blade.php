<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title', '') | SAJIDA Foundation Uganda</title>
        @include('frontend.include.head')
    </head>

    <body id="app">
        <!-- <div class="loader">
            <span class="loaderInner"></span>
        </div> -->
        <div class="loader-container">

            <div class="page-loaderInner">
                <img src="{{ asset('assets/img/blue-logo.svg') }}"alt="">
            </div>

        </div>
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
