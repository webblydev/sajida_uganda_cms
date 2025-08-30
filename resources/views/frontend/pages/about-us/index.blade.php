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
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-01">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Zahida Fizza Kabir<span>Chief Executive Officer</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-02">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Muhymin Chowdhury <span>Director - Impact Investment and Partnerships</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-03">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img3.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Person Name <span>Designation</span></h4>
                        </div>
                    </div>
                    <div class="single-slider-item" data-bs-toggle="modal" data-bs-target="#myModal-04">
                        <div class="image">
                            <img src="{{ asset('assets/img/governing-body-img4.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>Ishtiaq Mohiuddin <span>Deputy Chief Executive Officer - Microfinance</span></h4>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="myModal-01">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                                </div>
                                <div class="popup-content">
                                    
                                    <h4>Zahida Fizza Kabir <span>Chief Executive Officer</span></h4>
                                    <p>Ms. Zahida Fizza Kabir, the Chief Executive Officer of SAJIDA Foundation, boasts over 30 years of leadership experience across financial services, healthcare, and community development. She has been integral to SAJIDA since its inception in 1993. SAJIDA operates through 400 unit offices and 6,000 full time staff in Bangladesh alone.

                                    Under Ms. Kabir's guidance, SAJIDA has established six portfolio companies, focusing on mental health, geriatric care & caregiving services, and support children with development delays. She also serves as the Managing Director of two specialised healthcare enterprises: Home and Community Care Limited and Inner Circle Limited.

                                    In addition, Ms. Kabir chairs the Psychological Mental Health and Wellness Clinic and holds positions on the boards of Renata Limited, SAJIDA Uganda, and SAJIDA USA.

                                    Ms. Kabir's academic qualifications include a Post Graduate Diploma in Organisational Leadership from Said Business School, University of Oxford, a Master’s Degree in International and Intercultural Management from Vermont, USA, and a Bachelor’s Degree in Social Work from the University of the Philippines.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="myModal-02">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img2.png') }}" alt="">
                                </div>
                                <div class="popup-content">
                                    
                                    <h4>Muhymin Chowdhury <span>Director - Impact Investment and Partnerships</span></h4>
                                    <p>Muhymin Chowdhury currently serves as the Director of Impact Investment & Partnerships at SAJIDA Foundation. In this role, he leads the management of an impact fund aimed at fostering the growth of startups and build strategic partnerships with institutional stakeholders to expand SAJIDA’s development programmes.

                                    Previously, Muhymin held the position of Deputy Challenge Fund Manager at Nathan Associates, where he successfully structured 36 results-based financing agreements worth GBP 27 million with key financial market actors. Earlier at Shorebank International, Muhymin managed a USD 10 million performance-based investment in bKash, a leading mobile money service provider.

                                    Muhymin's professional experience extends across Nepal, Pakistan, and Kenya, where he collaborated with commercial banks, international non-governmental organisations (INGOs), and bilateral donors on financial product development, mobile money agent network expansion, and customer segmentation strategies.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="myModal-03">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img3.png') }}" alt="">
                                </div>
                                <div class="popup-content">
                                    
                                    <h4>Person <span>Designation</span></h4>
                                    <p>Details</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="myModal-04">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img4.png') }}" alt="">
                                </div>
                                <div class="popup-content">
                                    
                                    <h4>Ishtiaq Mohiuddin <span>Deputy Chief Executive Officer - Microfinance</span></h4>
                                    <p>Mr. Ishtiaq Mohiuddin is the Deputy Chief Executive Officer of Development Programmes and Risk Management Unit of SAJIDA Foundation. He has extensive experience in Bangladesh and abroad with financial institutions and non-government organisations. Before joining SAJIDA, Mr. Mohiuddin worked as the Deputy Managing Director of BRAC Bank. He has also worked as Director, Microfinance Programme of BRAC & BRAC International. His international experience includes working for FINCA, USA as Country Manager in Malawi and Operations Manager in South Africa. He has also managed portfolios in Saint Lucia and Grenada for Caribbean Microfinance Ltd.  

                                    Mr. Mohiuddin holds an MBA and a Bachelor's degree in Accounting from Southeastern Louisiana University, Hammond, Louisiana, USA. </p>
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
