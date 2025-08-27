@extends('layouts.main')
@section('title', 'Donation Banner')
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
                            <img src="{{ asset('sections/career/banner.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('DONATION PAGE')}}</h5>
                            <span>{{ __('Donation Banner')}}</span>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}" class="btn btn-outline-success" title="Home"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-danger" title="Go Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
                        <h3>{{ __('Donation Page')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($donationBanner) ? route('donation-banner.update', $donationBanner->id) : route('donation-banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($donationBanner))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Banner Title Here" value="{{ old('title', isset($donationBanner) ? $donationBanner->title : '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="heading">
                                        {{ __('Heading') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter Heading Here" value="{{ old('title', isset($donationBanner) ? $donationBanner->heading : '') }}">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="information">
                                        {{ __('Information') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="information" id="summernote">{{ old('information', isset($donationBanner) ? $donationBanner->information : '') }}</textarea>
                                    @error('information')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="banner_image">
                                        {{ __('Banner Image (1920*800)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="banner_image" name="banner_image">
                                
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($donationBanner && $donationBanner->banner_image)
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Current Image') }}
                                    </label>
                                    <img class="form-control" src="{{  asset('images/' . $donationBanner->banner_image) }}"
                                    width="100px" alt="Existing Image" style="height: 200px">
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="form_image">
                                        {{ __('Form Image (1920*1080)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="form_image" name="form_image">

                                    @error('form_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                    @if ($donationBanner && $donationBanner->form_image)
                                    <div class="form-group col-md-6">
                                        <label for="image">
                                            {{ __('Current Image') }}
                                        </label>
                                        {{-- <img class="mt-3" src="{{ asset('images/' . $donationBanner->form_image) }}" height="80px" width="120px" alt="Existing Image"> --}}
                                        <img class="form-control" src="{{ asset('images/' . $donationBanner->form_image) }}"
                                        width="100px" alt="Existing Image" style="height: 200px">
                                    </div>
                                    @endif
                                                
                            </div>

                            <div class="row mt-30">
                                <div class="col-sm-12">
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
                height: 200
            });
        </script>
    @endpush
@endsection
