@extends('layouts.main')
@section('title', 'Add Slider Item')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('HEALTH PROGRAM PAGE')}}</h5>
                            <span>{{ __('Section-4 - Testimonials Slider')}}</span>
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
                        <h3>{{ __('Add Slider')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('health-program-page.health-program-section-four.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="order_no">
                                            {{ __('Order No')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input 
                                            type="number" 
                                            class="form-control @error('order_no') is-invalid @enderror" 
                                            id="order_no" 
                                            name="order_no"
                                            value="{{ old('order_no') }}" 
                                            min="1"
                                            placeholder="Enter order number (e.g., 1, 2, 3)" 
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('order_no')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">
                                            {{ __('Name')}}
                                        </label>
                                        <span class="text-red">*</span>
                                        <input 
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            id="name" 
                                            name="name"
                                            value="{{ old('name') }}" 
                                            placeholder="Enter name (e.g., John Doe)" required>
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="location">
                                            {{ __('Location')}}
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('location') is-invalid @enderror" 
                                            id="location" 
                                            name="location"
                                            value="{{ old('location') }}" 
                                            placeholder="Enter location (e.g., Kampala, Uganda)">
                                        <div class="help-block with-errors"></div>
                                        @error('location')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="form-text text-muted">Optional: Enter the location of the person</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">
                                            {{ __('Description/Story')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <textarea 
                                            class="form-control @error('description') is-invalid @enderror" 
                                            id="summernote" 
                                            name="description"
                                            rows="5"
                                            placeholder="Enter the testimonial or story here..."
                                            required>{{ old('description') }}</textarea>
                                        <div class="help-block with-errors"></div>
                                        @error('description')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="form-text text-muted">Example: "Madina Nakaja, a 56-year-old resident..."</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="image">
                                            {{ __('Image')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input 
                                            type="file" 
                                            class="form-control dropify @error('image') is-invalid @enderror" 
                                            id="image" 
                                            name="image"
                                            accept="image/*"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('image')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="form-text text-muted">Recommended size: 600x600px. Max file size: 2MB. Formats: JPG, PNG, GIF</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ik ik-save"></i>
                                    {{ __('Save Slider')}}
                                </button>
                                <a href="{{ route('health-program-page.health-program-section-four.index') }}" class="btn btn-light">
                                    <i class="ik ik-x"></i>
                                    {{ __('Cancel')}}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Initialize Summernote
                $('#summernote').summernote({
                    placeholder: 'Enter description here...',
                    height: 250,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'italic', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
        </script>
    @endpush
@endsection
