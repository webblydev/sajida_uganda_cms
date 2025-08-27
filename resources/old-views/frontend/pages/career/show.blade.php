@extends('frontend.layout.main')
@section('title', 'News-room')
@section('content')

<!-- banner start -->
<section class="ic-banner-part ic-newsroom-banner"
    style="background-image:  linear-gradient(0deg, rgba(30, 30, 30, 0.9), rgba(30, 30, 30, 0.9)), url( {{ asset('images/'. $jobBanner->banner_image) }} );">
    <div class="container">
        <div class="container">
            <div class="ic-banner-content">
                <h1><span>Join </span> Our Team <img src="{{ asset('assets/images/text-line-group.png')}}" alt="shape"></h1>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->
@include('include.message')
<section class="ic-job-detail ic-section-space">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <!-- <div class="bg-light-mustard rounded p-4"> -->
                    <div class="ic-job-title d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('assets/images/c-logo.png')}}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <div class="pb-2">
                                <h4>{{$job->profession->name}}</h4>
                            </div>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt me-2"></i>{{$job->location->name}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock me-2"></i>{{$job->job_nature}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt me-2"></i>{{$job->salary_range}}</span>
                        </div>
                    </div>

                    <div class="mb-5 job-desc">
                        <p>{!! $job->job_details !!}</p>
                        {{-- <div class="mb-3">
                            <div class="mb-3 d-inline-block">
                                <h4 class="agent-font">Job description</h4>
                                <div class="border-line" style="border-color:#005AAA"></div>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi neque pariatur ex sunt possimus consectetur facere ratione doloremque, eius iusto nesciunt. Eligendi, assumenda recusandae. Impedit laboriosam, nisi autem ratione soluta optio officia esse tenetur consectetur nostrum accusantium doloremque hic accusamus eius porro exercitationem recusandae vitae, vero ipsum, illum culpa eaque eum. Cumque, cupiditate. Repudiandae distinctio voluptates adipisci harum impedit corrupti odio eaque esse quae sint quis, perferendis repellat facere nihil quaerat natus molestiae non dignissimos enim pariatur praesentium. Est, alias.</p>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3 d-inline-block">
                                <h4 class="agent-font">Responsibility</h4>
                                <div class="border-line" style="border-color:#005AAA"></div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora illum magni molestias unde sint nam ratione laudantium neque, assumenda deleniti</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3 d-inline-block">
                                <h4 class="agent-font">Qualifications</h4>
                                <div class="border-line" style="border-color:#005AAA"></div>
                            </div>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                        </div> --}}
                    </div>
                <!-- </div> -->

                <div class="apply-form">
                    <h4 class="mb-3">Apply For The Job</h4>
                    <form action="{{ route('career.apply.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name">
                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="text" name="link" class="form-control" placeholder="Portfolio Website">
                            </div>

                            <div class="col-12 col-sm-6">
                                <input type="file" name="attachment" class="form-control bg-white">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="cover_later" rows="5" placeholder="Coverletter"></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-apply btn-primary w-100" type="submit">Apply Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 job-desc">
                <div class="bg-light-mustard rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                    <h4 class="mb-4 agent-font fw-semibold">Job Summery</h4>
                    <p><i class="fa fa-angle-right me-2"></i>Published On: {{date('M d, Y', strtotime($job->created_at))}}</p>
                    <p><i class="fa fa-angle-right me-2"></i>Vacancy: {{$job->vacancy}}</p>
                    <p><i class="fa fa-angle-right me-2"></i>Job Nature: {{$job->job_nature}}</p>
                    <p><i class="fa fa-angle-right me-2"></i>Salary: {{$job->salary_range}}</p>
                    <p><i class="fa fa-angle-right me-2"></i>Location:{{$job->location->name}}</p>
                    <p class="m-0"><i class="fa fa-angle-right me-2"></i>Date Line: {{date('M d, Y', strtotime($job->closing_date)) ?? ''}}</p>
                </div>
                <div class="bg-light-mustard rounded p-5 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                    <h4 class="mb-4 agent-font fw-semibold">Company Detail</h4>
                    <p class="m-0">{!! $job->company_details!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->
@endsection