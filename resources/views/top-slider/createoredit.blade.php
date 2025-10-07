@extends('layouts.main')
@section('title', 'Update Top Slider')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i>
                            <img src="{{ asset('sections/home/home-s2.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
                            <span>{{ __('Section-2')}}</span>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-success" title="Home"><i
                                        class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-danger" title="Go Back"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            @include('include.message')
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Top Slider') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($topSlider) ? route('home-page.top-slider.update', $topSlider->id) : route('home-page.top-slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($topSlider))
                                @method('PUT')
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="link">
                                        {{ __('Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Enter Link Here"
                                        value="{{ old('link', isset($topSlider) ? $topSlider->link : '') }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slider_image">
                                        {{ __('Slider Image') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="slider_image" name="slider_image">

                                    @if ($topSlider && $topSlider->slider_image)
                                        <img class="mt-3" src="{{ asset('images/' . $topSlider->slider_image) }}"
                                            height="80px" width="120px" alt="Existing Image">
                                    @endif

                                    @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote" value="{{ old('description', isset($topSlider) ? $topSlider->description : '') }}"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            $('#summernote').summernote({
                placeholder: 'Enter description here',
                height: 100
            });
        </script>
    @endpush
@endsection
