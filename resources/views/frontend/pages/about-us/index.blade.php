@extends('frontend.layout.main')
@section('title', 'About Us')
@section('content')
    <section class="hero-section">
        <div class="bg">
            <img src="assets/img/hero2.jpg" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">

                    <div class="heading">
                        <h1>About Us</h1>
                    </div>

                </div>

            </div>


        </div>


    </section>

    <section class="wrapper-8 section">
        <div class="section-padding">
            <div class="container">
                <div class="content-container">
                    <h1>Who We Are</h1>
                    <p>SAJIDA Foundation is a value-driven, non-government organisation. It embodies the principle of
                        corporate philanthropy, with 51% shareholding of Renata Ltd, one of the fastest growing
                        pharmaceutical and animal health product companies in Bangladesh. The organisation, founded in 1993,
                        aims to empower communities, catalyse entrepreneurship, build equity and establish enterprises for
                        good with an overarching vision of ensuring health, happiness, and dignity for all.</p>
                    <div class="btns">
                        {{-- got to governing body section --}}
                        <a href="#wrapper-9" class="btn">Governing Body</a>
                        <a href="https://www.sajida.org/we-are-sajida/sajida-story/" class="btn">our history</a>
                    </div>
                </div>
                <div class="gallery">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/gallery-img1.jpg') }}" alt="">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/gallery-img2.jpeg') }}" alt="">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/gallery-img3.jpg') }}" alt="">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('assets/img/gallery-img4.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-9 section" id="wrapper-9">
        <div class="section-padding">
            <div class="container">
                <div class="headline">
                    <h1>Governing Body</h1>
                    <p>We drive large-scale transformation by empowering women and their families to overcome poverty, build
                        resilience, and foster resourcefulness.</p>
                </div>
                <div class="slider owl-carousel">
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img3.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img4.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/popup-img.png') }}" alt="">
                                </div>
                                <div class="popup-content">
                                    
                                    <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                                    <p>Ms. Zahida Fizza Kabir has 30+ years of leadership in finance, healthcare, and
                                        community development. Since 1993, she has expanded SAJIDA to 400 offices with 6,000
                                        staff. She has established six portfolio companies in mental health, geriatric care,
                                        and child development and leads two specialized healthcare enterprises. She also
                                        chairs the Psychological Mental Health and Wellness Clinic and serves on the boards
                                        of Renata Limited, SAJIDA Uganda, and SAJIDA USA. Ms. Kabir holds degrees from
                                        Oxford, Vermont, and the University of the Philippines. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-10 section">
        <div class="bg">
            <img src="{{ asset('assets/img/bg2.png') }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <h1>The Future We Look <br> Forward to</h1>
                <div class="content-container">
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/target 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>Our Mission</h3>
                            <p>As well as improving other economic opportunities for our targeted beneficiaries by expanding
                                access to finance for micro, small and medium enterprises.</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="image">
                            <img src="{{ asset('assets/img/binoculars 1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h3>Our Mission</h3>
                            <p>As well as improving other economic opportunities for our targeted beneficiaries by expanding
                                access to finance for micro, small and medium enterprises.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-11 section">
        <div class="section-padding">
            <div class="container">
                <div class="content-container">
                    <div>
                        <h1>Guiding Principles</h1>
                    </div>
                    <div class="right-side">
                        <p>We drive large-scale transformation by empowering women and their families to overcome poverty,
                            build resilience, and <br> foster resourcefulness.</p>
                    </div>
                </div>
                <div class="items-container">
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img1.png') }}" alt="">
                        <p>Transparency & <br> Accountability</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img2.png') }}" alt="">
                        <p>Inclusiveness & <br> Dignity</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img3.png') }}" alt="">
                        <p>Compassion & <br> Empathy</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img4.png') }}" alt="">
                        <p>Innovation & <br> Quality</p>
                    </div>
                    <span class="item-separator"></span>
                    <div class="item">
                        <img src="{{ asset('assets/img/item-img5.png') }}" alt="">
                        <p>Empowering <br> Mothers & Families</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-12 section">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Make Your Contribution</h1>
                    <a href="{{ route('donation.index') }}" class="btn">Donate Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection
