@extends('frontend.layout.main')
@section('title', 'News-room')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-newsroom-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.9), rgba(30, 30, 30, 0.9)), url( {{ asset('images/'. $newsBanner->background_image) }} );">
    <div class="container">
        <div class="ic-banner-content text-start">
            <div class="row g-3">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="ic-sajida-newsroom-banner">
                        <h4>{{ $newsBanner->title }}</h4>
                        <p>{!! $newsBanner->description !!}</p>
                        <a href="{{ $newsBanner ? $newsBanner->link : '#'}}" class="ic-btn-yellow">Read More ></a>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="ic-sajida-newsroom-img">
                        <img src="{{asset('images/'.$newsBanner->thumbnail)}}" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<div class="ic-section-space">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-8">
                <!-- news details -->
                <section class="ic-news-details">
                    <div class="ic-news-text">
                        <p><b>{{$news->created_at->format('m-d-Y H:i:s')}}</b>{!! $news->description !!}</p>
                    </div>
                </section>
                <!-- news details -->
            </div>

            <div class="col-12 col-lg-4">
                
                <!-- news list -->
                <section class="news-list p-4">

                    <div class="mb-4 d-inline-block text-">
                        <h4 class="agent-font">More News</h4>
                        <div class="border-line" style="border-color:#005AAA"></div>
                    </div>
                    
                    <div class="items">
                        @foreach ($recentNewsItems as $item)
                        <a href="#">
                            <div class="item d-flex mb-4">
                                <img class="me-3" src="" alt="" srcset="">
                                <div class="n-title">
                                    <p class="title fw-semibold mb-1 font-dark">{{$item->title}}</p>
                                    <p class="date fs-14 text-muted">{{$item->created_at->format('M d, Y')}}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
                <!-- news list -->
            </div>

        </div>
    </div>
</div>
<!-- news -->
@endsection