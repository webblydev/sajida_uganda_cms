@extends('frontend.layout.main')
@section('title', 'Home')
@section('content')
    <section class="hero-section home-hero">
        <div class="bg">
            <img src="{{ asset('assets/img/hero-img.jpg') }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">
                    <p id="country-name">SAJIDA Uganda</p>
                    <div class="heading">
                        <h1><span>Fighting</span> Poverty</h1>
                        <img src="{{ asset('assets/img/Yellow Lines.png') }}" alt="">
                    </div>
                    <h3>By transforming lives through healthcare, financial inclusion, and dignity.</h3>
                    <!-- <p>SAJIDA Foundation is a value-driven, non-government organisation. The organisation has come a long
                        way since its humble beginnings in 1993.</p> -->
                </div>
                <div class="image">
                    <img src="{{ asset('assets/img/arrow.svg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-1">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center item-container">
                    <div class="content">
                        <h1><b>Strengthening Communities</b></h1>
                        <p>
                            <span>SAJIDA Uganda is working with vulnerable communities in the Busoga region to create lasting pathways toward resilience, opportunity, and dignity.</span>
                            Drawing from its learnings in Bangladesh, SAJIDA Foundation in Uganda is addressing two critical needs: health and financial inclusion. Our health program improves access to primary care, maternal and child health services, and essential treatment through household outreach, community clinics, telemedicine, and health financing support. Alongside this, our microfinance program provides small loans to families excluded by larger institutions, helping them build livelihoods and break cycles of poverty. <br><br>
                            Together, these programs are reaching hundreds of households across underserved communities, laying the foundation for sustainable, inclusive change in Uganda.

                        </p>
                        <a href="{{ route('about-us.index') }}" class="btn"><span>about</span> sajida ></a>
                    </div>
                    <div class="image ">
                        <img src="{{ asset('assets/img/image2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-2">
        <div class="section-padding">
            <div class="container">
                <div class="title">
                    <h1>Latest from SAJIDA </h1>
                </div>
                <div class="tab-container row">
                    <div class="tab-btn col-xl-3">
                        <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">Health</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria- selected="false">Financial Inclusion</a>
                        </div>
                    </div>
                    <div class="tab-content col-xl-9" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="slider owl-carousel">
                                @foreach ($oneFeatureNewsItems as $item)
                                    @php
                                        $shortParagraphOne = Str::limit(strip_tags($item->paragraph_one ?? $item->paragraph_two), 140);
                                    @endphp
                                    <div class="slider-item">
                                        <div class="content">
                                            <h1>{{ $item->title }}</h1>
                                            <p>{{ $shortParagraphOne }}</p>
                                            <a href="{{ route('news-room.show', $item->id) }}" class="btn"><span>learn</span> More ></a>
                                        </div>
                                        <div class="image">
                                            <img src="{{ asset('images/' . $item->thumbnail_image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and medium enterprises.</p>

                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and medium enterprises.</p>
                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and medium enterprises.</p>
                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="slider owl-carousel">
                                @foreach ($twoFeatureNewsItems as $fitem)
                                    @php
                                        $shortParagraphOne = Str::limit(strip_tags($fitem->paragraph_one ?? $fitem->paragraph_two), 140);
                                    @endphp
                                    <div class="slider-item">
                                        <div class="content">
                                            <h1>{{ $fitem->title }}</h1>
                                            <p>{{ $shortParagraphOne }}</p>
                                            <a href="{{ route('news-room.show', $fitem->id) }}" class="btn"><span>learn</span> More ></a>
                                        </div>
                                        <div class="image">
                                            <img src="{{ asset('images/' . $fitem->thumbnail_image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and medium
                                            enterprises.</p>
                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and medium
                                            enterprises.</p>
                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="content">
                                        <h1>Free Healthcare Initiative</h1>
                                        <p>As well as improving other economic opportunities for our targeted beneficiaries
                                            by expanding access to finance for micro, small and
                                            medium enterprises.</p>
                                        <a href="#" class="btn"><span>learn</span> More ></a>
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('assets/img/image3.jpg') }}" alt="">
                                    </div>
                                </div> --}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-3">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="title">
                            <h1>Impact</h1>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="content">
                            <p>Our work is currently focused in the Busoga region, one of the areas hardest hit by poverty. Here, we are supporting micro and small entrepreneurs who have been excluded by traditional MFIs and left without pathways for growth, while also expanding access to healthcare for the most poverty-stricken households.</p>
                        </div>
                    </div>
                </div>

                <div class="counters d-flex justify-content-between">
                    <!-- Set your targets with data-count -->
                    <div class="stat" data-count="2100" data-step="20" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">brought under financial inclusion</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="181000"  data-step="1000" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">USD portfolio</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="1070" data-step="5" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">individuals getting access to health care</div>
                    </div>
                    <!-- <span class="border"></span> -->
                    <!-- <div class="stat" data-count="600" data-step="10" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">Patients Served in <br> Static Clinics in 7 <br> Months</div>
                    </div> -->
                    <span class="border"></span>
                    <div class="stat" data-count="2080500" data-step="10000" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">UGX paid for health financing</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-4">
        <div class="section-padding">
            <div class="container">
                <h1>Our Global Presence</h1>
                <div class="slider owl-carousel">
                    <div class="slider-item d-flex justify-content-between ">
                        <div class="content">
                            <h2>SAJIDA Bangladesh</h2>
                            <p>Ensuring health, happiness, and dignity since 1993 through programs in health, mental health, entrepreneurship, and equitable development, empowering communities to break free from cycles of deprivation.</p>
                            <a href="https://www.sajida.org/" target="_blank" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image bangladesh-country-flag">
                            <img src="{{ asset('assets/img/Bangladesh-map.png') }}" alt="">
                        </div>
                    </div>
                    <div class="slider-item d-flex justify-content-between">
                        <div class="content">
                            <h2>SAJIDA Uganda</h2>
                            <p>Expanding access to healthcare and advancing financial inclusion for vulnerable and underserved communities in the Busoga region.</p>
                            <a href="{{ route('about-us.index') }}" target="_blank" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image uganda-country-flag">
                            <img src="{{ asset('assets/img/Uganda-map.png') }}" alt="">
                        </div>
                    </div>
                    <div class="slider-item d-flex justify-content-between ">
                        <div class="content">
                            <h2>SAJIDA USA</h2>
                            <p>Improving lives in communities across Bangladesh and Uganda through a diverse portfolio of development programs and mission-driven investments.</p>
                            <a href="https://www.sajidausa.org/" target="_blank" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image usa-country-flag">
                            <img src="{{ asset('assets/img/Usa-map.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <img class="vector-img sm-d-none" src="{{ asset('assets/img/Vector (1).png') }}" alt="">
                <img class="vector-img d-sm-none" src="{{ asset('assets/img/Vector (3).png') }}" alt="">
            </div>
        </div>
    </section>

    {{-- <section class="storiec-slider">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Case Stories</h2>
                    <a href="{{ route('news-room.index') }}" class="btn"><span>read</span> more > </a>
                </div>
                <div class="slider owl-carousel">
                    <div class="single-slider-item">
                        <div class="content">
                            <img src="{{ asset('assets/img/right-icon.png') }}" alt="">
                            <p>Before SAJIDA, I struggled to secure financing for my small retail shop. Banks required
                                collateral I didn’t have, and local lenders charged high interest rates. SAJIDA’s microloan
                                gave me the capital I needed to expand my inventory. Within months, my sales increased, and
                                I was able to hire an extra employee. Now, I have a stable income and a growing business!"
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/img/image10.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="single-slider-item">
                        <div class="content">
                            <img src="{{ asset('assets/img/right-icon.png') }}" alt="">
                            <p>Before SAJIDA, I struggled to secure financing for my small retail shop. Banks required
                                collateral I didn’t have, and local lenders charged high interest rates. SAJIDA’s microloan
                                gave me the capital I needed to expand my inventory. Within months, my sales increased, and
                                I was able to hire an extra employee. Now, I have a stable income and a growing business!"
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/img/image10.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="single-slider-item">
                        <div class="content">
                            <img src="{{ asset('assets/img/right-icon.png') }}" alt="">
                            <p>Before SAJIDA, I struggled to secure financing for my small retail shop. Banks required
                                collateral I didn’t have, and local lenders charged high interest rates. SAJIDA’s microloan
                                gave me the capital I needed to expand my inventory. Within months, my sales increased, and
                                I was able to hire an extra employee. Now, I have a stable income and a growing business!"
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/img/image10.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="single-slider-item">
                        <div class="content">
                            <img src="{{ asset('assets/img/right-icon.png') }}" alt="">
                            <p>Before SAJIDA, I struggled to secure financing for my small retail shop. Banks required
                                collateral I didn’t have, and local lenders charged high interest rates. SAJIDA’s microloan
                                gave me the capital I needed to expand my inventory. Within months, my sales increased, and
                                I was able to hire an extra employee. Now, I have a stable income and a growing business!"
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/img/image10.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="wrapper-5">
        <div class="content-container">
            <div class="content">
                <h1>Be the Change-Donate Today</h1>
                <p>Your gift provides vital healthcare to vulnerable families and empowers small business owners in Uganda to break free from poverty and build brighter futures.</p>
                <a href="{{ route('donation.index') }}" class="btn">Donate > </a>
            </div>
        </div>
        <div class="image">
        </div>
    </section>

    <section class="wrapper-6">
        <div class="section-padding">
            <div class="container">
                <h1>News</h1>
                <div class="slider owl-carousel">
                    @foreach ($featureNewsItems as $item)
                        <a href="{{ route('news-room.show', $item->id) }}" target="_blank">
                            <div class="single-slider-item">
                                <img src="{{ asset( 'images/' . $item->thumbnail_image) }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>{{ $item->category->title }}</h4>
                                    <h2>{{ $item->title }}</h2>
                                </div>
                                <span>{{ $item->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
                <br>
                <div class="d-flex justify-content-end latest-news-button">
                    <a href="{{ route('news-room.index') }}" class="btn"><span>see</span> all > </a>
                </div>
            </div>
        </div>
    </section>
@endsection
