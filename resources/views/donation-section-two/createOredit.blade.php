@extends('layouts.main')
@section('title', 'Donation Section Two')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('DONATION SECTION TWO') }}</h5>
                            <span>{{ __('Be The Light In Someone\'s Darkest Hour') }}</span>
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
                        <h3>{{ __('Donation Section Two Information') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($donationSectionTwo) ? route('donation-section-two.update', $donationSectionTwo->id) : route('donation-section-two.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($donationSectionTwo))
                                @method('PUT')
                            @endif

                            <!-- Title -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="heading">
                                        {{ __('Heading') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="heading" name="heading"
                                        placeholder="e.g., Contribution"
                                        value="{{ old('heading', isset($donationSectionTwo) ? $donationSectionTwo->heading : '') }}">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="e.g., Be The Light In Someone's Darkest Hour"
                                        value="{{ old('title', isset($donationSectionTwo) ? $donationSectionTwo->title : '') }}">
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
                                    <textarea class="form-control" name="description" id="summernote">{{ old('description', isset($donationSectionTwo) ? $donationSectionTwo->description : '') }}</textarea>
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
                                    <input type="file" class="form-control dropify" id="image" name="image"
                                        accept="image/*">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Recommended size: 1920x1080px. Max file size:
                                        2MB</small>
                                </div>

                                @if (isset($donationSectionTwo) && $donationSectionTwo->image)
                                    <div class="form-group col-md-6">
                                        <label>{{ __('Current Image:') }}</label><br>
                                        <img src="{{ asset('images/' . $donationSectionTwo->image) }}" alt="Current Image"
                                            style="max-width: 100%; max-height: 300px; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i>
                                        {{ isset($donationSectionTwo) ? 'Update Donation Section Two' : 'Create Donation Section Two' }}
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
        <script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Enter description here...',
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
        </script>
    @endpush
@endsection
