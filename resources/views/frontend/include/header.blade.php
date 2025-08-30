<div class="overlay"></div>
<section class="header">
    <div class="section-padding">
        <div class="container">
            <div class="header-section-pc d-none d-xl-flex">
                <div class="left-header">
                    <div class="logo">
                        <a href="{{ route('foundation.index') }}"><img src="{{ asset('assets/img/logo.svg') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="header-rihgt">
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('foundation.index') }}">Home</a></li>
                            <li><a href="{{ route('about-us.index') }}">About Us</a></li>
                            <li><a href="{{ route('health.index') }}">Health</a></li>
                            <li><a href="{{ route('news-room.index') }}">News</a></li>
                            <li><a href="{{ route('contact-us.index') }}">Contact</a></li>
                            <li>
                                <a href="{{ route('donation.index') }}" class="menu-btn">Donate</a>
                                <a href="#" class="menu-btn">
                                    <img src="{{ asset('assets/img/image 1.png') }}" alt=""> UG <i
                                        class="fa-solid fa-angle-down"></i>
                                    <span><img src="{{ asset('assets/img/ban.png') }}" alt="">BAN</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="header-section-mobile d-xl-none">
                <div class="off-canves-menu">
                    <div class="logo">
                        <a href="http://127.0.0.1:5500/index.html"><img src="{{ asset('assets/img/blue-logo.png') }}"
                                alt=""></a>
                    </div>
                    <hr>
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('foundation.index') }}">Home</a></li>
                            <li><a href="{{ route('about-us.index') }}">About Us</a></li>
                            <li><a href="{{ route('health.index') }}">Health</a></li>
                            <li><a href="{{ route('news-room.index') }}">News</a></li>
                            <li><a href="{{ route('contact-us.index') }}">Contact</a></li>
                            <li>
                                <a href="{{ route('donation.index') }}" class="menu-btn">Donate</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mobile-header">
                    <div class="header-left">
                        <a href=""><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                    </div>
                    <div class="header-rihgt">
                        <div class="bars">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
