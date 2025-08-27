@extends('frontend.layout.main')
@section('title', 'Donation')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-newsroom-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.9), rgba(30, 30, 30, 0.9)), url( {{ asset('images/'. $donationBanner->banner_image) }} );">
    <div class="container">
        <div class="container">
            <div class="ic-banner-content">
                @php
                $titleWords = explode(' ', $donationBanner->title);
                $firstWord = array_shift($titleWords);
                $remainingWords = implode(' ', $titleWords);
            @endphp
                <h1><span>{{$firstWord}} </span> {{$remainingWords}} <img src="{{ asset('assets/images/text-line-group.png')}}" alt="shape"></h1>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->
@include('include.message')
<section class="ic-donation-info ic-section-space">

    <div class="container">
        <!-- ic-heading -->

        <div class="ic-section-header">
            <h1 class="mb-3">{{$donationBanner->heading}}</h1>
            <p>
                {!! $donationBanner->information !!}
            </p>
        </div>

        <div class="ic-contact-map-form-wrapper">
            <div class="ic-single-item left-content"  style="background-image: url( {{ asset('images/'. $donationBanner->form_image) }} );">
                
            </div>
            <div class="ic-single-item ">
                <div class="ic-contact-form">


                    <div class="ic_form ">
                        {{-- <form action="{{ route('donation-info/store')}}"> --}}
                            <form action="{{ route('donation-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row mb-30">
                                <!-- name -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <!-- mail -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <!-- phone -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Phone *</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                <!-- amount -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Donation Amount *</label>
                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                                <!-- transaction id -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Transaction Id *</label>
                                    <input type="text" name="transactionId" class="form-control" required>
                                </div>
                                <!-- date -->
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Date *</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <!-- upload -->
                                <div class="col-md-12 mb-15">
                                    <label class="form-label">File Upload </label>
                                    <input type="file" name="attachment" class="form-control">
                                </div>

                            </div>


                            <button class="ic-about-btn" tabindex="0">Submit ></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="bank-info-wrapper pt-5 mt-5">

            <h2 class="info-title text-dark-gray fw-500">BANKING INFORMATION</h2>

            <div class="row">

                <div class="col-md-6 col-lg-4">
                    <div class="list-box">
                        <h4>LOCAL DONATION</h4>
                        <div class="bar"></div>
                        <div class="list-text">
                            <p>
                                <b>A/C Name:</b> SAJIDA FOUNDATION<br />
                                <b>Bank Name:</b> BRAC Bank Ltd.<br />
                                <b>A/C NO:</b> 1001324680030<br />
                                <b>Bank Branch:</b> Gulshan Branch, Dhaka<br /> 
                                <b>Routing No:</b> 060261726
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="list-box">
                        <h4>INTERNATIONAL DONATION</h4>
                        <div class="bar"></div>
                        <div class="list-text">
                            <p>
                                <b>A/C Name:</b> SAJIDA FOUNDATION USA INC<br />
                                <b>Beneficiary Bank Name:</b> TD Bank<br />
                                <b>A/C NO:</b> 4410385804<br />
                                <b>Bank Address:</b> 138 Hoyt St #2, Brooklyn, NY 11217, USA<br />
                                <b>International Routing Code (IRC):</b> 0260-13673
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="list-box">
                        <h4>MOBILE BANKING DONATION </h4>
                        <div class="bar"></div>
                        <div class="list-text">
                            <p>
                                <b>bKash No:</b> +8801777773089<br />
                                (This is a merchant account, please choose the payment option and mention
                                your email address in the reference option)
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            
        </div> --}}

    </div>


    <!-- </div> -->
</section>
<!-- news -->
@endsection