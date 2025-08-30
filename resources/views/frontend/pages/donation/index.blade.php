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
                        <p><b>A/C Name:</b> SAJIDA FOUNDATION USA INC <br><b>Beneficiary Bank Name:</b> TD Bank <br> <b>A/C NO:</b> 4410385804
                            <br> <b>SWIFT Code:</b> NRTHUS33XXX <br> <b>Bank Address:</b> 138 Hoyt St #2, Brooklyn, NY 11217, USA <br>
                            <b>International Routing Code (IRC):</b> 0260-13673
                        </p>
                    </div>
                    <div class="paypal-transfer">
                        <h5>PAYPAL TRANSFER</h5>
                        <img src="{{ asset('assets/img/paypal.jpg') }}" alt="">
                        <p><b>Paypal:</b> SAJIDA FOUNDATION uganda</p>
                    </div>
                    <div class="zelle-transfer">
                        <h5>ZELLE TRANSFER</h5>
                        <img src="{{ asset('assets/img/zelle.png') }}" alt="">
                        <p><b>Zelle:</b> donate@sajidauganda.org</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
