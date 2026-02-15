@extends('frontend.layout.main')
@section('title', 'Contact Us')
@section('content')
    <section class="hero-section">
        <div class="bg">
            @if(isset($contactUsBanner) && $contactUsBanner->background_image)
                <img src="{{ asset('images/' . $contactUsBanner->background_image) }}" alt="{{ $contactUsBanner->title ?? 'Contact Us' }}">
            @else
                <img src="assets/img/hero-img10.jpg" alt="Contact Us">
            @endif
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <div class="heading">
                        <h1>{{ $contactUsBanner->title ?? 'Contact Us' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-section">
        <div class="section-padding">
            <div class="container">
                <h1>We Are Here To Help</h1>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <p>Have a question? Concern? Request? Your questions haven't been answered? Connect with us in
                                your convenient way.</p>
                            <div class="row mt-5">
                                <div class="col-sm-7">
                                    <div class="location d-flex">
                                        <div class="icon">
                                            <img src="assets/img/location.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Location</h4>
                                            <p>House no: A, Plot: 2541, Block: 3, Katende road, Bugembe, Jinja, Uganda.</p>
                                            <p><b>Postal Address:</b> P.O Box 901211, Jinja.</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="phone d-flex">
                                        <div class="icon">
                                            <img src="assets/img/phone.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Tel No:</h4>
                                            <p>0700678206</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row mt-md-4">
                                <div class="col-sm-7">
                                    <div class="location d-flex">
                                        <div class="icon">
                                            <img src="assets/img/envelope.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Email</h4>
                                            <p>info.uganda@sajida.org</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="phone d-flex">
                                        <div class="icon">
                                            <img src="assets/img/share-nodes.png" alt="">
                                        </div>
                                        <div class="info-content">
                                            <h4>Social</h4>
                                            <div class="social-icon">
                                                <a href="https://www.facebook.com/NGOSAJIDA" target="_blank"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                                <a href="https://twitter.com/NGOSAJIDA" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                                <a href="https://www.youtube.com/@sajidafoundation1993" target="_blank"> <i
                                                        class="fa-brands fa-youtube"></i></a>
                                                <a href="mailto:info.uganda@sajida.org" target="_blank"><i class="fa-solid fa-envelope"></i></a>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            <form action="{{ route('contact-us.store') }}" method="POST">
                                @csrf
                                <label for="name">Name*</label><br>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">E-mail*</label><br>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Mobile Number*</label><br>
                                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required><br>
                                    </div>
                                </div>

                                <label for="company_name">Company Name</label><br>
                                <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}"><br>

                                <label for="contact_purpose">Contact Purpose</label><br>
                                <input type="text" id="contact_purpose" name="contact_purpose" value="{{ old('contact_purpose') }}"><br>

                                <label for="message">Your Message</label><br>
                                <textarea id="message" name="message">{{ old('message') }}</textarea>

                                <input class="submit-btn" type="submit" value="SEND >">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-16">
        <div class="section-padding">
            <div class="container">
                <div class="d-md-flex">

                    <div class="office-address d-flex flex-column justify-content-md-center">
                        <h2>Our Office</h2>
                        <p>House no: A,<br> PLot: 2541,<br>  Block: 3,<br>  Katende road,<br>  Bugembe, Jinja, Uganda.</p>
                        <p>Postal Address: P.O Box 901211, Jinja.</p>
                    </div>

                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d559.7954565843766!2d32.62464739137431!3d0.28619240466866497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sbd!4v1759044904174!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
