@extends('frontend.layout.main')
@section('title', 'Member Category')
@section('content')
 
<!-- banner start -->
<section class="ic-banner-part ic-donated-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.7), rgba(30, 30, 30, 0.7)), url({{ asset('images/' . $aboutUsBanner->banner_image) }}); padding-top: 200px;padding-bottom: 200px;">
    <div class="container">
        <div class="ic-banner-content">
            <h1 class="agent-font">{{$memberCategory->title}} <img src="{{ asset('assets/images/text-line-group.png')}}" alt="shape"></h1>
        </div>
    </div>
</section>
<!-- banner end -->

<section class="ic-leader-ship ic-section-space pt-3">
    <div class="container">
        <div id="all" class="ic-padding-top">
            <!-- <div class="ic-sub-heading">
                <h4>GENERAL BODY</h4>
            </div> -->
            <div class="row g-3">
                @foreach ($members as $member)
                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                    <a href="#">
                        <div class="ic-leadership-items">
                            <div class="img">
                                <img src="{{ asset('images/'.$member->member_image) }}" class="img-fluid"
                                    alt="leadership">
                            </div>
                            <div class="leadership">
                                <h5>{{ $member->member_name }}</h5>
                                <p>{{ $member->designation->title }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection