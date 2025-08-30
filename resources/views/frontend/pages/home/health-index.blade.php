    @extends('frontend.layout.main')
    @section('title', 'Health')
    @section('content')
        <section class="hero-section">
            <div class="bg">
                <img src="{{ asset('assets/img/hero-img5.jpg') }}" alt="">
            </div>
            <div class="section-padding">
                <div class="container">
                    <div class="hero-content">
                        <div class="heading">
                            <h1>Health</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper-15 section">
            <div class="section-padding">
                <div class="container">
                    <div class="content">
                        <h1 class="title">Background</h1>
                        <p>With 5.85 million people and a rising disease burden, Uganda faces severe healthcare challenges.
                            SAJIDA Foundation’s health program enhances access through digital health profiling,
                            telemedicine, and community outreach, delivering preventive, promotive, and curative care to
                            build a stronger, more resilient healthcare system.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper-16 section">
            <div class="bg">
                <img src="{{ asset('assets/img/bg4.jpg') }}" alt="">
            </div>
            <div class="section-padding">
                <div class="container">
                    <div class="content-container">
                        <div class="left-side">
                            <h2>Challenges <br> to Tackle</h2>
                        </div>
                        <div class="right-side">
                            <div class="content">
                                <h3>The Disproportion</h3>
                                <p>Uganda has one of the world’s lowest doctor-patient ratios at 1:25,000, leaving millions
                                    without essential medical care​. The country’s healthcare system is further strained by
                                    the high prevalence of communicable and non-communicable diseases, inadequate health
                                    facilities, and the financial burden of treatment.</p>
                                <h3>Facts</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Non-communicable Diseases (NCDs): 36% of all deaths (2019)</p>
                                        <p>Pneumonia: 4th leading cause of death</p>
                                        <p>Malaria: 29.1% of all outpatient visits</p>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <p>Malaria: 29.1% of all outpatient visits</p>
                                    </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper-17 section">
            <div class="section-padding">
                <div class="container">
                    <h1>Our Approach</h1>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="content">
                                <h3>Community Based Healthcare <br> Models</h3>
                                <p>SAJIDA Foundation’s health program tackles these challenges by implementing
                                    community-based healthcare models that integrate telemedicine, digital health tracking,
                                    and structured referral systems. Trained Community Health Workers (CHWs) conduct
                                    household screenings, raise health awareness, and identify at-risk individuals for early
                                    intervention. Static clinics, staffed with clinical officers, provide primary care,
                                    while telemedicine consultations connect patients with MBBS doctors for specialized
                                    support.</p>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="image">
                                <img src="{{ asset('assets/img/image8.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 order-xl-1 order-2">
                            <div class="image">
                                <img src="{{ asset('assets/img/image6.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 order-xl-2 order-1">
                            <div class="content content2">
                                <h3>Health Financing</h3>
                                <p>Additionally, SAJIDA facilitates health financing, ensuring affordability and access to
                                    essential medical services. This holistic approach has already demonstrated success,
                                    with 600+ patients served in static clinics within seven months and a fivefold increase
                                    in women seeking healthcare in similar models​. Through its integrated,
                                    technology-driven interventions, SAJIDA Foundation is bridging critical healthcare gaps
                                    and empowering communities with sustainable health solutions.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper-18">
            <div class="bg">
                <img src="{{ asset('assets/img/bg5.jpg') }}" alt="">
            </div>

            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="title">
                                <h1>Impacts Made</h1>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="content">
                                <p>SAJIDA Foundation’s health initiatives in Uganda aim to bridge healthcare gaps and
                                    empower vulnerable communities through digital health profiling, telemedicine, and
                                    community-driven awareness. </p>
                            </div>
                        </div>
                    </div>

                    <div class="counters d-flex justify-content-between">
                        <div class="stat" data-count="900" data-step="20" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">Individuals</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="67" data-suffix="%" data-step="1" data-plus="true">
                            <div class="number">0%</div>
                            <div class="label">Women</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="200" data-step="5" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">Children 5 & Under</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="600" data-step="10" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">Patients Served in Static Clinics in 7 Months</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="926500" data-step="10000" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">UGX Paid in Health Financing in 2 Months</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper-19 section">
            <div class="section-padding">
                <div class="container">
                    <div class="slider owl-carousel">
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Before SAJIDA Foundation’s health program, I struggled to get medical care for my
                                    children. My youngest suffered from repeated fevers, and the nearest clinic was miles
                                    away. Now, with community health workers visiting our village and telemedicine services
                                    available, I can get medical advice and treatment without delay. My children are
                                    healthier, and I finally have peace of mind knowing help is always within reach.</p>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/image7.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Before SAJIDA Foundation’s health program, I struggled to get medical care for my
                                    children. My youngest suffered from repeated fevers, and the nearest clinic was miles
                                    away. Now, with community health workers visiting our village and telemedicine services
                                    available, I can get medical advice and treatment without delay. My children are
                                    healthier, and I finally have peace of mind knowing help is always within reach.</p>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/image7.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Before SAJIDA Foundation’s health program, I struggled to get medical care for my
                                    children. My youngest suffered from repeated fevers, and the nearest clinic was miles
                                    away. Now, with community health workers visiting our village and telemedicine services
                                    available, I can get medical advice and treatment without delay. My children are
                                    healthier, and I finally have peace of mind knowing help is always within reach.</p>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/image7.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
