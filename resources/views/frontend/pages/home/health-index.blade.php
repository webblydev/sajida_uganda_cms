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
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-01">Read Full Story</a>
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
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-02">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/image7.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="modal case-modal" id="myModal-01">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <!-- <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                                </div> -->
                                <div class="popup-content">
                                    
                                    <h2>Madina Nakaja</h2>  
                                    <h3><b> Location:</b> Wanyama Katamba Cell, Jinja City</h3>
                                    
                                    <p>Madina Nakaja was preparing a meal when a sharp, excruciating pain struck her eyes, suddenly 
                                    plunging her into complete darkness. For years, she had experienced worsening vision but 
                                    dismissed it as a natural part of ageing. With no symptoms to suggest otherwise, and limited 
                                    means, she continued life unaware that she had been living with untreated hypertension.</p>
                                
                                    
                                    <p> Although she had sought care at a government facility four years earlier, financial hardship and 
                                    inconsistent access to healthcare had forced her to stop treatment. When she lost her sight that 
                                    day, fear and confusion consumed her family. Without a clear medical explanation, they believed 
                                    her sudden blindness was the result of witchcraft. In desperation, they turned to traditional 
                                    healers, hoping for a miracle. But days turned to months, and Madina remained in darkness.</p> 
                                    Her condition was identified through a household visit by SAJIDA Foundation’s Programme 
                                    Officer for Health and a Community Health Worker (CHW), as part of the Foundation’s 
                                    community health programme. During the assessment, the team suspected bilateral cataracts and 
                                    facilitated her referral to a government health facility, where specialists confirmed mature 
                                    cataracts in both eyes. However, due to uncontrolled hypertension, immediate surgery was 
                                    deemed unsafe. </p>
                                    
                                    <p>SAJIDA’s CHW continued regular follow-ups, provided antihypertensive medication, and 
                                    offered lifestyle counselling to support her stabilisation. After several weeks of consistent care, 
                                    Madina’s blood pressure improved enough to allow for cataract surgery. She first underwent an 
                                    operation in one eye, followed by a second procedure two months later—restoring her sight 
                                    fully. </p>
                            
                                    <p>Today, Madina can once again see her home, her family, and the community around her. She 
                                    moves independently and no longer relies on others for basic tasks. Through timely intervention, 
                                    consistent follow-up, and accessible care, her quality of life has been restored.</p>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal case-modal" id="myModal-02">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                                <!-- <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                                </div> -->
                                <div class="popup-content">
                                    
                                    <h2>Namakula Christian</h2>  
                                    <h3><b>Location:</b> School Cell, Budhumbuli, Bugembe, Jinja</h3>
                                    <p>
                                        “I am so grateful for the coming of SAJIDA Foundation. My health is better, and I pray 
                                        every day for SAJIDA to grow and help thousands and thousands of people like me.” 
                                    </p>
                                    
                                    <p>At 57, Namakula Christian is the sole income earner for her household. Despite living with a 
                                    physical disability caused by a past accident, she continues to prepare and sell food from her 
                                    homestead to support her family. Alongside her disability, she manages two chronic conditions, 
                                    HIV and hypertension, which place significant demands on both her health and her limited 
                                    income.</p>
                                     
                                    <p> While her HIV medication was being delivered by another organisation, she had no support for 
                                    her hypertensive condition. Her earnings were not sufficient to cover the cost of antihypertensive 
                                    drugs, and her inability to travel to a health facility left her with no options for consistent 
                                    treatment. Over time, her blood pressure worsened, and her overall condition deteriorated. </p>
                                    
                                    <p> In May 2024, her situation came to the attention of SAJIDA Foundation’s Community Health 
                                    Worker during enrolment under the community health programme. Given her mobility 
                                    challenges and absence of family support, the programme prioritised a home-based approach. 
                                    SAJIDA began providing free antihypertensive medication and conducted regular blood pressure 
                                    monitoring at her residence. The Community Health Worker and Programme Officer for Health 
                                    conducted ongoing visits, supported by telemedicine consultations to tailor her treatment plan. </p>
                                    
                                    <p>  In addition to clinical care, Namakula received counselling and health education to help manage 
                                    her condition and restore her confidence. With time, her blood pressure stabilised. Her energy 
                                    returned. And she was able to resume her small business—regaining both income and 
                                    independence. </p>
                                    
                                   

                                    <p>Her experience underscores the importance of accessible, decentralised health services for 
                                    individuals with layered health and social vulnerabilities, and the role of community health 
                                    systems in delivering that care directly to where it’s needed most. </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
