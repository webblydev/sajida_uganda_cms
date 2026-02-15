@extends('frontend.layout.main')
@section('title', 'Donation')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="{{ asset('images/' . ($donationBanner->banner_image ?? 'default.jpg')) }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="heading">
                        <h1>{{ $donationBanner->title ?? 'Donation' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contribute">
        <div class="section-padding">
            <div class="container">
                <h1>{{ $donationSectionTwo->heading ?? '' }}</h1>
                <div class="d-lg-flex justify-content-between">
                    <div class="content">
                        <h4>{{ $donationSectionTwo->title ?? '' }}</h4>
                        <p>{!! $donationSectionTwo->description ?? '' !!}</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/' . ($donationSectionTwo->image ?? 'default.jpg')) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment">
        <div class="section-padding">
            <div class="container">
                <h1>Payment Channels</h1>
                <div class="d-flex item-container">
                    <div class="content">
                        <h5>SAJIDA FOUNDATION USA</h5>
                        <p><b>A/C Name:</b> SAJIDA FOUNDATION USA INC <br><b>Beneficiary Bank Name:</b> TD Bank <br> <b>A/C NO:</b> 4410385804
                            <br> <b>SWIFT Code:</b> NRTHUS33XXX <br> <b>Bank Address:</b> 138 Hoyt St #2, Brooklyn, NY 11217, USA <br>
                            <b>International Routing Code (IRC):</b> 0260-13673
                        </p>
                    </div>
                    <div class="content">
                        <h5>SAJIDA FOUNDATION Uganda</h5>
                        <p><b>A/C Name:</b> SAJIDA Foundation Uganda Limited<br><b> Beneficiary Bank Name:</b> Centenary Bank<br> <b>A/C NO:</b> 3100106586
                            <br> <b>SWIFT Code:</b> CERBUGKA<br> <b>Bank Address:</b> Plot 6, Nizam West Road OPP. Uganda Telecom Office P.O Box 1767, Jinja, Uganda Swift code <br>
                            <!-- <b>International Routing Code (IRC):</b> 0260-13673 -->
                        </p>
                    </div>
               {{--     <!-- <div class="paypal-transfer">
                        <h5>PAYPAL TRANSFER</h5>
                        <img src="{{ asset('assets/img/paypal.jpg') }}" alt="">
                        <p><b>Paypal:</b> SAJIDA FOUNDATION uganda</p>
                    </div>
                    <div class="zelle-transfer">
                        <h5>ZELLE TRANSFER</h5>
                        <img src="{{ asset('assets/img/zelle.png') }}" alt="">
                        <p><b>Zelle:</b> donate@sajidauganda.org</p>
                    </div> --> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
