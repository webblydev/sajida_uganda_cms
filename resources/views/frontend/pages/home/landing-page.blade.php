@extends('frontend.landing-layout.main')
@section('title', 'Destination')
@section('content')
    <div class="main-website-page">
        <div class="container ">
            <div class="item d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="">
                        <img src="assets/img/Logo.png" alt="Logo">
                    </a>
                </div>
                <img src="assets/img/Rectangle 21.png" alt="">
                <h2>Impact You Want to Explore</h2>
                <div class="btns">

                    <a href="{{ route('foundation.index') }}" class="btn health-btn">Health</a>
                    <a href="#" class="btn  microfinance-btn" disabled>Micor Finance</a>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright-area main-website-copyright">
        <h4>© 2023 All Rights Reserved <a href="">SajidaFoundation.</a></h4>
    </div>
@endsection
