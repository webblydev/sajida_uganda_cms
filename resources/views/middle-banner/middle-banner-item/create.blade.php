@extends('layouts.main')
@section('title', 'Add Middle Banner Item')
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
                            <img src="{{ asset('sections/home/home-s4.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
                            <span>{{ __('Section-4')}}</span>
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
                        {{-- <h3>{{ __('Add Middle Banner Item')}}</h3> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('middle-banner-content.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="country_name">
                                        {{ __('Country Name') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Enter Country Name Here" value="{{ old('country_name') }}" required>
                                    @error('country_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- link --}}
                                <div class="form-group col-md-4">
                                    <label for="link">
                                        {{ __('Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link Here" value="{{ old('link') }}" required>
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title Here" value="{{ old('title') }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="country_image">
                                        {{ __('Country Image (261*268)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="country_image" name="country_image" value="{{ old('country_image') }}" required>
                                    @error('country_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info">Create</button>
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
