@extends('layouts.main')
@section('title', 'Health Program Section Three')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('HEALTH PROGRAM SECTION THREE') }}</h5>
                            <span>{{ __('Impacts Made Content') }}</span>
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
                        <h3>{{ __('Health Program Section Three Information') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($healthProgramSectionThree) ? route('health-program-page.health-program-section-three.update', $healthProgramSectionThree->id) : route('health-program-page.health-program-section-three.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($healthProgramSectionThree))
                                @method('PUT')
                            @endif

                            <!-- Section Title -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="section_title">
                                        {{ __('Section Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="section_title" name="section_title"
                                        placeholder="e.g., Impacts Made"
                                        value="{{ old('section_title', isset($healthProgramSectionThree) ? $healthProgramSectionThree->section_title : 'Impacts Made') }}" required>
                                    @error('section_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <h4 class="mb-3">{{ __('Statistics') }}</h4>

                            <!-- Statistic One -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="stat_one_number">
                                        {{ __('Statistic 1 Number') }}
                                    </label>
                                    <input type="text" class="form-control" id="stat_one_number" name="stat_one_number"
                                        placeholder="e.g., 100%"
                                        value="{{ old('stat_one_number', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_one_number : '') }}">
                                    @error('stat_one_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="stat_one_description">
                                        {{ __('Statistic 1 Description') }}
                                    </label>
                                    <textarea class="form-control" id="stat_one_description" name="stat_one_description" rows="2"
                                        placeholder="e.g., pregnant mothers took folic acid supplements, surpassing the regional average">{{ old('stat_one_description', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_one_description : '') }}</textarea>
                                    @error('stat_one_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Statistic Two -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="stat_two_number">
                                        {{ __('Statistic 2 Number') }}
                                    </label>
                                    <input type="text" class="form-control" id="stat_two_number" name="stat_two_number"
                                        placeholder="e.g., 93%"
                                        value="{{ old('stat_two_number', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_two_number : '') }}">
                                    @error('stat_two_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="stat_two_description">
                                        {{ __('Statistic 2 Description') }}
                                    </label>
                                    <textarea class="form-control" id="stat_two_description" name="stat_two_description" rows="2"
                                        placeholder="e.g., of pregnant mothers completed 4+ antenatal visits, nearly double the sub-regional average">{{ old('stat_two_description', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_two_description : '') }}</textarea>
                                    @error('stat_two_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Statistic Three -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="stat_three_number">
                                        {{ __('Statistic 3 Number') }}
                                    </label>
                                    <input type="text" class="form-control" id="stat_three_number" name="stat_three_number"
                                        placeholder="e.g., 1,070+"
                                        value="{{ old('stat_three_number', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_three_number : '') }}">
                                    @error('stat_three_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="stat_three_description">
                                        {{ __('Statistic 3 Description') }}
                                    </label>
                                    <textarea class="form-control" id="stat_three_description" name="stat_three_description" rows="2"
                                        placeholder="e.g., lives impacted">{{ old('stat_three_description', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_three_description : '') }}</textarea>
                                    @error('stat_three_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Statistic Four -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="stat_four_number">
                                        {{ __('Statistic 4 Number') }}
                                    </label>
                                    <input type="text" class="form-control" id="stat_four_number" name="stat_four_number"
                                        placeholder="e.g., 78%"
                                        value="{{ old('stat_four_number', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_four_number : '') }}">
                                    @error('stat_four_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="stat_four_description">
                                        {{ __('Statistic 4 Description') }}
                                    </label>
                                    <textarea class="form-control" id="stat_four_description" name="stat_four_description" rows="2"
                                        placeholder="e.g., child vaccination coverage, up from 53%">{{ old('stat_four_description', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_four_description : '') }}</textarea>
                                    @error('stat_four_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Statistic Five -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="stat_five_number">
                                        {{ __('Statistic 5 Number') }}
                                    </label>
                                    <input type="text" class="form-control" id="stat_five_number" name="stat_five_number"
                                        placeholder="e.g., 2,080,500+"
                                        value="{{ old('stat_five_number', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_five_number : '') }}">
                                    @error('stat_five_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="stat_five_description">
                                        {{ __('Statistic 5 Description') }}
                                    </label>
                                    <textarea class="form-control" id="stat_five_description" name="stat_five_description" rows="2"
                                        placeholder="e.g., UGX paid for health financing">{{ old('stat_five_description', isset($healthProgramSectionThree) ? $healthProgramSectionThree->stat_five_description : '') }}</textarea>
                                    @error('stat_five_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <!-- Background Image Upload with Dropify -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="background_image">
                                        {{ __('Background Image') }}
                                    </label>
                                    <input type="file" 
                                        class="form-control dropify" 
                                        id="background_image" 
                                        name="background_image"
                                        accept="image/*"
                                        data-default-file="{{ isset($healthProgramSectionThree) && $healthProgramSectionThree->background_image ? asset('images/' . $healthProgramSectionThree->background_image) : '' }}">
                                    @error('background_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Recommended size: 1920x1080px. Max file size:
                                        2MB. Formats: JPG, PNG, GIF</small>
                                </div>

                                @if (isset($healthProgramSectionThree) && $healthProgramSectionThree->background_image)
                                    <div class="form-group col-md-6">
                                        <label>{{ __('Current Background Image:') }}</label><br>
                                        <img src="{{ asset('images/' . $healthProgramSectionThree->background_image) }}" alt="Current Background Image"
                                            style="max-width: 100%; max-height: 300px; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i>
                                        {{ isset($healthProgramSectionThree) ? 'Update Health Program Section Three' : 'Create Health Program Section Three' }}
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
        <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
        <script type="text/javascript">
            // $(document).ready(function() {
            //     // Initialize Dropify
            //     $('.dropify').dropify();
            // });
        </script>
    @endpush
@endsection
