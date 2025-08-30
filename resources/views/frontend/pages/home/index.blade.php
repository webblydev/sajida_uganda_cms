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
                    <img src="{{ asset('assets/img/Rectangle 21.png') }}" alt="">
                    <div class="heading">
                        <h1><span>Fighting</span> Poverty.</h1>
                        <img src="{{ asset('assets/img/Yellow Lines.png') }}" alt="">
                    </div>
                    <h3>By Taking Practical Initiatives</h3>
                    <p>SAJIDA Foundation is a value-driven, non-government organisation. The organisation has come a long
                        way since its humble beginnings in 1993.</p>
                </div>
                <div class="image">
                    <img src="{{ asset('assets/img/Vector.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-1">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center item-container">
                    <div class="content">
                        <h1>Helping People In Need</h1>
                        <p>
                            <span>We drive large-scale transformation by empowering women and their families to overcome
                                poverty, build resilience, and foster resourcefulness. </span>
                            SAJIDA Foundation expanded to Uganda in 2023, introducing its proven community-based development
                            model to address critical local needs. Since then, our work has focused on improving access to
                            primary healthcare, promoting maternal and child health, building epidemic preparedness, and
                            tackling financial barriers that keep vulnerable families from seeking medical care. Through
                            household outreach, static clinics, telemedicine support, and health financing schemes, we have
                            already reached hundreds of households across underserved communities. Uganda is now home to our
                            largest operation outside Bangladesh, reflecting our long-term commitment to creating
                            sustainable, inclusive change.
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
                    <h1>Our Programmes</h1>
                </div>
                <div class="tab-container">
                    <div class="tab-btn">
                        <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">Category 1</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria- selected="false">Category 2</a>
                        </div>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="slider owl-carousel">
                                @foreach ($oneFeatureNewsItems as $item)
                                    @php
                                        $shortParagraphOne = Str::limit(strip_tags($item->paragraph_one), 140);
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
                                        $shortParagraphOne = Str::limit(strip_tags($fitem->paragraph_one), 140);
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
                    <div class="col-md-6">
                        <div class="title">
                            <h1>Impacts Made</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content">
                            <p>We drive large-scale transformation by empowering women and their families to overcome
                                poverty, build resilience, and foster resourcefulness. </p>
                            <a href="https://www.sajida.org/annual-reports/" class="btn">See reports > </a>
                        </div>
                    </div>
                </div>

                <div class="counters d-flex justify-content-between">
                    <!-- Set your targets with data-count -->
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
                        <div class="label">Patients Served in <br> Static Clinics in 7 <br> Months</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="926500" data-step="10000" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">UGX Paid in Health <br> Financing in 2 <br> Months</div>
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
                            <p>A value-driven organization transforming lives through health, education, livelihoods, and
                                social innovation since 1993.</p>
                            <a href="https://www.sajida.org/" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/img/dm.png') }}" alt="">
                        </div>
                    </div>
                    <div class="slider-item d-flex justify-content-between">
                        <div class="content">
                            <h2>SAJIDA Uganda</h2>
                            <p>A value-driven organization transforming lives through health, education, livelihoods, and
                                social innovation since 1993.</p>
                            <a href="{{ route('about-us.index') }}" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image">
                            <img src="https://sajidausa.org/images/01-13-2024_21-39-04-us-map.png" alt="">
                        </div>
                    </div>
                    <div class="slider-item d-flex justify-content-between ">
                        <div class="content">
                            <h2>SAJIDA USA</h2>
                            <p>A value-driven organization transforming lives through health, education, livelihoods, and
                                social innovation since 1993.</p>
                            <a href="https://www.sajidausa.org/" class="btn"><span>learn</span> more > </a>
                        </div>
                        <div class="image">
                            <img src="https://sajidausa.org/images/07-29-2025_14-08-53-Uganda Country.png" alt="">
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
                <h1>Make Your Contribution</h1>
                <p>We drive large-scale transformation by empowering women
                    and their families to overcome poverty, build resilience,
                    and foster resourcefulness.</p>
                <a href="{{ route('donation.index') }}" class="btn">learn more > </a>
            </div>
        </div>
        <div class="image">
        </div>
    </section>

    <section class="wrapper-6">
        <div class="section-padding">
            <div class="container">
                <h1>Latest from SAJIDA</h1>
                <div class="slider owl-carousel">
                    @foreach ($featureNewsItems as $item)
                        <a href="{{ route('news-room.show', $item->id) }}">
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
                <div class="d-flex justify-content-end">
                    <a href="{{ route('news-room.index') }}" class="btn"><span>see</span> all > </a>
                </div>
            </div>
        </div>
    </section>
@endsection
