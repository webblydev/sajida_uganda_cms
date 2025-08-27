@extends('frontend.layout.main')
@section('title', 'About Us')
@section('content')

    <style>
        .leadership-content {
            padding-top: 80px;
            max-height: 620px;
            position: relative;
            display: flex;
            flex-direction: column;
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

        .leader-ship-backdrop--dark {
            background-color: #F2F1E6;
        }

        .leader-ship-text-wrapper {
            width: calc(41.66667%);
            float: left;
            margin-left: 0;
            padding-left: 56px;
            left: 0;
            position: absolute;
            right: 0;
            top: calc(50% - 50px);
            transform: translateY(-50%);
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
            width: calc(55%);
            margin: 85px 0 0 558px;
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
            font-weight: 600;
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
            font-family: "Kaushan Script", cursive;
        }

        @media (min-width: 1200px) and (max-width: 1399.99px) {
            .leader-ship-image-wrapper {
                margin: 54px 0 0 480px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199.99px) {
            .leader-ship-image-wrapper {
                margin: 85px 0 0 450px;
            }
        }

        @media (min-width: 992px) {
            .leadership-content--dark h3 {
                padding-top: 160px;
            }
        }

        @media (max-width: 991.99px) {
            .leader-ship-backdrop {
                width: 100%;
            }

            .leader-ship-text-wrapper {
                width: 100%;
                text-align: center;
                padding: 0;
                max-width: 80%;
                margin: auto;
                bottom: 65px;
            }

            .leader-ship-image-wrapper {
                width: calc(80%);
                margin: auto;
                margin-top: 300px;
            }

            .leadership-content {
                max-height: fit-content;
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
        }

        @media (max-width: 575.99px) {
            .leadership-content--dark h3 {
                font-size: 40px;
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
        }

        @media (max-width: 780px) {
            .ic-section-space {
                padding-top: 50px;
                padding-bottom: 0px;
            }

            .ic-about-images-content {
                left: 50%;
                top: 0;
                transform: translateX(-50%);
            }

            .ic-padding-top {
                padding-top: 0px !important;
            }

            .members-div-wrapper {
                margin-top: 0px !important;
                margin-bottom: -150px !important;
            }

            .leader-ship-image-wrapper {
                width: 90% !important;
            }
        }

        .ic-about-images-content span {
            background: none !important;
        }

        .ic-padding-top {
            padding-top: 80px !important;
        }

        .ic-section-space {
            padding-top: 50px;
            padding-bottom: 100px;
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

        <section class="ic-about-header ic-section-space">
            <div class="container">
                @if ($aboutPageManager->section_2 == 1)
                <div class="ic-section-header">
                    <h2>{{ $aboutUsSectionOne->title }}</h2>
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
                            <div class="ic-about-images-content">
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
        <section class="ic-sajida-foundation ic-section-space">
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
                                <p>{!! $aboutUsSectionThree->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SAJIDA foundation -->
    @endif

    @if ($aboutPageManager->section_5 == 1)
        <!-- leadership -->
        <?php
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
            $route = route('member-category.show',  $lastSegment);
        } else {
            $route=$url;
        }
    ?>
        <section class="leadership-wrapper">
            <div class="container">

                <div class="leadership-content leadership-content--dark ">
                    <div class="leader-ship-backdrop leader-ship-backdrop--dark" role="presentation">
                    </div>


                    <div class="leader-ship-text-wrapper">
                        <h3 class="dark"> {{ $aboutUsSectionFour->title }} </h3>
                        <p class="dark mt-4"> {!! $aboutUsSectionFour->description !!} </p>
                    </div>

                    <div class="leader-ship-image-wrapper">
                        <img class="leader-ship-image" src="{{ asset('images/' . $aboutUsSectionFour->image) }}"
                            alt="">
                    </div>

                </div>
            </div>
        </section>
    @endif


    <!-- ---------- -->

    <section class="ic-leader-ship ic-section-space mt-1">
        <!--<div class="container">-->
        <!--    <div class="ic-tabs-nav">-->
        <!--        <ul>-->
        <!--            <li>-->
        <!--                <a href="#all" class="tabs-link active">-->
        <!--                    All-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <a href="#governing-Body" class="tabs-link">-->
        <!--                    Governing Body-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <a href="#general-Body" class="tabs-link">-->
        <!--                    General Body-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <a href="#member-committee" class="tabs-link">-->
        <!--                    Executive Member Committee-->
        <!--                </a>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <a href="#leadership-team" class="tabs-link">-->
        <!--                    Senior Leadership Team-->
        <!--                </a>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->

    <div class="ic-tab-content">
        <div class="container">
            <div class="tab-content-items active" id="all">
                @if ($aboutPageManager->section_6 == 1)
                <?php
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
                        $route = route('member-category.show',  $lastSegment);
                    } else {
                        $route=$url;
                    }
                ?>

                <div id="governing-Body" class="ic-padding-top">
                    <div class="members-div-wrapper">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionFive->image) }}" alt="">
                                </div>

                        <div class="text-wrapper">
                            <h3 class="">{{$aboutUsSectionFive->title}}</h3>
                            <p>{!!$aboutUsSectionFive->description!!}</p>
                            <a href="{{ $aboutUsSectionFive ? $route : '#' }}" class="ic-details-btn" target="blank">See Details <i class="ri-arrow-right-s-line"></i></a>
                        </div>

                            </div>
                        </div>
                    @endif

                @if ($aboutPageManager->section_6 == 1)
                <?php
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
                    $route = route('member-category.show',  $lastSegment);
                } else {
                    $route=$url;
                }
            ?>
                <div class="ic-padding-top" id="general-Body">
                    <div class="members-div-wrapper content-right">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionSix->image) }}" alt="">
                                </div>
                                <div class="clear-fix"></div>

                        <div class="text-wrapper">
                            <h3 class="">{{$aboutUsSectionSix->title}}</h3>
                            <p>{!!$aboutUsSectionSix->description!!}</p>
                            <a href="{{ $aboutUsSectionSix ? $aboutUsSectionSix->link : '#' }}" class="ic-details-btn" target="blank">See Details <i class="ri-arrow-right-s-line"></i></a>
                        </div>

                            </div>
                        </div>
                    @endif

                @if ($aboutPageManager->section_7 == 1)
                <?php
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
                    $route = route('member-category.show',  $lastSegment);
                } else {
                    $route=$url;
                }
            ?>
                    <div class="ic-padding-top" id="member-committee">
                        <div class="members-div-wrapper">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionSeven->image) }}" alt="">
                                </div>

                            <div class="text-wrapper">
                                <h3 class="">{{$aboutUsSectionSeven->title}}</h3>
                                <p>{!!$aboutUsSectionSeven->description!!}</p>
                                
                                <a href="{{ $aboutUsSectionSeven ? $aboutUsSectionSeven->link : '#' }}" class="ic-details-btn" target="blank">See Details <i class="ri-arrow-right-s-line"></i></a>
                            </div>

                            </div>
                        </div>
                    @endif

                {{-- @if ($aboutPageManager->section_9 == 1)
                    <div class="ic-padding-top" id="leadership-team">
                        <div class="members-div-wrapper content-right">

                                <div class="image-wrapper">
                                    <img src="{{ asset('images/' . $aboutUsSectionEight->image) }}" alt="">
                                </div>
                                <div class="clear-fix"></div>

                                <div class="text-wrapper">
                                    <h3 class="">{{ $aboutUsSectionEight->title }}</h3>
                                    <p>{!! $aboutUsSectionEight->description !!}</p>
                                    <a href={{ $aboutUsSectionEight ? $aboutUsSectionEight->link : '#' }}" class="ic-details-btn" target="blank">See Details <i
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
