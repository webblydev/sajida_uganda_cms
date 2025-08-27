@extends('layouts.main')
@section('title', 'News Page')
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
                        <div class="image-container">
                            <a href="{{ route('news-page.news-banner.create') }}">
                            <img src="{{ asset('sections/news/news-s1.png') }}" height="210px" width="1359" alt="Image Alt Text" class="img-fluid" />
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
                            <div class="col-4 align-items-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch2" getid="2" title="status" 
                                           @if($newsPageManager->section_2 == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container">
                            <a href="{{ route('news-page.news.index') }}">
                                <img src="{{ asset('sections/news/news-s2.png') }}" style="height:210px" width="1359" alt="Image Alt Text" class="img-fluid" />
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
                            <div class="col-4 align-items-right">
                                <label class="switch">
                                    <input type="checkbox" class="changeStatus" id="customSwitch3" getid="3" title="status" 
                                           @if($newsPageManager->section_3== 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>                                
                            </div>
                        </div>
                                    <!-- Image container, adjust the path accordingly -->
                        <div class="image-container">
                            <a href="{{ route('news-page.news.index') }}">
                            <img src="{{ asset('sections/news/news-s3.png') }}" style="height:210px"  width="1359" alt="Image Alt Text" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
    @push('script')
    <script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('js/alerts.js')}}"></script>
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script type="text/javascript">
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
                        var url = '{{ route("news-page.news-page-show-hide.status",":id") }}';
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
