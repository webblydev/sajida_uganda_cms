@extends('layouts.main')
@section('title', 'Add Bottom Banner Banner')
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
                            <img src="{{ asset('sections/home/home-s6.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
                            <span>{{ __('Section-6')}}</span>
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
                        {{-- <h3>{{ __('Add Bottom Banner') }}</h3> --}}
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('home-page.bottom-banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
                        <form action="{{ isset($bottomBanner) ? route('home-page.bottom-banner.update', $bottomBanner->id) : route('home-page.bottom-banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($bottomBanner))
                                    @method('PUT')
                                @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Banner Title Here" value="{{ old('title', isset($bottomBanner) ? $bottomBanner->title : '') }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="link">
                                        {{ __('Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Enter Link Here" value="{{ old('link', isset($bottomBanner) ? $bottomBanner->link : '') }}" required>
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="banner_image">
                                        {{ __('Banner Inage (1360*367)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="banner_image" name="banner_image"
                                        value="{{ old('banner_image') }}">                                
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($bottomBanner && $bottomBanner->banner_image)
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Current Image') }}
                                    </label>
                                    <img class="form-control" src="{{  asset('images/' . $bottomBanner->banner_image) }}"
                                    width="100px" alt="Existing Image" style="height: 200px">
                                </div>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote">{{ old('description', isset($bottomBanner) ? $bottomBanner->description : '') }}</textarea>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
            height: 100
        });
    </script> 
    @endpush
@endsection
