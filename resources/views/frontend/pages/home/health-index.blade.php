    @extends('frontend.layout.main')
    @section('title', 'Health')
    @section('content')
        <section class="hero-section health-hero">
            <div class="bg">
                <img src="{{ $healthBanner && $healthBanner->banner_image ? asset('images/' . $healthBanner->banner_image) : asset('assets/img/hero-img5.jpg') }}" alt="">
            </div>
            <div class="section-padding">
                <div class="container">
                    <div class="hero-content">
                        <div class="heading">
                            <h1>{{ $healthBanner->title ?? 'Health Program' }}</h1>
                            @if($healthBanner && $healthBanner->description)
                                <p> {!! $healthBanner->description !!} </p>
                            @else
                                <p>Uganda has one of the world's lowest doctor-to-patient ratios—1 for every 25,000 people—leaving many without essential care. The Busoga region is hit hardest, with poverty affecting 29.2% of its population compared to the national average of 20.3%.</p>
                                <p>To address this, SAJIDA Uganda has introduced a community-based healthcare model that uses telehealth and digital health tracking to deliver preventive, promotive, and curative care to underserved communities.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($healthProgramPageManager && $healthProgramPageManager->section_2 == 1)
        <section class="wrapper-17 section">
            <div class="section-padding">
                <div class="container">
                    <h1>{{ $healthSectionTwo->title ?? 'Our Approach' }}</h1>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="content">
                                @if($healthSectionTwo && $healthSectionTwo->description)
                                    {!! $healthSectionTwo->description !!}
                                @else
                                    <p>Building on program implementation learnings from Bangladesh, SAJIDA Uganda is implementing a community-based health program in Bugembe, a town in the Jinja district of Busoga.</p>
                                    <p>The program is anchored in a four-tier care model that includes community health workers, satellite clinics, telemedicine consultations, and partnerships with local health facilities for referrals.</p>
                                    <p>Trained Community Health Workers (CHWs) conduct household screenings, raise health awareness, and identify at-risk individuals for early intervention. Satellite clinics, staffed by clinical officers, deliver primary care, while telemedicine connects patients with MBBS doctors for specialized consultations.</p>
                                    <p>To ensure affordability and access, SAJIDA Uganda also facilitates health financing, enabling households to obtain essential diagnostics, medicines, consultations, and maternity services.</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="image">
                                <img src="{{ $healthSectionTwo && $healthSectionTwo->image ? asset('images/' . $healthSectionTwo->image) : asset('assets/img/image8.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($healthProgramPageManager && $healthProgramPageManager->section_3 == 1)
        <section class="wrapper-18">
            <div class="bg">
                <img src="{{ asset('assets/img/bg5.jpg') }}" alt="">
            </div>

            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="title">
                                <h1>{{ $healthSectionThree->section_title ?? 'Impacts Made' }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="counters d-flex justify-content-between">
                        @if($healthSectionThree && $healthSectionThree->stat_one_number)
                        <div class="stat" data-count="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_one_number) }}" data-suffix="{{ preg_match('/%/', $healthSectionThree->stat_one_number) ? '%' : '' }}" data-step="{{ preg_match('/%/', $healthSectionThree->stat_one_number) ? '2' : '20' }}" data-plus="{{ preg_match('/\+/', $healthSectionThree->stat_one_number) ? 'true' : 'false' }}">
                            <div class="number">0</div>
                            <div class="label">{{ $healthSectionThree->stat_one_description }}</div>
                        </div>
                        <span class="border"></span>
                        @else
                        <div class="stat" data-count="100" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0%</div>
                            <div class="label">pregnant mothers took folic acid supplements, surpassing the regional average</div>
                        </div>
                        <span class="border"></span>
                        @endif

                        @if($healthSectionThree && $healthSectionThree->stat_two_number)
                        <div class="stat" data-count="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_two_number) }}" data-suffix="{{ preg_match('/%/', $healthSectionThree->stat_two_number) ? '%' : '' }}" data-step="{{ preg_match('/%/', $healthSectionThree->stat_two_number) ? '2' : '20' }}" data-plus="{{ preg_match('/\+/', $healthSectionThree->stat_two_number) ? 'true' : 'false' }}">
                            <div class="number">0</div>
                            <div class="label">{{ $healthSectionThree->stat_two_description }}</div>
                        </div>
                        <span class="border"></span>
                        @else
                        <div class="stat" data-count="93" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">of pregnant mothers completed 4+ antenatal visits, nearly double the sub-regional average</div>
                        </div>
                        <span class="border"></span>
                        @endif

                        @if($healthSectionThree && $healthSectionThree->stat_three_number)
                        <div class="stat" data-count="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_three_number) }}" data-suffix="{{ preg_match('/%/', $healthSectionThree->stat_three_number) ? '%' : '' }}" data-step="{{ preg_match('/%/', $healthSectionThree->stat_three_number) ? '2' : '20' }}" data-plus="{{ preg_match('/\+/', $healthSectionThree->stat_three_number) ? 'true' : 'false' }}">
                            <div class="number">0</div>
                            <div class="label">{{ $healthSectionThree->stat_three_description }}</div>
                        </div>
                        <span class="border"></span>
                        @else
                        <div class="stat" data-count="1070" data-step="20" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">lives impacted</div>
                        </div>
                        <span class="border"></span>
                        @endif

                        @if($healthSectionThree && $healthSectionThree->stat_four_number)
                        <div class="stat" data-count="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_four_number) }}" data-suffix="{{ preg_match('/%/', $healthSectionThree->stat_four_number) ? '%' : '' }}" data-step="{{ preg_match('/%/', $healthSectionThree->stat_four_number) ? '2' : '20' }}" data-plus="{{ preg_match('/\+/', $healthSectionThree->stat_four_number) ? 'true' : 'false' }}">
                            <div class="number">0</div>
                            <div class="label">{{ $healthSectionThree->stat_four_description }}</div>
                        </div>
                        <span class="border"></span>
                        @else
                        <div class="stat" data-count="78" data-suffix="%" data-step="2" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">child vaccination coverage, up from 53%</div>
                        </div>
                        <span class="border"></span>
                        @endif

                        @if($healthSectionThree && $healthSectionThree->stat_five_number)
                        <div class="stat" data-count="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_five_number) }}" data-suffix="{{ preg_match('/%/', $healthSectionThree->stat_five_number) ? '%' : '' }}" data-step="{{ preg_replace('/[^0-9]/', '', $healthSectionThree->stat_five_number) > 100000 ? '50000' : '20' }}" data-plus="{{ preg_match('/\+/', $healthSectionThree->stat_five_number) ? 'true' : 'false' }}">
                            <div class="number">0</div>
                            <div class="label">{{ $healthSectionThree->stat_five_description }}</div>
                        </div>
                        @else
                        <div class="stat" data-count="2080500" data-step="50000" data-plus="true">
                            <div class="number">0</div>
                            <div class="label">UGX paid for health financing</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($healthProgramPageManager && $healthProgramPageManager->section_4 == 1 && $healthSliders && $healthSliders->count() > 0)
        <section class="wrapper-19 section">
            <div class="section-padding">
                <div class="container">
                    <div class="slider owl-carousel">
                        @foreach($healthSliders as $slider)
                        <div class="slider-item">
                            <div class="content">
                                <img src="{{ asset('assets/img/right 1.png') }}" alt="">
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($slider->description), 250) }}</p>
                                    <a href="#" class="btn case-btn" data-bs-toggle="modal" data-bs-target="#myModal-{{ $slider->id }}">Read Full Story</a>
                            </div>
                            <div class="image">
                                <img src="{{ $slider->image ? asset('images/' . $slider->image) : asset('assets/img/story-1.jpg') }}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
            <div>
                @foreach($healthSliders as $modalSlider)
                <div class="modal case-modal" id="myModal-{{ $modalSlider->id }}">
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

                                    <h2>{{ $modalSlider->name }}</h2>
                                    <h3><b> Location:</b> {{ $modalSlider->location }}</h3>

                                    <p>
                                        {!! $modalSlider->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    @endsection
