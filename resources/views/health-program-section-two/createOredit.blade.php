@extends('layouts.main')
@section('title', 'Health Program Section Two')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('HEALTH PROGRAM SECTION TWO') }}</h5>
                            <span>{{ __('Our Approach Content') }}</span>
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
                        <h3>{{ __('Health Program Section Two Information') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($healthProgramSectionTwo) ? route('health-program-page.health-program-section-two.update', $healthProgramSectionTwo->id) : route('health-program-page.health-program-section-two.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($healthProgramSectionTwo))
                                @method('PUT')
                            @endif

                            <!-- Title -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="e.g., Our Approach"
                                        value="{{ old('title', isset($healthProgramSectionTwo) ? $healthProgramSectionTwo->title : '') }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description with Summernote -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote" required>{{ old('description', isset($healthProgramSectionTwo) ? $healthProgramSectionTwo->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image Upload with Dropify -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Image') }}
                                    </label>
                                    <input type="file" 
                                        class="form-control dropify" 
                                        id="image" 
                                        name="image"
                                        accept="image/*"
                                        data-default-file="{{ isset($healthProgramSectionTwo) && $healthProgramSectionTwo->image ? asset('images/' . $healthProgramSectionTwo->image) : '' }}">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Recommended size: 1920x1080px. Max file size:
                                        2MB. Formats: JPG, PNG, GIF</small>
                                </div>

                                @if (isset($healthProgramSectionTwo) && $healthProgramSectionTwo->image)
                                    <div class="form-group col-md-6">
                                        <label>{{ __('Current Image:') }}</label><br>
                                        <img src="{{ asset('images/' . $healthProgramSectionTwo->image) }}" alt="Current Image"
                                            style="max-width: 100%; max-height: 300px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i>
                                        {{ isset($healthProgramSectionTwo) ? 'Update Health Program Section Two' : 'Create Health Program Section Two' }}
                                    </button>
                                    {{-- <a href="{{ route('health-program-page.health-program-section-two.index') }}" class="btn btn-secondary btn-lg">
                                        <i class="ik ik-x"></i>
                                        Cancel
                                    </a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
        <script type="text/javascript">
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
