@extends('layouts.main')
@section('title', 'Donation Section')
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
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('DONATION SECTION')}}</h5>
                            <span>{{ __('Manage Be the Change - Donate Section')}}</span>
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
                        <h3>{{ __('Donation Section Information')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($donationSection) ? route('home-page.donation-section.update', $donationSection->id) : route('home-page.donation-section.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($donationSection))
                                @method('PUT')
                            @endif
                            
                            <!-- Title -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Be the Change-Donate Today" value="{{ old('title', isset($donationSection) ? $donationSection->title : '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Your gift provides vital healthcare to vulnerable families...">{{ old('description', isset($donationSection) ? $donationSection->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Button Text -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="button_text">
                                        {{ __('Button Text') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="button_text" name="button_text" placeholder="e.g., Donate >" value="{{ old('button_text', isset($donationSection) ? $donationSection->button_text : '') }}">
                                    @error('button_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Button Link -->
                                <div class="form-group col-md-6">
                                    <label for="button_link">
                                        {{ __('Button Link (URL)') }}
                                    </label>
                                    <input type="url" class="form-control" id="button_link" name="button_link" placeholder="https://example.com/donate" value="{{ old('button_link', isset($donationSection) ? $donationSection->button_link : '') }}">
                                    @error('button_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Leave blank to use default donation page</small>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">
                                        {{ __('Background Image') }}
                                    </label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Recommended size: 1920x1080px. Max file size: 2MB</small>
                                    
                                    @if(isset($donationSection) && $donationSection->image)
                                        <div class="mt-3">
                                            <label>{{ __('Current Image:') }}</label><br>
                                            <img src="{{ asset('images/' . $donationSection->image) }}" alt="Current Image" style="max-width: 300px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i> {{ isset($donationSection) ? 'Update Donation Section' : 'Create Donation Section' }}
                                    </button>
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
        $(document).ready(function() {
            // You can add any custom JavaScript here if needed
        });
    </script> 
    @endpush
@endsection
