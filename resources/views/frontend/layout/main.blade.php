<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | SAJIDA Foundation</title>
    <!-- initiate head with meta tags, css and script -->
    @include('frontend.include.head')
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '779061707906803');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=779061707906803&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body id="app">
    <!-- initiate header-->
    @include('frontend.include.header')

    <div>
        <!-- yeild contents here -->
        @yield('content')

    </div>


    <!-- initiate footer section-->
    @include('frontend.include.footer')
    <!-- initiate scripts-->
    @include('frontend.include.script')
    @yield('customscript2')
    @yield('customscript')
</body>

</html>
