@extends('frontend.layout.main')
@section('title', 'Approach-Item')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-apprach-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.7), rgba(30, 30, 30, 0.7)), url( {{ asset('images/'. $approachItem->image) }} );">
    <div class="container">
        <div class="ic-banner-content text-start">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="ic-sajida-newsroom-banner ic-approach-content text-center">
                        <h2>{{$approachItem->content_title}}</h2>
                        {{-- <p>Our evidence based, community centric and participatory programming framework covers four
                            thematic areas: catalysing entrepreneurship, fostering equity, community empowerment and
                            enterprises for good.</p> --}}
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
                        <p><b>{{$approachItem->created_at->format('m-d-Y H:i:s') }} </b> {!! $approachItem->description !!} </p>
                    </div>
                </section>
                <!-- news details -->
            </div>
        </div>
    </div>
</div>
<!-- news -->
@endsection