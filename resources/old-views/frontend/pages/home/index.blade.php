@extends('frontend.layout.main')
@section('title', 'Home')
@section('content')
    <!-- banner -->
    <section class="ic-banner-part"
        style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.7), rgba(30, 30, 30, 0.7)), url({{ asset('images/' . $topBanner->banner_image) }});">
        <div class="container">
            <div class="ic-banner-content">
                @php
                    $titleWords = explode(' ', $topBanner->title);
                    $firstWord = array_shift($titleWords);
                    $remainingWords = implode(' ', $titleWords);
                @endphp
                <h1><span class="secondary">{{ $firstWord }}</span> {{ $remainingWords }} <img
                        src="./assets/images/text-line-group.png" alt="shape"></h1>
                <!-- <h1> begins with you. </h1> -->
            </div>
        </div>
    </section>
    <!-- banner -->
    @if ($homePageManager->section_2 == 1)
        <!-- about -->
        <section class="ic-about ic-section-space-bottom-100">
            <div class="container">

                <div class="ic-about-slider-main">
                    <div class="slider-left-image">
                        @foreach ($topSliders as $topSlider)
                            <div class="image-items">
                                <img src="{{ asset('images/' . $topSlider->slider_image) }}" class="img-fluid"
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-right-content">
                        @foreach ($topSliders as $topSlider)
                            <div class="right-content">
                                <h5>
                                    {{ preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags($topSlider->description)) }}
                                </h5>
                                @if ($topSlider->link)
                                    <a href="{{ $topSlider->link }}" class="ic-about-btn">About Us <i
                                            class="ri-arrow-right-s-line"></i></a>
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
        <!-- about -->
    @endif
    @if ($homePageManager->section_3 == 1)
        <!-- our unique approach -->
        <section class="our-unique-approach ic-section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="ic-section-header">
                            <h1>Our Unique Approach</h1>
                        </div>
                    </div>
                </div>
                <div class="ic-approach-tabs">
                    <div class="ic-approach-tab-links">
                        <div class="row">
                            <div class="col-lg-11 m-auto">
                                <div class="ic-approach-tabs-scroll">
                                    <ul class="tabs-nav" id="pills-tab" role="tablist">
                                        @foreach ($approaches as $impact)
                                            <li>
                                                <a href="#" class="unique-links active" data-bs-toggle="pill"
                                                    data-bs-target="{{ $impact->id }}" type="button" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">
                                                    {{ $impact->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ic-our-unique-content">
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($approaches as $approach)
                                    <div class="tab-pane {{ $loop->iteration == 4 ? 'active show' : '' }}"
                                        id="{{ $approach->id }}" role="tabpanel"
                                        aria-labelledby="{{ $approach->id }}-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-lg-11 m-auto">
                                                <div class="ic-our-unique-text-slider">
                                                    @if ($approach->approachItems)
                                                        @foreach ($approach->approachItems as $item)
                                                            <div class="unique-text-slider">
                                                                <h5>{{ $item->content_title }}</h5>
                                                                <?php 
                                                                    $description = strip_tags($item->description); // Remove HTML tags
                                                                    $description = preg_replace('/[^a-zA-Z0-9\s]/', '', $description); // Remove special characters
                                                                    $words = str_word_count($description, 1); // Split description into words
                                                                    $limitedDescription = implode(' ', array_slice($words, 0, 50)); // Take the first 50 words
                                                                ?>
                                                                <p>{!! $limitedDescription !!}</p>
                                                                <br>
                                                                <a style="margin-top: 5px"
                                                                    href="{{ route('approach-article.show', $item->id) }}"
                                                                    class="ic-btn">Read More ></a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="unique-text-slider" style="margin-bottom: 200px">

                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="ic-unique-images-slider">
                                            @if ($approach->approachItems)
                                                @foreach ($approach->approachItems as $img)
                                                    <div>
                                                        <img src="{{ asset('images/' . $img->image) }}"
                                                            class="img-fluid w-100" alt="image">
                                                    </div>
                                                @endforeach
                                            @endif

                                            {{-- <div>
                                            <img src="./assets/images/images-2.webp" class="img-fluid w-100" alt="image">
                                        </div>
                                        <div>
                                            <img src="./assets/images/images-3.webp" class="img-fluid w-100" alt="image">
                                        </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our unique approach -->
    @endif

    @if ($homePageManager->section_4 == 1)
        {{-- middleBanner --}}
        <section class="ic-impacted-million ic-section-space"
            style="background-image: linear-gradient(0deg, rgba(30, 30, 30, 0.7), rgba(30, 30, 30, 0.7)), url({{ asset('images/' . $middleBanner->image) }});">
            <div class="container">
                <div class="ic-impacted-million-texts">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="ic-impacted-text-slider">
                                @foreach ($middleBannerItems as $middleBannerItem)
                                    @php
                                        $title = explode(' ', $middleBannerItem->country_name);
                                        $country = array_shift($title);
                                        $remainings = implode(' ', $title);
                                    @endphp
                                    <div class="impacted-text-slider-items">
                                        <img src="{{ asset('images/' . $middleBannerItem->country_image) }}"
                                            class="img-fluid" alt="">

                                        <h2 class="white"><span class="secondary position-static">{{ $country }}
                                            </span> {{ $remainings }} </h2>
                                    </div>
                                @endforeach


                                {{-- <div class="impacted-text-slider-items">
                                <img src="./assets/images/africa-map.png" class="img-fluid" alt="">

                                <h2 class="white"><span class="secondary position-static">SAJIDA </span> Africa </h2>
                            </div>

                            <div class="impacted-text-slider-items">
                                <img src="./assets/images/us-map.png" class="img-fluid" alt="">

                                <h2 class="white"><span class="secondary position-static">SAJIDA </span> USA </h2>
                            </div> --}}

                            </div>
                        </div>
                        <div class="col-lg-3 text-center ic-middle-images">
                            <img src="./assets/images/banner-arrow.png" class="ic-arrows-left" alt="arrow">
                        </div>
                        <div class="col-lg-6">
                            <div class="ic-impacted-content-slider">
                                @foreach ($middleBannerItems as $middleBannerItemText)
                                    <div class="ic-impacted-content-items">
                                        <h3>{{ $middleBannerItemText->description }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- @if ($homePageManager->section_5 == 1)
    <!-- team-member -->
    <section class="ic-team-member ic-section-space">
        <div class="container">
            <div class="ic-team-member-wrapper  ic-section-header-space">
                <div class="ic-team-member-slider">
                    @foreach ($members as $member)
                        <div class="item">
                            <div class="ic-single-member">
                                <div class="ic-image mb-20">
                                    <img src="{{asset('images/'.$member->member_image)}}" alt="">
                                </div>
                                <div class="ic-content">
                                    <h3 class="ic-title mb-15">{{ $member->member_name }}</h3>
                                    <p class="ic-des">{{ $member->designation->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="ic-more-btn">
                <a href="#" class="ic-about-btn">All Leadership ></a>
            </div>
        </div>
    </section>
    @endif --}}
    @if ($homePageManager->section_7 == 1)
        <!-- ic-award-achivement -->
        <section class="ic-award-achivement ic-section-space">
            <div class="container">
                <div class="ic-award-achivement-wrapper">
                    <div class="ic-award-achivement-slider">
                        {{-- @foreach ($newsCategories as $newsCategory)
                    <div class="item">
                        <div class="ic-content">
                            <div class="ic-left-content">
                                <h2 class="ic-title">
                                    {{ $newsCategory->title}}
                                </h2>
                            </div>
                            <div class="ic-more-btn">
                                <a href="{{ route('news-room.category', $newsCategory->id)}}" class="ic-about-btn">View All ></a>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}

                        <div class="item">
                            <div class="ic-content">
                                <div class="ic-left-content">
                                    <h2 class="ic-title">
                                        Latest in Sajida
                                    </h2>
                                </div>
                                <div class="ic-more-btn">
                                    <a href="https://www.sajida.org/knowledge-hub/newsroom/" class="ic-about-btn"
                                        target="blank">View All ></a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="item">
                        <div class="ic-content">
                            <div class="ic-left-content">
                                <h2 class="ic-title">
                                    Reports & Insights
                                </h2>
                            </div>
                            <div class="ic-more-btn">
                                <a href="#" class="ic-about-btn">View All ></a>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($homePageManager->section_6 == 1)
        <!-- make your page -->
        <section class="ic-make-your-section ic-section-space"
            style="background-image: linear-gradient(0deg, rgba(30, 30, 30, 0.8), rgba(30, 30, 30, 0.8)), url( {{ asset('images/' . $bottomBanner->banner_image) }} );">
            <div class="container">
                <div class="ic-make-content">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <h2 class="secondary">{{ $bottomBanner->title }}</h2>
                            <h4>{{ preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags($bottomBanner->description)) }}</h4>
                            <a href="{{$bottomBanner->link ?? '#'}}" class="ic-btn">Donate Now ></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- make your page -->
    @endif

    <script>
        window.onload = function() {
            var links = document.querySelectorAll('.unique-links');
            var tabs = document.querySelectorAll('.tab-pane');

            links.forEach(function(link) {

                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    var dataTarget = this.getAttribute('data-bs-target');

                    tabs.forEach(tab => {

                        console.log(tab.id, dataTarget);
                        // Remove 'active show' class from all tabs
                        tab.classList.remove('active', 'show');

                        // Check if the current tab matches the clicked link's data-bs-target
                        if (tab.id == dataTarget) {
                            // Add 'active show' class to the clicked tab
                            tab.classList.add('active', 'show');
                        }
                    });
                });
            });
        };
    </script>
@endsection
