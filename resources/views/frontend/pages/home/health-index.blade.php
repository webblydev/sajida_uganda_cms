    @extends('frontend.layout.main')
    @section('title', 'Health')
    @section('content')
        <section class="hero-section health-hero">
            <div class="bg">
                <img src="{{ asset('assets/img/hero-img5.jpg') }}" alt="">
            </div>
            <div class="section-padding">
                <div class="container">
                    <div class="hero-content">
                        <div class="heading">
                            <h1>Health Program</h1>
                            <p>Uganda has one of the world’s lowest doctor-to-patient ratios—1 for every 25,000 people—leaving many without essential care. The Busoga region is hit hardest, with poverty affecting 29.2% of its population compared to the national average of 20.3%.</p>
                            <p>To address this, SAJIDA Uganda has introduced a community-based healthcare model that uses telehealth and digital health tracking to deliver preventive, promotive, and curative care to underserved communities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--
        <section class="wrapper-15 section">
            <div class="section-padding">
                <div class="container">
                    <div class="content">
                        <h1 class="title">Background</h1>
                        <p>Uganda has one of the world’s lowest doctor-to-patient ratios—1 for every 25,000 people—leaving many without essential care. The Busoga region is hit hardest, with poverty affecting 29.2% of its population compared to the national average of 20.3%.</p>
                        <p>To address this, SAJIDA Uganda has introduced a community-based healthcare model that uses telehealth and digital health tracking to deliver preventive, promotive, and curative care to underserved communities.</p>
                    </div>
                </div>
            </div>
        </section> -->

      {{--  <section class="wrapper-16 section">
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
        </section> --}}

        <section class="wrapper-17 section">
            <div class="section-padding">
                <div class="container">
                    <h1>Our Approach</h1>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="content">
                                <!-- <h3>Community Based Healthcare <br> Models</h3> -->
                                <p>
                                Building on program implementation learnings from Bangladesh, SAJIDA Uganda is implementing a community-based health program in Bugembe, a town in the Jinja district of Busoga. </p>
                                <p> The program is anchored in a four-tier care model that includes community health workers, satellite clinics, telemedicine consultations, and partnerships with local health facilities for referrals.</p>
                                <P>
                                Trained Community Health Workers (CHWs) conduct household screenings, raise health awareness, and identify at-risk individuals for early intervention. Satellite clinics, staffed by clinical officers, deliver primary care, while telemedicine connects patients with MBBS doctors for specialized consultations. </p>
                                <p> To ensure affordability and access, SAJIDA Uganda also facilitates health financing, enabling households to obtain essential diagnostics, medicines, consultations, and maternity services.


                                </p>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="image">
                                <img src="{{ asset('assets/img/image8.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                 {{--   <!-- <div class="row">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="image">
                                <img src="{{ asset('assets/img/image6.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
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

                    </div> --> --}}
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
                        <div class="col-lg-7">
                            <div class="title">
                                <h1>Impacts Made</h1>
                            </div>
                        </div>
                        <!-- <div class="col-lg-5">
                            <div class="content">
                                <p>SAJIDA Foundation’s health initiatives in Uganda aim to bridge healthcare gaps and
                                    empower vulnerable communities through digital health profiling, telemedicine, and
                                    community-driven awareness. </p>
                            </div>
                        </div> -->
                    </div>

                    <div class="counters d-flex justify-content-between">

                        <div class="stat" data-count="100" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0%</div>
                            <div class="label">pregnant mothers took folic acid supplements, surpassing the regional average</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="93" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">of pregnant mothers completed 4+ antenatal visits, nearly double the sub-regional average</div>
                        </div>
                        <span class="border"></span>


                        <div class="stat" data-count="1070" data-step="20" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">lives impacted</div>
                        </div>
                        <span class="border"></span>



                        <div class="stat" data-count="78" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">child vaccination coverage, up from 53%</div>
                        </div>
                        <span class="border"></span>

                        <div class="stat" data-count="2080500" data-step="50000" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">UGX paid for health financing</div>
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
                                <p>Madina Nakaja, a 56-year-old resident of Wanyama Katamba Cell in Jinja City, lived unaware of the silent threat of hypertension. With no symptoms to warn her, she carried on, dismissing her worsening vision as aging. For years, she lived with untreated hypertension, a silent threat </p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-01">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-1.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>kawala Rosemary, a 33-year-old mother of three from the Budhumbuli area of Jinja City, had been silently struggling with hypertension since 2020. Although she was diagnosed at a government health facility, her financial situation made it nearly impossible to adhere to the prescribed treatment.</p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-02">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Namakula Christian, a 57-year-old woman, lives with a disability resulting from a past accident. In addition to being HIV positive, she also suffers from hypertension. Despite these challenges, she remains the primary breadwinner for her family. When SAJIDA’s Community Health Worker  </p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-03">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-3.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Nansubuga Mwamini from joined Sajida due to a struggling business and insufficient capital, she was attracted by to join Sajida because of the low interest rate and no admission fee. Her business capital (loan size) increased from 400,000 to 800,000. She indicated that before joining </p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-04">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-4.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Namanda Lydia joined Sajida when her capital of 300,000 in her retail shop and business was not moving well. She was introduced to Sajida by a friend and was attracted by the low interest rates. Lydia’s Loan size increased from 400,000 to 700,000 during the course of one year under group  </p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-05">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-5.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Bogere Kafeero with 20 years of experience, Kafeero accessed a loan through Sajida microfinance in 2024. Bogere started with a loan of l,000,000 which later increased to 1,500,000 This allowed him to expand his butchery in jinja central market, increasing his income and </p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-06">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-6.jpg') }}" alt="">
                            </div>
                        </div>
                     {{--   <!-- <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>Starting with a loan of 500,000 from Sajida microfinance, Mariam launched a charcoal business. Over time, with additional loan of 600,000 and 800,000, she grew her operation and was able to employ 2 people full time. Her success enabled her to send her children to school and transform </p>

                                <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-07">Read Full Story</a>

                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-7.jpg') }}" alt="">
                            </div>
                        </div> -->--}}
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>My name is Atimango Stella a resident Nawansinge, Buligo subcounty in Iganga town. I have been a member of Sajida since last year I am currently in 2ndcycle with Sajida under SML loan product. This is my success story with Sajida. </p>

                                <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-08">Read Full Story</a>

                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-8.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>My name is Bugonzi Sophie a residence of Buligo Iganga district. I am a client of Sajida microfinance I sell clothes in Nabidonga market. Below is my success story
                                    Sajida Microfinance came in at the time I needed the most I was having challenge of low working capital in my business.  </p>

                                <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-09">Read Full Story</a>

                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-9.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>My name is Namataba Norah, a business lady in Iganga town. I have a boutique located along Kaliro road in Iganga municipality. I first joined Sajida Microfinance under SML loan product where I was disbursed to a loan of 500,000 UGX. </p>

                                <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-10">Read Full Story</a>

                            </div>
                            <div class="image">
                                <img src="{{ asset('assets/img/story-10.jpg') }}" alt="">
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

                                    <p>
                                        Madina Nakaja, a 56-year-old resident of Wanyama Katamba Cell in Jinja City, lived unaware of the silent threat of hypertension. With no symptoms to warn her, she carried on, dismissing her worsening vision as aging. For years, she lived with untreated hypertension, a silent threat eroding her well-being. Though she sought care at a government facility four years ago, financial hardship and inconsistent healthcare access forced her to discontinue treatment. One fateful morning, as she peered into her stove to prepare a meal, an excruciating pain struck her eyes, plunging her into total darkness. Fear consumed her and her family, who, unable to understand the medical cause, believed her sudden blindness was the result of witchcraft. In desperation, they turned to traditional healers, clinging to the hope of a miracle. But days turned to months, and her world remained shrouded in darkness, leaving her in deep despair. <br>
                                        Hope arrived when SAJIDA Foundation’s community health program reached her doorstep. Identified as a beneficiary, Madina and her family were given a new chance at life. During a household visit, SAJIDA Foundation’s Program Officer for Health, alongside a dedicated Community Health Worker (CHW), assessed her condition and suspected bilateral cataracts. Understanding the urgency, SAJIDA’s team facilitated her referral to a government health facility for further evaluation. With unwavering support, SAJIDA’s CHW guided Madina through the healthcare system, where specialists confirmed mature cataracts in both eyes. However, her uncontrolled hypertension posed a significant risk to surgery. Determined to restore her sight, SAJIDA’s CHW provided consistent follow-ups, ensuring she received proper medication and lifestyle counseling to stabilize her blood pressure. After weeks of diligent care, her hypertension was managed, allowing her to undergo surgery. The first cataract operation restored vision in one eye, and two months later, the second procedure brought full clarity back to her world. For the first time in years, Madina could see clearly her family’s faces, her home, and the community that stood by her side. <br>
                                        Madina’s story is one of resilience, transformation, and the profound impact of accessible healthcare. Today, she moves through life with renewed independence and confidence, no longer reliant on others to navigate her surroundings. More than just restoring her sight, SAJIDA Foundation gave her dignity, hope, and a future filled with possibilities.

                                    </p>



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

                                    <h2> Kawala Rosemary</h2>
                                    <h3><b>Location:</b> School Cell, Budhumbuli, Bugembe, Jinja, Uganda</h3>
                                    <p>
                                       <b>Initial Health Condition:</b>  Uncontrolled Hypertension with Mild Heart Failure <br>
                                        kawala Rosemary, a 33-year-old mother of three from the Budhumbuli area of Jinja City, had been silently struggling with hypertension since 2020. Although she was diagnosed at a government health facility, her financial situation made it nearly impossible to adhere to the prescribed treatment. As a stay-at-home mother with no stable income and a husband working low-wage, informal jobs, Rosemary faced daily stress and uncertainty. The burden of her household, coupled with the inability to afford medication, caused her condition to deteriorate over time. Eventually, she became partially paralyzed and bedridden—unable to care for her children or manage basic daily tasks. <br>
                                        <b>How SAJIDA Foundation Supported Her:</b>  <br>
                                        Rosemary’s condition came to light when she was enrolled in SAJIDA Foundation’s community health program. A trained Community Health Worker (CHW) identified her symptoms and quickly referred her to the Program Officer (PO) for health, a trained paraprofessional operating at SAJIDA’s community-based static clinic. After an initial assessment, the PO facilitated a teleconsultation with one of SAJIDA’s telemedicine doctors to initiate an upgraded and personalized treatment plan. <br>
                                        From there, the Foundation ensured that Rosemary received consistent access to antihypertensive medication and began home-based blood pressure monitoring. She was also supported through regular clinic follow-ups, stress management counseling, and home visits. SAJIDA’s holistic and responsive approach led to visible improvement in her condition. <br>
                                        <b>Current Status:</b> <br>
                                        Today, Rosemary’s health has significantly improved. She is able to walk independently, attend church, and perform daily household activities—something she had once feared she might never do again. Her blood pressure is under control, and her sense of hope and well-being has been restored. <br>
                                        <b>Impactful Quote from Rosemary:</b> <br>
                                        "I can now walk to church and cook for my children again. SAJIDA Foundation brought me back to life when I had given up."

                                    </p>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal case-modal" id="myModal-03">
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

                                    <h2> Namakula Christian</h2>
                                    <h3><b>Location:</b> School Cell, Budhumbuli, Bugembe, Jinja, Uganda</h3>
                                    <p>
                                       Namakula Christian, a 57-year-old woman, lives with a disability resulting from a past accident. In addition to being HIV positive, she also suffers from hypertension. Despite these challenges, she remains the primary breadwinner for her family. When SAJIDA’s Community Health Worker  first met her in May 2024 after her enrollment within the Health program she was in a dire state—struggling to survive by cooking and selling foods at her homestead. This small income barely sustained her family and left her unable to purchase her hypertensive medications regularly this was also worsen by her inability to move to health facility. Although her HIV medications were being delivered to her home by another organization, there was no support for her hypertension management and her herpertension kept worsening day by day. <br>

                                        <b>How SAJIDA Foundation Supported Her:</b>  <br>

                                        Through SAJIDA Foundation’s intervention began providing Namakula with free antihypertensive medication and regular blood pressure monitoring at her home.  Since Namakula is unable to move to the static clinic and with no supportive family member, The program people continuously visited her at her home with the SAJIDA’s telemedicine support to assess her and initiate her on the right treatment. Simultaneously, program people offered her supportive  treatment through councilling and health education. Over time, her blood pressure began to stabilize, and her overall health improved significantly.<br>

                                        <b>Current Status:</b> <br>

                                        Today, Namakula is much better than before. Her health has improved, and she has resumed her small business with renewed energy and hope. <br>

                                        <b>Impactful Quote from Rosemary:</b> <br>

                                        “I am so grateful for the coming of SAJIDA Foundation. My health is better, and I pray every day for SAJIDA to grow and help thousands and thousands of people like me.”

                                    </p>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal case-modal" id="myModal-04">
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

                                    <h2> Nansubuga Mwamini</h2>
                                    <h3><b>Location:</b> Namizzi, Jinja</h3>
                                    <p>
                                       <b>Business type:</b>  Farmer, Poultry, Retail shop</b> <br>
                                       <b>Group/Individual loan. Group</b> <br>
                                        Nansubuga Mwamini from joined Sajida due to a struggling business and insufficient capital, she was attracted by to join Sajida because of the low interest rate and no admission fee. Her business capital (loan size) increased from 400,000 to 800,000. She indicated that before joining Sajida she was able to cultivate half an acre of bananas and passion fruits and could get around 600,000 from the harvest. Ever since she joined Sajida, her harvests tripled. She wants to make her garden bigger after getting 4th cycle loan when she expects it will be around 900,000 ugx. They work together with her husband in her garden and they are very happy to be with Sajida microfinance. She is always grateful to Sajida that she is getting support from the organization.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal case-modal" id="myModal-05">
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

                                    <h2> Namaganda Lydia</h2>
                                    <h3><b>Location:</b> Wanyange, Jinja</h3>
                                    <p>
                                       <b>Business type:</b> Retail shop <br>
                                       <b>Group/Individual loan. Individual Loan</b> <br>
                                        Namanda Lydia joined Sajida when her capital of 300,000 in her retail shop and business was not moving well. She was introduced to Sajida by a friend and was attracted by the low interest rates. Lydia’s Loan size increased from 400,000 to 700,000 during the course of one year under group loan. She wanted to make her business bigger and discussed to the loan officer. Loan officer agreed to her and offered to become an individual (SEL)client.  She was later graduated from group loan to individual and acquired 1,000,000. When she acquired a bigger loan, she was able to rent a bigger working space and business grew exponentially. She is expecting next cycle a bigger amount so that she can expand her business. Now she is very happy to work with her business place because it is big and the stock items are sufficient.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal case-modal" id="myModal-06">
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

                                    <h2> Bogere Kafeero</h2>
                                    <h3><b>Location:</b> Jinja town</h3>
                                    <p>
                                       <b>Business type:</b> Butcher  <br>
                                       <b>Group/Individual Loan. Group loan </b>  <br>

                                       Bogere Kafeero with 20 years of experience, Kafeero accessed a loan through Sajida microfinance in 2024. Bogere started with a loan of l,000,000 which later increased to 1,500,000 This allowed him to expand his butchery in jinja central market, increasing his income and savings. His business now supports his family and contributes to local economic growth, with plans for further expansion. He has permanent home and it was under construction. Now he constructed his home with the income from his business and getting rent from the tenants. He uses three rooms for his family living and other four rooms are rented. Kafeero said that “we are not allowed to get money from bank because of lack of documents and big collateral securities, so Sajida helped us to expand business with a medium size of loan”. Kafeero expects more money next cycle. And he is so happy with SAJIDA Microfinance because it has improved his living standards and has more hopes from SAJIDA Microfinance.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal case-modal" id="myModal-08">
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

                                    <h2> Atimango Stella </h2>
                                    <h3><b>Location:</b> Buligo subcounty, Nawansinge</h3>
                                    <p>
                                       My name is Atimango Stella a resident Nawansinge, Buligo subcounty in Iganga town. I have been a member of Sajida since last year I am currently in 2ndcycle with Sajida under SML loan product. This is my success story with Sajida.
                                        I joined Sajida when I was doing poultry farming. By then I had 50 birds in my farm. I was disbursed to 400,000 UGX. I brought feeds for my birds in the farm then added more birds in my farm I purchased more other 50 birds in my farm.
                                        I have been able to sustain my family needs, pay my loan in time. When I was verified and disbursed to my 2nd loan I was disbursed to 600, 000 UGX. I still invested this money in my farm; I expanded the house for the birds.  I have invested some of this money in farming and since it’s a rainy season I have planted maize, after the harvest I expect to sell some maize flour as well as get some feeds for my poultry farm.
                                        I currently have a total of 600 birds. Every day I get trays of eggs and sell off some birds.  I expect to get another loan to and add more birds is my farm my target is to have 1000 birds by end of this year. Am sure and believe Sajida microfinance will support me. I expect to also grow with this company.

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal case-modal" id="myModal-09">
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

                                    <h2> Bugonzi Sophie  </h2>
                                    <h3><b>Location:</b> Buligo Iganga district</h3>
                                    <p>
                                        My name is Bugonzi Sophie a residence of Buligo Iganga district. I am a client of Sajida microfinance I sell clothes in Nabidonga market. Below is my success story
                                        Sajida Microfinance came in at the time I needed the most I was having challenge of low working capital in my business. Then I was marketed to by the staff of Sajida microfinance who told I would be able to get individual loan to boost my capital.
                                        The low interest rates, and zero admissions fees attracted me the more to join Sajida Microfinance. I saw this would be of my advantage since the only fee I was to pay was security fee and loan processing fee and I would have to pay back on a weekly process.
                                        I then proceed to process all requirement that the field officer told me. I obtained my 1st cycle loan UGX 1,500,000. I boosted my businesses added more stock in my business this boosted my capital gains and the weekly payments was convenient for me. This motivated me to apply for the 2nd loan for 2,000,0000 which I was given.
                                        I used part of this money to complete my house construction and currently I have a house and my children have shelter. Some of the money I visited in my business. I live a healthy and happy life together with my family my business is also doing well. Am so grateful to Sajida microfinance.

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal case-modal" id="myModal-10">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="popup-message d-flex">
                            {{--    <!-- <div class="popup-image">
                                    <img src="{{ asset('assets/img/governing-body-img1.png') }}" alt="">
                                </div> -->--}}
                                <div class="popup-content">

                                    <h2> Namataba Norah  </h2>
                                    <h3><b>Location:</b>  </h3>
                                    <p>
                                        My name is Namataba Norah, a business lady in Iganga town. I have a boutique located along Kaliro road in Iganga municipality. I first joined Sajida Microfinance under SML loan product where I was disbursed to a loan of 500,000 UGX.  Before I had a working capital of 700,000. When I was given this working capital, I used it to restock my business. I went to Kenya and bought classy items for my business.
                                        During my 1st cycle I did not find any difficulty to pay my loan, since I had invested the whole of it in my business which boosted it and I was able to enjoy my timely payments of my loan.  This made my capital to increase to 1, 200,000 UGX. When my 2nd cycle reached, I was verified and I was then migrated to Sadjida enterprise loan. I acquired a loan of 1,500,000 UGX, my business was boosted and it expanded. I have a stock of over 3,000,000 UGX and I am able to make profits of over 300,000 per a week. I also referred a friend of mine to Sajida and she was given an enterprise loan of 1,000,000 UGX. I am no able to cater for my children school fees and other basic needs at home without any challenges. Am so grateful to Sajida Microfinance.

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    @endsection
