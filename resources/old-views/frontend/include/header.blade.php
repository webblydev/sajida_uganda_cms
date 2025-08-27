<div class="loader">
    <span class="loaderInner"></span>
</div>
<div class="ic-overlay"></div>
<header class="header">
    <div class="page-indicator" id="myBar"></div>
    <div class="container">
        <!-- navbar -->
        <div class="ic-navbar">
            <div class="ic-logos">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('assets/images/logos-headers.png')}}" class="withOutSticky" alt="logos">
                    <img src="{{ asset('assets/images/blue-logo.png')}}" class="withSticky" alt="logos">
                </a>
            </div>
            <div class="ic-navbar-ul-nav">
                <img src="{{ asset('assets/images/blue-logo.png')}}" class="sidebar-logo" alt="logos">
                <ul class="ic-navbar-nav">
                    <li>
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li>
                        <a href={{ url('/about-us') }}>About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('/news-room') }}">News</a>
                    </li>
                    <li>
                        <a href="{{ url('/career') }}">Careers</a>
                    </li>
                </ul>
                <ul class="ic-nav-button">
                    <li>
                        <a href="{{ url('/donation') }}" class="ic-btn-donate">Donate</a>
                    </li>
                </ul>
            </div>
            <div class="humbarger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>