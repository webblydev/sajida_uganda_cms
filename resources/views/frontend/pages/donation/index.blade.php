@extends('frontend.layout.main')
@section('title', 'Donation')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="{{ asset('assets/img/bg5.jpg') }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="heading">
                        <h1>Donation</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contribute">
        <div class="section-padding">
            <div class="container">
                <h1>Contribute</h1>
                <div class="d-xl-flex justify-content-between">
                    <div class="content">
                        <h4>Make A mark in community full of life</h4>
                        <p>With SAJIDA uganda, your Zakat provides lifesaving dialysis for kidney patients, critical cancer
                            treatment for children, nutritious meals for mental health patients, and essential healthcare
                            for vulnerable women and children in Bangladesh.
                        <p>
                            Your generosity ensures dignified care, relief from suffering, and a path to a healthier,
                            happier future. Every contribution uplifts the most marginalized, restoring hope and comfort to
                            those facing immense challenges.</p>
                        </p>
                        <p>Donate your Zakat today and be a source of joy, healing, and renewal for those in need.</p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('assets/img/hero-img6.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment">
        <div class="section-padding">
            <div class="container">
                <h1>Payment Channels</h1>
                <div class="d-flex justify-content-between item-container">
                    <div class="content">
                        <h5>INTERNATIONAL</h5>
                        <p>A/C Name: SAJIDA FOUNDATION USA INC <br>Beneficiary Bank Name: TD Bank <br> A/C NO: 4410385804
                            <br> SWIFT Code: NRTHUS33XXX <br> Bank Address: 138 Hoyt St #2, Brooklyn, NY 11217, USA <br>
                            International Routing Code (IRC): 0260-13673
                        </p>
                    </div>
                    <div class="paypal-transfer">
                        <h5>PAYPAL TRANSFER</h5>
                        <img src="{{ asset('assets/img/paypal.jpg') }}" alt="">
                        <p>Paypal: SAJIDA FOUNDATION uganda</p>
                    </div>
                    <div class="zelle-transfer">
                        <h5>ZELLE TRANSFER</h5>
                        <img src="{{ asset('assets/img/zelle.png') }}" alt="">
                        <p>Zelle: donate@sajidauganda.org</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
