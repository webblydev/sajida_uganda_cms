@extends('layouts.main')
@section('title', 'Health Program Banner')
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
                            <h5>{{ __('HEALTH PROGRAM BANNER') }}</h5>
                            <span>{{ __('Manage Health Program Banner Content') }}</span>
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
                        <h3>{{ __('Health Program Banner Information') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($healthProgramBanner) ? route('health-program-page.health-program-banner.update', $healthProgramBanner->id) : route('health-program-page.health-program-banner.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($healthProgramBanner))
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
                                        placeholder="e.g., Health Program"
                                        value="{{ old('title', isset($healthProgramBanner) ? $healthProgramBanner->title : '') }}" required>
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
                                    <textarea class="form-control" name="description" id="summernote" required>{{ old('description', isset($healthProgramBanner) ? $healthProgramBanner->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Banner Image Upload with Dropify -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="banner_image">
                                        {{ __('Banner Image') }}
                                        @if(!isset($healthProgramBanner))
                                            <span class="text-red">*</span>
                                        @endif
                                    </label>
                                    <input type="file" 
                                        class="form-control dropify" 
                                        id="banner_image" 
                                        name="banner_image"
                                        accept="image/*"
                                        data-default-file="{{ isset($healthProgramBanner) && $healthProgramBanner->banner_image ? asset('images/' . $healthProgramBanner->banner_image) : '' }}"
                                        {{ !isset($healthProgramBanner) ? 'required' : '' }}>
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Recommended size: 1920x1080px. Max file size:
                                        2MB. Formats: JPG, PNG, GIF</small>
                                </div>

                                @if (isset($healthProgramBanner) && $healthProgramBanner->banner_image)
                                    <div class="form-group col-md-6">
                                        <label>{{ __('Current Banner Image:') }}</label><br>
                                        <img src="{{ asset('images/' . $healthProgramBanner->banner_image) }}" alt="Current Banner Image"
                                            style="max-width: 100%; max-height: 300px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i>
                                        {{ isset($healthProgramBanner) ? 'Update Health Program Banner' : 'Create Health Program Banner' }}
                                    </button>
                                    <a href="{{ route('health-program-page.health-program-banner.index') }}" class="btn btn-secondary btn-lg">
                                        <i class="ik ik-x"></i>
                                        Cancel
                                    </a>
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
