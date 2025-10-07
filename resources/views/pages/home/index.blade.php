@extends('layouts.main')
@section('title', 'Home page')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/toggle.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 1')}}</h4>
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.top-banner.create') }}">
                            <img src="{{ asset('sections/home/home-s1.jpg') }}" height="210px" width="1359" alt="Section 1" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 2')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch2" getid="2" title="status" 
                                           @if($homePageManager->section_2 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.top-slider.create') }}">
                                <img src="{{ asset('sections/home/home-s2.jpg') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 3')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch3" getid="3" title="status" 
                                           @if($homePageManager->section_3 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.approach.index') }}">
                            <img src="{{ asset('sections/home/home-s3.jpg') }}" style="height:210px"  width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 4')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch4" getid="4" title="status" 
                                           @if($homePageManager->section_4 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.middle-banner-content.index') }}">
                                <img src="{{ asset('sections/home/home-s5.jpg') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 5')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch5" getid="5" title="status" 
                                           @if($homePageManager->section_5 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.members.index') }}">
                                <img src="{{ asset('sections/home/home-s5.jpg') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 5')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch6" getid="6" title="status" 
                                           @if($homePageManager->section_6 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('home-page.bottom-banner.create') }}">
                                <img src="{{ asset('sections/home/home-s7.jpg') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-6 col-md-6">
                <div class="card card-white text-black">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('Section 7')}}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch7" getid="7" title="status" 
                                           @if($homePageManager->section_7 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container mt-2">
                            <a href="{{ route('news-category.index') }}">
                                <img src="{{ asset('sections/home/home-s7.jpg') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
    	</div>
    </div>
    @push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
<script src="{{ asset('js/alerts.js')}}"></script>
<script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function () {

        });

                //Status
        $('.card').on('click', '.changeStatus', function (e) {
            e.preventDefault();
            var id = $(this).attr('getId');
            // var id=JSON.stringify($(this).attr('getId'))
            // console.log(id);
                swal({
                    title: `Are you sure?`,
                    text: `Want to change this status?`,
                    buttons: true,
                    dangerMode: true,
                }).then((changeStatus) => {
                if (changeStatus) {
                    var url = '{{ route("home-page.show-hide.status",":id") }}';
                    $.ajax({
                        type: "GET",
                        url: url.replace(':id', id),
                        success:function(resp)
                        {
                            // alert(resp);
                            console.log(resp);
                            // Reload the current page
                            location.reload();
                            if (resp.success === true) {
                                $.toast({
                                    heading: 'Success',
                                    text: resp.message,
                                    position: 'top-right',
                                    showHideTransition: 'slide',
                                    stack: false,
                                    icon: 'success'
                                })
                            }else{
                                $.toast({
                                    heading: 'Success',
                                    text: resp.message,
                                    position: 'top-right',
                                    showHideTransition: 'slide',
                                    stack: false,
                                    icon: 'warning'
                                })
                            }
                        },
                        error: function(jqXHR, textStatus, errorMessage) {
                            console.log(errorMessage);
                        }
                    });
                }
            });
        })
</script>
@endpush
@endsection
