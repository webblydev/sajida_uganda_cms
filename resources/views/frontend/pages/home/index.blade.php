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
                    <h5 id="country-name">SAJIDA Uganda</h5>
                    <div class="heading">
                        @php
                            $topBanner = $topBanner ?? null;

                            $headingOne = '';
                            $headingTwo = '';

                            if ($topBanner && $topBanner->title) {
                                $words = explode(' ', trim($topBanner->title), 2);
                                $headingOne = $words[0] ?? '';
                                $headingTwo = $words[1] ?? '';
                            }
                        @endphp
                        <h1><span>{{ $headingOne }}</span> {{ $headingTwo }}</h1>
                        <img src="{{ asset('assets/img/Yellow Lines.png') }}" alt="">
                    </div>
                    <h3>{{ $topBanner->description ?? 'By transforming lives through healthcare, financial inclusion, and dignity.' }}</h3>
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
                        <h1><b>{{ $topSlider->title }}</b></h1>
                        <p>
                            {!! $topSlider->description !!}
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
                    <div class="tab-btn col-lg-3">
                        <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">Health</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria- selected="false">Financial Inclusion</a>
                        </div>
                    </div>
                    <div class="tab-content col-lg-9" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="slider owl-carousel">
                                @foreach ($healthNews as $item)
                                    @php
                                        $shortParagraphOne = Str::limit(strip_tags($item->description ?? $item->description), 140);
                                    @endphp
                                    <div class="slider-item">
                                        <div class="content">
                                            <h1>{{ $item->title }}</h1>
                                            <p>{{ $item->description }}</p>
                                            <a href="{{ $item->link }}" class="btn"><span>learn</span> More ></a>
                                        </div>
                                        <div class="image">
                                            <img src="{{ asset('images/' . $item->image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="slider owl-carousel">
                                @foreach ($financialNews as $fitem)
                                    @php
                                        $shortParagraphOne = Str::limit(strip_tags($fitem->description ?? $fitem->description), 140);
                                    @endphp
                                    <div class="slider-item">
                                        <div class="content">
                                            <h1>{{ $fitem->title }}</h1>
                                            <p>{{ $fitem->description }}</p>
                                            <a href="{{ $fitem->link }}" class="btn"><span>learn</span> More ></a>
                                        </div>
                                        <div class="image">
                                            <img src="{{ asset('images/' . $fitem->image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
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
                    <div class="col-lg-6">
                        <div class="title">
                            <h1>{{ $impact->title ?? 'Impact' }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <p>{{ $impact->description ?? 'Our work is currently focused in the Busoga region, one of the areas hardest hit by poverty. Here, we are supporting micro and small entrepreneurs who have been excluded by traditional MFIs and left without pathways for growth, while also expanding access to healthcare for the most poverty-stricken households.' }}</p>
                        </div>
                    </div>
                </div>

                <div class="counters d-flex justify-content-between">
                    <!-- Set your targets with data-count -->
                    <div class="stat" data-count="{{ $impact && $impact->impact_1_count ? preg_replace('/[^0-9]/', '', $impact->impact_1_count) : '2100' }}" data-step="20" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">{{ $impact->impact_1_title ?? 'brought under financial inclusion' }}</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="{{ $impact && $impact->impact_2_count ? preg_replace('/[^0-9]/', '', $impact->impact_2_count) : '181000' }}"  data-step="1000" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">{{ $impact->impact_2_title ?? 'USD portfolio' }}</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="{{ $impact && $impact->impact_3_count ? preg_replace('/[^0-9]/', '', $impact->impact_3_count) : '1070' }}" data-step="5" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">{{ $impact->impact_3_title ?? 'individuals getting access to health care' }}</div>
                    </div>
                    <span class="border"></span>
                    <div class="stat" data-count="{{ $impact && $impact->impact_4_count ? preg_replace('/[^0-9]/', '', $impact->impact_4_count) : '2080500' }}" data-step="10000" data-plus="true">
                        <div class="number">0</div>
                        <div class="label">{{ $impact->impact_4_title ?? 'UGX paid for health financing' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-4" style="background-image: {{ $middleBanner && $middleBanner->image ? 'url(' . asset('images/' . $middleBanner->image) . ')' : 'none' }};">
        <div class="section-padding">
            <div class="container">
                <h1>Our Global Presence</h1>
                <div class="slider owl-carousel">
                    @foreach ($middleBannerItems as $bannerItem)
                        <div class="slider-item d-flex justify-content-between ">
                            <div class="content">
                                <h2>{{ $bannerItem->country_name ?? '' }}</h2>
                                <p>{{ $bannerItem->description ?? '' }}</p>
                                <a href="{{ $bannerItem->link ?? '#' }}" target="_blank" class="btn"><span>learn</span> more > </a>
                            </div>
                            <div class="image bangladesh-country-flag">
                                <img src="{{ asset('images/' . ($bannerItem->country_image ?? '')) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <img class="vector-img sm-d-none" src="{{ asset('assets/img/Vector (1).png') }}" alt="">
                <img class="vector-img d-sm-none" src="{{ asset('assets/img/Vector (3).png') }}" alt="">
            </div>
        </div>
    </section>

    <section class="wrapper-5">
        <div class="content-container">
            <div class="content">
                <h1>{{ $donationSection->title ?? 'Be the Change-Donate Today' }}</h1>
                <p>{{ $donationSection->description ?? 'Your gift provides vital healthcare to vulnerable families and empowers small business owners in Uganda to break free from poverty and build brighter futures.' }}</p>
                <a href="{{ $donationSection->button_link ?? route('donation.index') }}" class="btn">{{ $donationSection->button_text ?? 'Donate >' }} </a>
            </div>
        </div>
        <div class="image"@if(isset($donationSection) && $donationSection->image) style="background-image: url('{{ asset('images/' . $donationSection->image) }}');" @endif>
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

    {{-- Donation Section Two: Be The Light In Someone's Darkest Hour --}}
    @if(isset($donationSectionTwo))
    <section class="wrapper-7">
        <div class="content-container">
            <div class="content">
                <h1>{{ $donationSectionTwo->title }}</h1>
                <div class="description">
                    {!! $donationSectionTwo->description !!}
                </div>
            </div>
        </div>
        <div class="image"@if($donationSectionTwo->image) style="background-image: url('{{ asset('images/' . $donationSectionTwo->image) }}');" @endif>
        </div>
    </section>
    @endif

@endsection
