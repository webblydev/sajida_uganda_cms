@extends('frontend.layout.main')
@section('title', 'News-room')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-newsroom-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.9), rgba(30, 30, 30, 0.9)), url( {{ asset('images/'. $newsBanner->background_image) }} );">
    <div class="container">
        <div class="ic-banner-content text-start">
            <div class="row g-3" style="align-items:center">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="ic-sajida-newsroom-banner">
                        <h4>{{ $newsBanner->title }}</h4>
                        <p>{!! $newsBanner->description !!}</p>
                        @if ($newsBanner->link)
                        <a href="{{ $newsBanner ? $newsBanner->link : '#'}}" class="ic-btn-yellow" style="margin-top:20px;">Read More ></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="ic-sajida-newsroom-img">
                        <img src="{{asset('images/'.$newsBanner->thumbnail)}}" class="img-fluid w-100" style="border-radius:5px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

@if ($newsPageManager->section_2 == 1)
<!-- feature news -->
    <section class="ic-feature-news ic-section-space">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-sm-6">
                    <div class="ic-newsroom-heading">
                        <h4>FEATURED</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="ic-feature-slider-arrows">
                        <button class="feature-btn-left"><i class="ri-arrow-left-s-line"></i></button>
                        <button class="feature-btn-right"><i class="ri-arrow-right-s-line"></i></button>
                    </div>
                </div>
            </div>
            <div class="ic-feature-slider-main">
            @foreach ($featureNewsItems as $featureNews)
                <div class="ic-feature-slider-items">
                    <a href="{{route('news-room.show', $featureNews->id )}}">
                        <div class="feature-img">
                            <img src="{{ asset('images/'. $featureNews->image) }}" class="img-fluid" alt="logos">
                            <p class="date">{{$featureNews->created_at->format('M d, Y')}}</p>
                        </div>
                        <div class="feature-content-num">
                            @php
                                $shortDescription = Str::limit(strip_tags($featureNews->description), 30)
                            @endphp
                            <p>{{$featureNews->category->title}}</p>
                            <p style="color: black;font-weight: 600;margin-top: 14px!important;">{{$featureNews->title}}</p>
                            <!--<h6>{{$shortDescription . (strlen($featureNews->description) > 30 ? '...' : '')}}</h6>-->
                            <a href="{{route('news-room.show', $featureNews->id )}}" class="ic-details-btn mt-3" style="background-color: transparent!important;border: 1px solid black;color: black;" target="blank">Learn More <i class="ri-arrow-right-s-line"></i></a>
                        </div>
                    </a>
                </div>
            @endforeach

                {{-- <div class="ic-feature-slider-items">
                    <a href="#">
                        <div class="feature-img">
                            <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                            <p class="date">Mar 13, 2023</p>
                        </div>
                        <div class="feature-content-num">
                            <p>Organisational</p>
                            <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                        </div>
                    </a>
                </div>
                <div class="ic-feature-slider-items">
                    <a href="#">
                        <div class="feature-img">
                            <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                            <p class="date">Mar 13, 2023</p>
                        </div>
                        <div class="feature-content-num">
                            <p>Organisational</p>
                            <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                        </div>
                    </a>
                </div>
                <div class="ic-feature-slider-items">
                    <a href="#">
                        <div class="feature-img">
                            <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                            <p class="date">Mar 13, 2023</p>
                        </div>
                        <div class="feature-content-num">
                            <p>Organisational</p>
                            <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>
<!-- feature news -->
@endif

@if ($newsPageManager->section_3 == 1)
<!-- news -->
    <section class="news-part ic-section-space-bottom-100">
        <div class="container">
            <div class="ic-news-sajida-news">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-4">
                        <div class="news-part-heading">
                            <h3>SAJIDA's News</h3>
                        </div>
                    </div>
                    {{-- <div class="col-lg-8">
                        <div class="news-part-selector">
                            <select name="" id="" class="selectpicker">
                                <option value="0">Category</option>
                                <option value="1">Category 1</option>
                            </select>
                            <select name="" id="" class="selectpicker">
                                <option value="0">Year</option>
                                <option value="1">Year 1</option>
                            </select>
                            <select name="" id="" class="selectpicker">
                                <option value="0">Month</option>
                                <option value="1">Month 1</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row g-3">
                @foreach ($recentNewsItems as $recentNews)
                <div class="col-lg-4 col-md-6">
                    <!--<a href="{{route('news-room.show', $recentNews->id )}}" class="h-100 d-block">-->
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="{{ asset('images/'. $recentNews->image) }}" class="img-fluid" alt="logos">
                                {{-- <p class="date">Mar 13, 2023</p> --}}
                                <p class="date">{{ $recentNews->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="feature-content-num">
                                @php
                                    $shortDescription = Str::limit(strip_tags($recentNews->description), 30)
                                @endphp
                                <p>{{ $recentNews->category->title}}</p>
                                <!--<h6>{{$shortDescription . (strlen($recentNews->description) > 30 ? '...' : '')}}</h6>-->
                                
                                <p style="color: black;font-weight: 600;margin-top: 14px!important;">{{$recentNews->title}}</p>
                                <a href="{{route('news-room.show', $recentNews->id )}}" class="ic-details-btn mt-3" style="background-color: transparent!important;border: 1px solid black;color: black;" target="blank">Learn More <i class="ri-arrow-right-s-line"></i></a>
                            </div>
                        </div>
                    <!--</a>-->
                </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6">
                    <a href="#" class="h-100 d-block">
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                                <p class="date">Mar 13, 2023</p>
                            </div>
                            <div class="feature-content-num">
                                <p>Organisational</p>
                                <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="h-100 d-block">
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                                <p class="date">Mar 13, 2023</p>
                            </div>
                            <div class="feature-content-num">
                                <p>Organisational</p>
                                <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="h-100 d-block">
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                                <p class="date">Mar 13, 2023</p>
                            </div>
                            <div class="feature-content-num">
                                <p>Organisational</p>
                                <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="h-100 d-block">
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                                <p class="date">Mar 13, 2023</p>
                            </div>
                            <div class="feature-content-num">
                                <p>Organisational</p>
                                <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="h-100 d-block">
                        <div class="ic-feature-slider-items mx-0">
                            <div class="feature-img">
                                <img src="./assets/images/feature-images-1.png" class="img-fluid" alt="logos">
                                <p class="date">Mar 13, 2023</p>
                            </div>
                            <div class="feature-content-num">
                                <p>Organisational</p>
                                <h6>SAJIDA FOUNDATION HOSTS ‘BUILDING BRIDGES’ EVENT</h6>
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>
<!-- news -->  
@endif

@endsection