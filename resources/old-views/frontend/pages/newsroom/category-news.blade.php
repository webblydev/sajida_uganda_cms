@extends('frontend.layout.main')
@section('title', 'Category News')
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
                        @if ($newsBanner->link)
                        <a href="{{ $newsBanner ? $newsBanner->link : '#'}}" class="ic-btn-yellow">Read More ></a>
                        @endif
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


<!-- news -->
    <section class="ic-feature-news ic-section-space">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-4">
                        <div class="ic-newsroom-heading">
                            <h4>{{$newsCategory->title}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($news) && count($news) > 0)
            <div class="row g-3">
                @foreach ($news as $item)
                <div class="col-lg-4 col-md-6">
                    <a href="{{route('news-room.show', $item->id )}}" class="h-100 d-block">
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
                                <h6>{{$shortDescription . (strlen($item->description) > 30 ? '...' : '')}}</h6>
                            </div>
                        </div>
                    </a>
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
<!-- news -->  


@endsection