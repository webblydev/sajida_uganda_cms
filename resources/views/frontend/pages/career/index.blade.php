@extends('frontend.layout.main')
@section('title', 'Career')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-newsroom-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.9), rgba(30, 30, 30, 0.9)), url( {{ asset('images/'. $jobBanner->banner_image) }} );">
    <div class="container">
        {{-- <div class="ic-banner-content text-start">
            <div class="row g-3">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="ic-sajida-newsroom-banner">
                        <h4>{{ $jobBanner->title }}</h4>
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
        </div> --}}
        <div class="container">
            <div class="ic-banner-content">
                @php
                $titleWords = explode(' ', $jobBanner->title);
                $firstWord = array_shift($titleWords);
                $remainingWords = implode(' ', $titleWords);
                @endphp
                <h1><span>{{$firstWord}} </span> {{$remainingWords}} <img src="{{ asset('assets/images/text-line-group.png')}}" alt="shape"></h1>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->
@if (isset($jobs) && count($jobs) > 0)
<section class="ic-career-header ic-section-space">
    <div class="container">
        <div class="ic-section-header">
            <h2 style="text-transform: capitalize">Job listing</h2>
        </div>
        <!-- <div class="ic-sub-heading">
            <h4>Find the best job that fit you</h4>
        </div> -->

        {{-- <div class="ic-job-filter mb-5">
            <ul class="row me-0">
                <li class="col-lg-4">
                    <p class="label">Profession</p>
                    <div class="hex-select hex-select-js">
                        <select name="profession_id" id="example-custom">
                            <option value="">Select.....</option>
                            @foreach ($professions as $item)
                            <option value="{{ $item->id}}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </li>

                <li class="col-lg-4">
                    <p class="label">Team</p>
                    <div class="hex-select hex-select-js">
                        <select name="example" id="example-custom">
                            <option value="">Select....</option>
                            @foreach ($teams as $team)
                            <option value="{{ $team->id}}">
                                {{ $team->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li class="col-lg-4">
                    <p class="label">Location</p>
                    <div class="hex-select hex-select-js">
                        <select name="example" id="example-custom">
                            <option value="">Select....</option>
                            @foreach ($locations as $location)
                            <option value="{{ $location->id}}">
                                {{ $location->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </li>
            </ul>
        </div> --}}

        <div class="ic-job-list">
            @forelse ($jobs as $job)
            <div class="job-item mt-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="./assets/images/c-logo.png" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h6 class="mb-2 fw-semibold">{{$job->profession->name}}</h6>
                            <span class="text-truncate me-3 job-attr"><i class="fa fa-map-marker-alt me-2"></i>{{$job->location->name}}</span>
                            <span class="text-truncate me-3 job-attr"><i class="far fa-clock me-2"></i>{{$job->job_nature}}</span>
                            <span class="text-truncate me-0 job-attr"><i class="far fa-money-bill-alt me-2"></i>{{$job->salary_range}}</span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary btn-apply" href="{{ route('career.apply', $job->id)}}">Apply Now</a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt me-2"></i>Date Line: {{date('M d, Y', strtotime($job->closing_date)) ?? ''}}</small>
                    </div>

                </div>
            </div>
            @empty
                No Data Found
            @endforelse


            {{-- <div class="job-item mt-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="./assets/images/c-logo.png" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h6 class="mb-2 fw-semibold">Software Engineer</h6>
                            <span class="text-truncate me-3 job-attr"><i class="fa fa-map-marker-alt me-2"></i>New York, USA</span>
                            <span class="text-truncate me-3 job-attr"><i class="far fa-clock me-2"></i>Full Time</span>
                            <span class="text-truncate me-0 job-attr"><i class="far fa-money-bill-alt me-2"></i>$123 - $456</span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary btn-apply" href="careerDetails.php">Apply Now</a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt me-2"></i>Date Line: 01 Jan, 2045</small>
                    </div>

                </div>
            </div>

            <div class="job-item mt-4">
                <div class="row g-4">

                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded" src="./assets/images/c-logo.png" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h6 class="mb-2 fw-semibold">Software Engineer</h6>
                            <span class="text-truncate me-3 job-attr"><i class="fa fa-map-marker-alt me-2"></i>New York, USA</span>
                            <span class="text-truncate me-3 job-attr"><i class="far fa-clock me-2"></i>Full Time</span>
                            <span class="text-truncate me-0 job-attr"><i class="far fa-money-bill-alt me-2"></i>$123 - $456</span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-primary btn-apply" href="careerDetails.php">Apply Now</a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt me-2"></i>Date Line: 01 Jan, 2045</small>
                    </div>

                </div>
            </div> --}}

        </div>
    </div>
</section> 
@else
<section class="ic-career-header ic-section-space">
    <div class="container">
        <h1 class="text-center" style="font-size: 24px"> No Vacancies Available.</h1>
    </div>
</section> 
@endif

<!-- news -->
@endsection