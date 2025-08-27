@extends('frontend.layout.main')
@section('title', 'About Us')
@section('content')

    <style>
        .leadership-content {
            /* padding-top: 80px; */
            max-height: 620px;
            position: relative;
            display: flex;
            align-items: center;
            /* flex-direction: column; */
            background-color: #F2F1E6;
            padding: 70px;
            border-radius: 10px;
        }

        .leader-ship-backdrop {
            height: 100%;
            width: 85%;
            left: 0;
            position: absolute;
            right: 25px;
            top: 0;
            z-index: -1;
            max-height: 500px;
            margin-top: 90px;
            border-radius: 10px;
        }

        /* .leader-ship-backdrop--dark {
                                                                                        background-color: #F2F1E6;
                                                                                    } */

        .leader-ship-text-wrapper {
            padding-left: 30px;
            max-width: 700px;
            /* width: calc(41.66667%);
                                                                                        float: left;
                                                                                        margin-left: 0;
                                                                                        left: 0;
                                                                                        position: absolute;
                                                                                        right: 0;
                                                                                        top: calc(50% - 50px);
                                                                                        transform: translateY(-50%); */
        }

        .leadership-content--dark h3,
        .leadership-content--dark p,
        .leadership-content--dark span {
            /* color: #fff; */
            color: #1E1E1E;
        }

        .leadership-content h1 {
            margin-bottom: 17px;
            font-size: 78px;
        }

        .leader-ship-image-wrapper {
            /* width: calc(55%); */
            /* margin: 85px 0 0 558px; */
            box-shadow: 0px 4px 30px rgba(35, 35, 35, 0.1);
        }

        .leader-ship-image {
            float: none;
            height: 100%;
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* .ic-leader-ship .ic-tab-content {
                                                                                                                                                                                                                                                        background-color: #F2F1E6;
                                                                                                                                                                                                                                                    } */



        .members-div-wrapper {
            position: relative;
            margin-top: 50px;
        }

        .members-div-wrapper .image-wrapper {
            height: 600px;
            width: 70%;
        }

        .members-div-wrapper .image-wrapper img {
            border-radius: 10px;
            height: 100%;
            width: 100%;
            object-fit: cover
        }

        .members-div-wrapper .text-wrapper {
            width: 45%;
            height: fit-content;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0px 4px 30px rgba(35, 35, 35, 0.1);
            border: 1px solid #DDDDDD;
            border-radius: 10px;
            padding: 65px 55px;
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }

        .members-div-wrapper .text-wrapper h3 {
            padding-bottom: 10px;
            font-weight: 400;
            font-size: 36px;
            line-height: 50px;
            color: #314454;
        }

        .members-div-wrapper .text-wrapper p {
            font-size: 19px;
            line-height: 30px;
            color: #1E1E1E;
            padding-bottom: 40px;
        }

        .members-div-wrapper.content-right .text-wrapper {
            left: 0;
        }

        .members-div-wrapper.content-right .image-wrapper {
            float: right;
        }

        .clear-fix {
            clear: both;
        }

        .leadership-content--dark h3 {
            font-size: 36px;
            font-weight: 600;
        }

        .leadership-content--dark span {
            font-size: 18px !important;
            line-height: 170%;
        }

        .sec4-details {
            max-height: 200px;
            overflow: scroll;
            padding-right: 150px;
        }

        .sec4-details p {
            margin: 0 !important;
            padding: 0 !important;
        }

        .members-div-wrapper .text-wrapper span {
            background-color: transparent !important;
            font-size: 18px !important;
            line-height: 170%;
        }

        .ic-about-images-content span {
            background: none !important;
        }

        .about-us.ic-padding-top {
            padding-top: 48px;
        }

        .ic-section-blnc-space {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        @media (min-width: 1200px) and (max-width: 1399.99px) {
            /* .leader-ship-image-wrapper {
                                                                                            margin: 54px 0 0 480px;
                                                                                        } */
        }

        @media (min-width: 992px) and (max-width: 1199.99px) {
            /* .leader-ship-image-wrapper {
                                                                                            margin: 85px 0 0 450px;
                                                                                        } */
        }

        @media (min-width: 992px) {
            /* .leadership-content--dark h3 {
                                                                                            padding-top: 160px;
                                                                                        } */
        }

        @media (max-width: 991.99px) {
            .about-us.ic-padding-top {
                padding-top: 0;
            }

            .leader-ship-backdrop {
                width: 100%;
            }

            .leadership-content--dark h3 {
                font-size: 36px;
                margin-bottom: 10px
            }

            .leader-ship-text-wrapper {
                width: 100%;
                text-align: center;
                padding: 0;
                /* max-width: 80%; */
                margin: auto;
                bottom: 65px;
            }

            /* .leader-ship-image-wrapper {
                                                                                            width: calc(80%);
                                                                                            margin: auto;
                                                                                            margin-top: 300px;
                                                                                        } */

            .leadership-content {
                max-height: fit-content;
                flex-direction: column;
                gap: 30px;
            }

            .members-div-wrapper .image-wrapper {
                height: 400px;
                width: 100%;
            }

            .members-div-wrapper .text-wrapper {
                width: 90%;
                height: fit-content;
                position: initial;
                margin: auto;
                transform: translateY(-30%);
                text-align: center;
            }

            .sec4-details {
                padding-right: 0;
            }

            .ic-about-images-content {
                width: 90%;
                position: unset;
                transform: translateY(-50%) translateX(5%);
            }
        }

        @media (max-width: 575.99px) {
            .leadership-content--dark h3 {
                font-size: 33px;
                line-height: 45px;
            }

            .members-div-wrapper .text-wrapper p {
                font-size: 16px;
                padding-bottom: 25px;
                line-height: 26px;
            }

            .members-div-wrapper .text-wrapper h3 {
                font-size: 28px;
                line-height: 40px;
            }

            .ic-about-images-content {
                width: 100%;
                transform: none;
                border-radius: 0;
                box-shadow: none;
                margin-top: -10px;
                background-color: #fff;
            }
        }

        @media (min-width: 576px) and (max-width: 991.99px) {
            .ic-about-images {
                margin-bottom: -160px;
            }
        }

        @media (max-width: 780px) {
            .ic-section-space {
                padding-top: 50px;
                padding-bottom: 0px;
            }

            /* .about-us.ic-padding-top {
                                                                                            padding-top: 0px !important;
                                                                                        } */

            .members-div-wrapper {
                margin-top: 0px !important;
                margin-bottom: -50px !important;
            }

            /* .leader-ship-image-wrapper {
                                                                                            width: 90% !important;
                                                                                        } */
        }
    </style>

    <!-- banner start -->
    <section class="ic-banner-part ic-donated-banner"
        style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.7), rgba(30, 30, 30, 0.7)),  url({{ asset('images/' . $aboutUsBanner->banner_image) }});">
        <div class="container">
            @php
                $titleWords = explode(' ', $aboutUsBanner->title);
                $firstWord = array_shift($titleWords);
                $remainingWords = implode(' ', $titleWords);
            @endphp
            <div class="ic-banner-content">
                <h1><span>{{ $firstWord }}</span> {{ $remainingWords }}<img src="./assets/images/text-line-group.png"
                        alt="shape"></h1>
            </div>
        </div>
    </section>
    <!-- banner end -->

    {{-- Section One --}}
    <section class="ic-about-header ic-section-space pb-5">
        <div class="container">
            @if ($aboutPageManager->section_2 == 1)
                <div class="ic-section-header text-start pb-3">
                    <h1 class="mb-3 info-title text-dark-gray fw-500">{{ $aboutUsSectionOne->title }}</h1>
                </div>
                <div class="ic-about-text">
                    <p>
                        {!! $aboutUsSectionOne->description !!}
                    </p>

                </div>
            @endif

            @if ($aboutPageManager->section_3 == 1)
                {{-- Section Two --}}
                <div class="ic-about-images">
                    <div class="row">
                        <div class="col-lg-9">
                            <img src="{{ asset('images/' . $aboutUsSectionTwo->image) }}" class="img-fluid" alt="sajida">
                        </div>
                        <div class="col-lg-3">
                            <div class="ic-about-images-content animate-right" style="text-align: left !important;">
                                <h3>{{ $aboutUsSectionTwo->title }}</h3>
                                <p>{!! $aboutUsSectionTwo->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if ($aboutPageManager->section_4 == 1)
        <!-- SAJIDA foundation -->
        <section class="ic-sajida-foundation ic-section-blnc-space mt-5 mb-5">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="ic-sajida-foundation-img">
                            <img src="{{ asset('images/' . $aboutUsSectionThree->image) }}" class="img-fluid w-100"
                                alt="images">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ic-sajida-foundation-text">
                            <h2>{{ $aboutUsSectionThree->name }}</h2>
                            <h6>{{ $aboutUsSectionThree->title }}</h6>
                            <div class="sajida-foundation-paragraph">
                                <p>{{ $aboutUsSectionThree->description ?? null }}</p>
                                <p class="pt-2">{{ $aboutUsSectionThree->description_two ?? null }}</p>
                                <p class="pt-2">{{ $aboutUsSectionThree->description_three ?? null }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SAJIDA foundation -->
    @endif

    <!-- ---------- -->
    <section class="ic-leader-ship ic-section-space mt-1 reduce-padding">
        <div class="ic-tab-content">
            <div class="container">
                <div class="tab-content-items active" id="all">
                    @if ($aboutPageManager->section_5 == 1)
                        <!-- leadership -->
                        @php
                            // Get the URL from the $aboutUsSectionFive->link variable
                            $url = $aboutUsSectionFour ? $aboutUsSectionFour->link : '#';

                            // Parse the URL
                            $parsedUrl = parse_url($url);

                            // Get the host/domain of the URL
                            $urlDomain = $parsedUrl['host'] ?? null;

                            // Get the current domain
                            $currentDomain = request()->getHost();

                            // Check if the URL domain matches the current domain
                            if ($urlDomain === $currentDomain) {
                                $segments = explode('/', rtrim($url, '/'));
                                $lastSegment = end($segments);
                                $route = route('member-category.slug', $lastSegment);
                            } else {
                                $route = $url;
                            }
                        @endphp
                        <div class="about-us ic-padding-top" id="general-Body"
                            style="padding-top:10px;padding-bottom:50px;">
                            <div class="members-div-wrapper content-right">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionFour->image) }}" alt="">
                                </div>
                                <div class="clear-fix"></div>

                                <div class="text-wrapper animate-left">
                                    <h3 class=""
                                        style="font-family: argentcf-regular !important; line-height: 45px !important; font-size: 40px !important; color: #1E1E1E;">
                                        {{ $aboutUsSectionFour->title }}</h3>
                                    <p>{!! $aboutUsSectionFour->description !!}</p>
                                    <a href="{{ $aboutUsSectionFour ? $aboutUsSectionFour->link : '#' }}"
                                        class="ic-details-btn mt-3" target="blank">Learn More <i
                                            class="ri-arrow-right-s-line"></i></a>
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($aboutPageManager->section_6 == 1)
                        @php
                            // Get the URL from the $aboutUsSectionFive->link variable
                            $url = $aboutUsSectionFive ? $aboutUsSectionFive->link : '#';

                            // Parse the URL
                            $parsedUrl = parse_url($url);

                            // Get the host/domain of the URL
                            $urlDomain = $parsedUrl['host'] ?? null;

                            // Get the current domain
                            $currentDomain = request()->getHost();

                            // Check if the URL domain matches the current domain
                            if ($urlDomain === $currentDomain) {
                                $segments = explode('/', rtrim($url, '/'));
                                $lastSegment = end($segments);
                                $route = route('member-category.slug', $lastSegment);
                            } else {
                                $route = $url;
                            }
                        @endphp

                        <div id="governing-Body">
                            <div class="members-div-wrapper">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionFive->image) }}" alt="">
                                </div>

                                <div class="text-wrapper animate-right">
                                    <h3 class=""
                                        style="font-family: argentcf-regular !important; line-height: 45px !important; font-size: 40px !important; color: #1E1E1E;">
                                        {{ $aboutUsSectionFive->title }}</h3>
                                    <p>{!! $aboutUsSectionFive->description !!}</p>
                                    <a href="{{ $aboutUsSectionFive ? $route : '#' }}" class="ic-details-btn mt-3"
                                        target="blank">Learn More <i class="ri-arrow-right-s-line"></i></a>
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($aboutPageManager->section_7 == 1)
                        @php
                            // Get the URL from the $aboutUsSectionSix->link variable
                            $url = $aboutUsSectionSix ? $aboutUsSectionSix->link : '#';

                            // Parse the URL
                            $parsedUrl = parse_url($url);

                            // Get the host/domain of the URL
                            $urlDomain = $parsedUrl['host'] ?? null;

                            // Get the current domain
                            $currentDomain = request()->getHost();

                            // Check if the URL domain matches the current domain
                            if ($urlDomain === $currentDomain) {
                                $segments = explode('/', rtrim($url, '/'));
                                $lastSegment = end($segments);
                                $route = route('member-category.slug', $lastSegment);
                            } else {
                                $route = $url;
                            }
                        @endphp
                        <div class="about-us ic-padding-top" id="general-Body">
                            <div class="members-div-wrapper content-right">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionSix->image) }}" alt="">
                                </div>
                                <div class="clear-fix"></div>

                                <div class="text-wrapper animate-left">
                                    <h3 class=""
                                        style="font-family: argentcf-regular !important; line-height: 45px !important; font-size: 40px !important; color: #1E1E1E;">
                                        {{ $aboutUsSectionSix->title }}</h3>
                                    <p>{!! $aboutUsSectionSix->description !!}</p>
                                    <a href="{{ $aboutUsSectionSix ? $aboutUsSectionSix->link : '#' }}"
                                        class="ic-details-btn mt-3" target="blank">Learn More <i
                                            class="ri-arrow-right-s-line"></i></a>
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($aboutPageManager->section_8 == 1)
                        @php
                            // Get the URL from the $aboutUsSectionFive->link variable
                            $url = $aboutUsSectionSeven ? $aboutUsSectionSeven->link : '#';

                            // Parse the URL
                            $parsedUrl = parse_url($url);

                            // Get the host/domain of the URL
                            $urlDomain = $parsedUrl['host'] ?? null;

                            // Get the current domain
                            $currentDomain = request()->getHost();

                            // Check if the URL domain matches the current domain
                            if ($urlDomain === $currentDomain) {
                                $segments = explode('/', rtrim($url, '/'));
                                $lastSegment = end($segments);
                                $route = route('member-category.slug', $lastSegment);
                            } else {
                                $route = $url;
                            }
                        @endphp
                        <div class="about-us ic-padding-top" id="member-committee" style="padding-bottom:50px;">
                            <div class="members-div-wrapper">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionSeven->image) }}" alt="">
                                </div>

                                <div class="text-wrapper animate-right">
                                    <h3 class=""
                                        style="font-family: argentcf-regular !important; line-height: 45px !important; font-size: 40px !important; color: #1E1E1E;">
                                        {{ $aboutUsSectionSeven->title }}</h3>
                                    <p>{!! $aboutUsSectionSeven->description !!}</p>

                                    <a href="{{ $aboutUsSectionSeven ? $aboutUsSectionSeven->link : '#' }}"
                                        class="ic-details-btn mt-3" target="blank">Learn More <i
                                            class="ri-arrow-right-s-line"></i></a>
                                </div>

                            </div>
                        </div>
                    @endif

                    {{-- @if ($aboutPageManager->section_8 == 1)
                    <div class="about-us ic-padding-top" id="leadership-team">
                        <div class="members-div-wrapper content-right">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionEight->image) }}" alt="">
                                </div>
                                <div class="clear-fix"></div>

                                <div class="text-wrapper">
                                    <h3 class="">{{ $aboutUsSectionEight->title }}</h3>
                                    <p>{!! $aboutUsSectionEight->description !!}</p>
                                    <a href={{ $aboutUsSectionEight ? $aboutUsSectionEight->link : '#' }}" class="ic-details-btn mt-3" target="blank">Learn More <i
                                            class="ri-arrow-right-s-line"></i></a>
                                </div>

                        </div>
                    </div>
                @endif --}}
                </div>
            </div>
        </div>
    </section>
    <!-- leadership -->

@endsection
@section('customscript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const card1 = document.querySelectorAll('.animate-right');
            const card2 = document.querySelectorAll('.animate-left');

            const ScrollTrigger = gsap.ScrollTrigger;

            gsap.registerPlugin(ScrollTrigger);

            card1.forEach(element => {
                gsap.from(element, {
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 80%',
                        end: 'bottom 60%',
                        scrub: true,
                    },
                    x: 100,
                    opacity: 0,
                    duration: 1.5,
                });
            });

            card2.forEach(element => {
                gsap.from(element, {
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 80%',
                        end: 'bottom 60%',
                        scrub: true
                    },
                    x: -100,
                    opacity: 0,
                    duration: 1.5,
                });
            });
        });
    </script>
@endsection
