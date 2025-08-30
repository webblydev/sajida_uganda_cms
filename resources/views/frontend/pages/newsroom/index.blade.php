@extends('frontend.layout.main')
@section('title', 'News-room')
@section('content')

    <section class="hero-section">
        <div class="bg">
            <img src="{{ asset('images/' . $newsBanner->background_image) }}" alt="">
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="hero-content">

                    <div class="heading">
                        <h1>{{ $newsBanner->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper-21 section">
        <div class="section-padding">
            <div class="container">
                <h1>Featured Story</h1>
                @foreach ($featureNewsItems as $featureNews)
                    <div class="featured-story d-xl-flex justify-content-between align-items-center">
                        <div class="featured-story-left mr-xl-4">
                            @php
                                $shortParagraphTwo = Str::limit(strip_tags($featureNews->paragraph_two), 140)
                            @endphp
                            <h5>{{ $featureNews->created_at->format('M d, Y') }}</h5>
                            <h3>{!! $featureNews->paragraph_one !!}</h3>
                            <p>{{ $shortParagraphTwo }}</p>
                            <a href="{{ route('news-room.show', $featureNews->id) }}" class="btn">Read More ></a>
                        </div>
                        <div class="featured-story-right ml-xl-4">
                            <div class="image">
                                <img src="{{ asset('images/'. $featureNews->thumbnail_image) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="wrapper-22 section">
        <div class="section-padding">
            <div class="container">
                <div class="case-stories">
                    <div class="project-title d-flex justify-content-between align-items-center">
                        <h1>Case Stories</h1>
                        <div class="project-item">
                            <ul>
                                <li data-filter="*">All</li>
                                <li data-filter=".health">HEALTH</li>
                                <li data-filter=".microfinance">MICROFINANCE</li>
                                <li>
                                    <select name="" id="">
                                        <option value="">SORT BY</option>
                                        <option value="">Select</option>
                                        <option value="">Select</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="project-list">
                        <div class="m-2 health">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 health">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 health">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 microfinance">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 microfinance">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 microfinance">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 microfinance">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 health">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>

                        <div class="m-2 microfinance">
                            <div class="single-item">
                                <img src="{{ asset('assets/img/slider1.png') }}" alt="">
                                <div class="space"></div>
                                <div class="content">
                                    <h4>Organisational</h4>
                                    <h2>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h2>
                                </div>
                                <span>Mar 13, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="wrapper-12 section">
        <div class="section-padding">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>Make Your Contribution</h1>
                    <a href="#" class="btn">Donate Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection
