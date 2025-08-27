@extends('frontend.layout.main')
@section('title', 'Home')
@section('content')
    <style>
        .ic-banner-part{
            padding: 0;
        }
        .ic-about-btn {
            background-color: #314454;

            color: #ffffff;

            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .ic-about-btn:hover {
            background-color: #005AAA;
            color: #ffffff;
        }

        .ic-about .ic-about-slider-main .slider-left-image{
            z-index: 1;
        }

        .slider-img{
            height: 100vh;
        }
        .slider-img img{
            animation-direction: alternate;
            animation-duration: 20s;
            animation-iteration-count: infinite;
            animation-name: zoom-12642d07;
            animation-timing-function: linear;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .slider-img img::after {
            background-color: rgba(0, 0, 0, .5);
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        @keyframes zoom-12642d07 {
            0% {
                transform: scale(1)
            }

            to {
                transform: scale(1.2)
            }
        }

        .slider-div{
            left: 50%;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background: #00000080;
            display: flex;
            align-items: center;
        }

        /* For screens smaller than 1200px */
        @media (max-width: 1199px) {
            /* #ic-about-btn {
                margin-left: 11px;
            } */
        }

        /* For screens smaller than 992px */
        @media (max-width: 991px) {
            /* #ic-about-btn {
                margin-left: 8px;
            } */
        }

        /* For screens smaller than 768px */
        @media (max-width: 767px) {
            /* #ic-about-btn {
                margin-left: 121px;
            } */
        }

        /* For screens smaller than 576px */
        @media (max-width: 575px) {
            /* #ic-about-btn {
                margin-left: 137px;
            } */
        }
        /* For screens smaller than 540px */
        @media (max-width: 550) {
            /* #ic-about-btn {
                margin-left: 130px;
            } */
        }
        /* For screens smaller than 375px */
        @media (max-width: 375px) {
            /* #ic-about-btn {
                margin-left: 83px;
            } */
        }

        /* CAROUSEL */
        #carouselExampleCaptions .carousel-caption {
        bottom: 34%;
        background: rgba(0, 0, 0, 0.5);
        }
        /* #carouselExampleCaptions img {
        width: auto;
        height: 100vh;
        max-height: 100vh;
        } */
        #carouselExampleCaptions .carousel-indicators li {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        }

        .carousel-control-prev, .carousel-control-next {
            display: none
        }
        /* END CAROUSEL */

    </style>
    <!-- banner -->
    <section style="background-color: #000">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <!--<ol class="carousel-indicators">-->
              <!--  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>-->
              <!--  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>-->
              <!--  {{-- <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> --}}-->
              <!--</ol>-->
              <div class="carousel-inner"> 
                <!--<div class="carousel-item active">-->
                <!--    <div class="ic-banner-part">-->
                        
                <!--        <div class="slider-img">-->
                <!--            {{-- <img src={{ asset('images/' . $topBanner->banner_image) }} alt="" srcset=""> --}}-->
                <!--            <img src={{ asset('images/Zakat_Cover_Web.jpg') }} alt="" srcset="">-->
                <!--        </div>-->

                <!--        <div class="slider-div">-->
                <!--            <div class="container">-->
                <!--                <div class="ic-banner-content">-->
                <!--                    <h1><span class="secondary">Empower </span><br>Through Zakat<img-->
                <!--                            src="./assets/images/text-line-group.png" alt="shape"></h1>-->
                <!--                    {{-- <h1> begins with you. </h1>  --}}-->
                <!--                </div>-->
                <!--                <a href="https://sajidausa.org/donation" class="ic-about-btn" id="ic-about-btn"-->
                <!--                    target="_blank">-->
                <!--                    Donate Now-->
                <!--                </a>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--    </div>-->
                <!--</div>-->

                <div class="carousel-item active">
                    
                    <div class="ic-banner-part">
                        
                        <div class="slider-img">
                            <img src={{ asset('assets/images/PSL_2339.JPG') }} alt="" srcset="">
                        </div>

                        <div class="slider-div">
                            <div class="container">
                                <div class="ic-banner-content">
                                    @php
                                        $titleWords = explode(' ', $topBanner->title);
                                        // $titleWords = explode(' ', $topBanner->title);
                                        $firstWord = array_shift($titleWords);
                                        $remainingWords = implode(' ', $titleWords);
                                    @endphp
                                    <h1><span class="secondary">Health, Happiness</span><br> & Dignity for All <img
                                            src="./assets/images/text-line-group.png" alt="shape"></h1>
                                    {{-- <h1> begins with you. </h1>  --}}
                                </div>
                                {{-- <a href="https://www.sajida.org/engage-with-us/events/healing-amidst-crisis/" class="ic-about-btn" id="ic-about-btn"
                                    target="_blank">
                                    Read More
                                </a> --}}
                            </div>
                        </div>

                    </div>
                </div>
              </div>
              <!--<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">-->
              <!--  <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
              <!--  <span class="sr-only">Previous</span>-->
              <!--</a>-->
              <!--<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">-->
              <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
              <!--  <span class="sr-only">Next</span>-->
              <!--</a>-->
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
                                    alt="" style>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-right-content">
                        @foreach ($topSliders as $topSlider)
                            <div class="right-content">
                                <h5>
                                    {{ $topSlider->description }}
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
                                                <a href="#" class="unique-links" data-bs-toggle="pill"
                                                    data-bs-target="pills{{ $impact->id }}" type="button" role="tab"
                                                    aria-controls="pills{{ $impact->id }}" aria-selected="true">
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
                                    <div class="tab-pane" id="pills{{ $approach->id }}" role="tabpanel"
                                        aria-labelledby="{{ $approach->id }}-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-lg-11 m-auto">
                                                <div class="ic-our-unique-text-slider">
                                                    @if ($approach->approachItems)
                                                        @foreach ($approach->approachItems as $item)
                                                            <div class="unique-text-slider">
                                                                <h5>{!! $item->content_title !!}</h5>
                                                                @php
                                                                    $description = strip_tags($item->description); // Remove HTML tags
                                                                    $description = preg_replace(
                                                                        '/[^a-zA-Z0-9\s]/',
                                                                        '',
                                                                        $description,
                                                                    ); // Remove special characters
                                                                    $words = str_word_count($description, 1); // Split description into words
                                                                    $limitedDescription = implode(
                                                                        ' ',
                                                                        array_slice($words, 0, 50),
                                                                    ); // Take the first 50 words
                                                                @endphp
                                                                {{-- <p>{!! $limitedDescription !!}</p> --}}
                                                                <p>{{ $item->summary }}</p>
                                                                <br>
                                                                {{-- <a style="margin-top: 5px" href="{{ $item->url ?? '' }}"
                                                                    class="ic-about-btn" target="blank">Read More ></a> --}}
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="unique-text-slider" style="margin-bottom: 0">

                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="ic-unique-images-slider">
                                            @if ($approach->approachItems)
                                                @foreach ($approach->approachItems as $img)
                                                    <div class="img-wrap">
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
        {{-- <section class="ic-award-achivement ic-section-space">
            <div class="container">
                <div class="ic-award-achivement-wrapper">
                    <div class="ic-award-achivement-slider"> --}}
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

                        {{-- <div class="item">
                            <div class="ic-content">
                                <div class="ic-left-content">
                                    <h2 class="ic-title">
                                        Latest in SAJIDA
                                    </h2>
                                </div>
                                <div class="ic-more-btn">
                                    <a href="{{ url('/news-room') }}" class="ic-about-btn" target="blank">View All ></a>
                                </div>
                            </div>
                        </div> --}}
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
                    {{-- </div>
                </div>
            </div>
        </section> --}}
    <section class="ic-feature-news ic-section-space">
        <div class="container">
             <div class="row align-items-center mb-40">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-4">
                        <div class="ic-newsroom-heading">
                            <h4>{{ __('Latest In SAJIDA') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($featureNewsItems) && count($featureNewsItems) > 0)
            <div class="row g-3">
                @foreach ($featureNewsItems as $item)
                <div class="col-lg-4 col-md-6">
                    {{-- <a href="#" class="h-100 d-block"> --}}
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="{{ asset('images/'. $item->image) }}" class="img-fluid" alt="logos">
                                {{-- <p class="date">Mar 13, 2023</p> --}}
                                <p class="date">{{ $item->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="feature-content-num">
                                @php
                                    $shortDescription = Str::limit(strip_tags($item->description), 30)
                                @endphp
                                <p>{{ $item->title}}</p>
                                {{-- <h6>{{$shortDescription . (strlen($item->description) > 30 ? '...' : '')}}</h6> --}}
                            </div>
                            {{-- <br> --}}
                                                {{-- Read More Button --}}
                    <a style="margin: 20px 31px;" href="{{route('news-room.show', $item->id )}}"
                       class="ic-about-btn" target="blank">Read More ></a>
                        </div>
                    {{-- </a> --}}

                </div>
                @endforeach
            </div>
            @else
                <div class="row g-3">
                    <p class="text-center"> No News Found</p>
                </div>
            @endif
        </div>
    </section>
    @endif
    @if ($homePageManager->section_6 == 1)
        <!-- make your page -->
    <section class="ic-make-your-section ic-section-space"
        style="background-image: linear-gradient(0deg, rgba(30, 30, 30, 0.8), rgba(30, 30, 30, 0.8)), url('{{ asset('images/' . $bottomBanner->banner_image) }}'); 
            background-size: cover; 
            background-repeat: no-repeat;">
            <div class="container">
                <div class="ic-make-content">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <h2 class="secondary">{{ $bottomBanner->title }}</h2>
                            <h4>{{ $bottomBanner->description }}</h4>
                            <a href="{{ $bottomBanner->link ?? '#' }}" class="ic-btn">Donate Now ></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- make your page -->
    @endif


@endsection
@section('customscript')
    <script>
        window.onload = function() {
            const icBannerContent = document.querySelector('.ic-banner-content h1');
            gsap.from(icBannerContent, {
                opacity: 0,
                duration: 1.5,
                ease: 'power1.inOut',
            });
        };
        
        document.addEventListener('DOMContentLoaded', function() {
            var links = document.querySelectorAll('.unique-links');
            var tabs = document.querySelectorAll('.tab-pane');

            links[0].classList.add('active');
            tabs[0].classList.add('active', 'show');
            tabs[tabs.length - 1].classList.remove('active', 'show');

            links.forEach(function(link) {

                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    var dataTarget = this.getAttribute('data-bs-target');

                    tabs.forEach(tab => {

                        // Remove 'active show' class from all tabs
                        tab.classList.remove('active', 'show');

                        // Check if the current tab matches the clicked link's data-bs-target
                        if (tab.id === dataTarget) {
                            // Add 'active show' class to the clicked tab
                            this.classList.add('active');
                            tab.classList.add('active', 'show');
                        }
                    });
                });
            });

            const sliderLeftImage = document.querySelector('.slider-left-image');
            const icAboutBtns = document.querySelectorAll('.ic-about-btn');
            const ourUniqueApproachSection = document.querySelector('.our-unique-approach');
            const impactedMillionSection = document.querySelector('.ic-impacted-million');
            const impactBtn = document.querySelector('.ic-make-content h2');
            const arrow = document.querySelector('.ic-middle-images img')

            gsap.registerPlugin(ScrollTrigger);

            gsap.from(arrow, {
                scrollTrigger: {
                    trigger: arrow,
                    start: 'top bottom',
                    end: 'bottom bottom',
                    scrub: 1,
                    markers: false,
                },
                x: -100,
                opacity: 0,
                duration: 1,
                ease: 'power1.inOut',
            });

            // Animation for sliderLeftImage
            gsap.from(sliderLeftImage, {
                scrollTrigger: {
                    trigger: sliderLeftImage,
                    start: 'top center',
                    end: 'bottom bottom',
                    scrub: 1,
                    markers: false,
                },
                x: -100,
                opacity: 0,
                duration: 1,
                ease: 'power1.inOut',
            });

            // Animation for impactBtn
            gsap.from(impactBtn, {
                scrollTrigger: {
                    trigger: impactBtn,
                    start: 'top bottom',
                    end: 'bottom center',
                    scrub: 1,
                    markers: false,
                },
                opacity: 0,
                duration: 1.5,
                ease: 'power1.inOut',
            });


        });

        $('.carousel').carousel({
            interval: false,
        })
    </script>
@endsection
