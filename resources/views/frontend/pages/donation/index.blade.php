@extends('frontend.layout.main')
@section('title', 'Donation')
@section('content')
<style>
    .paypal-button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-transform: uppercase;
      color: #fff;
      background-color: #0070ba; /* PayPal's blue color */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
  
    .paypal-button:hover {
      background-color: #004277; /* Darker shade of PayPal's blue color on hover */
    }
  
    .paypal-icon {
      font-size: 24px;
      margin-right: 10px;
    }
  </style>
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
<section class="ic-donation-info ic-section-space pt-4">

    <div class="container">
        <!-- ic-heading -->

        <div class="ic-section-header text-start pb-0">
            <h1 class="mb-3 info-title text-dark-gray fw-500">{{$donationBanner->heading}}</h1>
            <p>
                {{-- Your contribution to SAJIDA USA plays a crucial role in supporting the vital programmes of SAJIDA Foundation, combating poverty, building livelihoods, and advancing healthcare for communities in need across Bangladesh. SAJIDA Foundation utilises your donations to seed fund and implement various programmes and investments. Additionally, it actively engages in raising funds and establishing partnerships to expand the reach and impact of these initiatives. Join us in making a difference today.
                SAJIDA USA is registered as a 501(c)(3) non-profit organization. Contributions to SAJIDA USA are tax-deductible to the extent permitted by law. <br><br>
                Consider supporting SAJIDA Foundation’s work through donations of stock, mutual funds, IRA charitable rollovers or through a Donor Advised Fund or investing in SAJIDA’s social ventures. Contact us to learn more at <a href="#" class="text-link">partnerships@sajidausa.org</a>  --}}
                {!! $donationBanner->information !!}
            </p>
            {{-- <div class="ic-donation-form-wrapper mt-5">
                <h2 class="">Donate Now</h2>
                <div class="ic-contact-form">
                    <div class="ic_form ">
                        <form action="{{ route('processTransaction') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-30">
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Donation Amount *</label>
                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-15">
                                    <button class="ic-about-btn" tabindex="0" style="margin-top: 27px"><i class="fab fa-paypal paypal-icon"></i> Pay with PayPal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            
        </div>

        {{-- <div class="ic-contact-map-form-wrapper mt-5">
            <div class="ic-single-item left-content"  style="background-image: url( {{ asset('images/'. $donationBanner->form_image) }} );">
                
            </div>
            <div class="ic-single-item ">
                <div class="ic-contact-form">


                    <div class="ic_form ">
                            <form action="{{ route('donation-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row mb-30">
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Phone *</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Donation Amount *</label>
                                    <input type="number" name="amount" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Transaction Id *</label>
                                    <input type="text" name="transactionId" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-15">
                                    <label class="form-label">Date *</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                
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

        </div> --}}

        <div class="bank-info-wrapper mt-5 mb-3">

            <h2 class="info-title text-dark-gray fw-500 pt-4">PAYMENT CHANNELS</h2>

            <div class="row">

                <!--<div class="col-md-6 col-lg-3 mb-5">-->
                    
                <!--    <div class="list-box">-->
                <!--        <h4>BANGLADESH</h4>-->
                <!--        <div class="bar"></div>-->
                <!--        <div class="list-text">-->
                <!--            <p>-->
                <!--                <b>Bkash:</b> 01777773089<br />-->
                <!--                <p>*<i>This is a merchant account. Please choose the payment option and mention your email address in the reference option.</i> </p>-->
                <!--            </p>-->
                <!--        </div>-->
                <!--        <hr>-->
                <!--        <div class="list-text">-->
                <!--            <h4>Bank Transfer</h4>-->
                <!--            <p>-->
                <!--                <b>A/C Name:</b> SAJIDA FOUNDATION<br />-->
                <!--                <b>Bank Name:</b> BRAC Bank Ltd.<br />-->
                <!--                <b>A/C NO:</b> 1001324680030<br />-->
                <!--                <b>Bank Branch:</b> Gulshan Branch, Dhaka<br /> -->
                <!--                <b>Routing No:</b> 060261726-->
                <!--                <b>SWIFT:</b> BRAKBDDH-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    </div> -->
                <!--</div>-->

                <div class="col-md-6 col-lg-3 mb-5">
                    <div class="list-box">
                        <h4>INTERNATIONAL</h4>
                        <div class="bar"></div>
                        <div class="list-text">
                            <p>
                                <b>A/C Name:</b> SAJIDA FOUNDATION USA INC<br />
                                <b>Beneficiary Bank Name:</b> TD Bank<br />
                                <b>A/C NO:</b> 4410385804<br />
                                <b>SWIFT Code:</b> NRTHUS33XXX<br />
                                <b>Bank Address:</b> 138 Hoyt St #2, Brooklyn, NY 11217, USA<br />
                                <b>International Routing Code (IRC):</b> 0260-13673
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-5">
                    
                    <div class="list-box">
                        <h4>PAYPAL TRANSFER</h4>
                        <div class="bar"></div>
            
                        <div class="list-text">
                            
                            <img class="w-100" src="https://sajidausa.org/assets/images/paypal-1.jpg" alt="" srcset="">
                            <div class="mt-3">
                                <p class="mt-3 mb-3"> <b>Paypal:</b> <i> SAJIDA FOUNDATION USA </i></p>
                                <a href="https://www.paypal.com/donate/?hosted_button_id=3MX5FCZZM5X5Y" target="blank" tabindex="0"
                                style="    height: 50px;
                                            -webkit-border-radius: 5px;
                                            -moz-border-radius: 5px;
                                            border-radius: 5px;
                                            background-color: #3C4150;
                                            color: #FFFFFF;
                                            display: inline-flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-weight: 500;
                                            font-size: 18px;
                                            padding: 0 30px;
                                            transition: ease-in-out 0.3s;"
                                >Pay with Paypal <i class="ri-arrow-right-s-line"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-6 col-lg-3 mb-5">
                    
                    <div class="list-box">
                        <h4>ZELLE TRANSFER </h4>
                        <div class="bar"></div>
                        <div class="list-text">
                            <img class="w-100" src="https://sajidausa.org/assets/images/zelle.png" alt="" srcset="">
                        
                            <p class="mt-3 mb-3"><b>Zelle:</b> <i>donate@sajidausa.org</i></p>
                            
                            <a href="https://www.zellepay.com/get-started" target="blank" tabindex="0"
                                style="    height: 50px;
                                            -webkit-border-radius: 5px;
                                            -moz-border-radius: 5px;
                                            border-radius: 5px;
                                            background-color: #3C4150;
                                            color: #FFFFFF;
                                            display: inline-flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-weight: 500;
                                            font-size: 18px;
                                            padding: 0 30px;
                                            transition: ease-in-out 0.3s;"
                                >Pay with Zelle <i class="ri-arrow-right-s-line"></i></a>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-6 col-lg-3">
                    
                    
                    
                </div>
                
                

            </div>
            
        </div>
        {{-- <div class="bank-info-wrapper mt-5 mb-3">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="list-box d-flex">
                        <div>
                            <h4>Or</h4>
                        </div>
                        <div style="margin-top: -7px !important; margin-left: 16px;">
                            <button class="ic-about-btn" tabindex="0" data-toggle="modal" data-target="#payWithPaypal"><i class="fab fa-paypal paypal-icon"></i> Pay with PayPal</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> --}}
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="payWithPaypal" tabindex="-1" role="dialog" aria-labelledby="payWithPaypalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Donation Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('processTransaction') }}" method="POST" enctype="multipart/form-data" onsubmit="return onSubmit()">
            <div class="modal-body">
                    @csrf
                    <div class="row mb-30">
                        <div class="col-md-12 mb-15">
                            <label class="form-label">Donation Amount *</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save">Proceed to payment</button>
            <div class="spinner-border hello text-primary" role="status" style="position: fixed; top: 50%; left: 50%; visibility: hidden">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
        </form>
        </div>
        </div>
    </div>

<!-- </div> -->
</section>

<div class="donation-contact">
    <p><span class="fw-500 fs-22">Questions about your donation? </span> <br> Please contact SAJIDA USA at <a href="#" class="text-link">partnerships@sajidausa.org</a></p>
</div>


<!-- news -->
@endsection

<script>
    const onSubmit = () => {
        const spinner = document.querySelector('.hello');
        const button = document.querySelector('.save');
        button.disabled = true;
        spinner.style.visibility = 'visible';
        return true;
    }
</script>