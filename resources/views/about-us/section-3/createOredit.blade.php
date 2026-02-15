@extends('layouts.main')
@section('title', 'Section 3')
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
                            <img src="{{ asset('sections/aboutus/aboutus-s3.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('ABOUT PAGE')}}</h5>
                            <span>{{ __('Section-3')}}</span>
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
                        {{-- <h3>{{ __('')}}</h3> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($aboutUsSectionTwo) ? route('about-us-page.section-three.update', $aboutUsSectionTwo->id) : route('about-us-page.section-three.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($aboutUsSectionTwo))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="images">
                                        {{ __('Gallery Images (658*439)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="images" name="images[]" multiple>
                                     @error('images')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="images">
                                        {{ __('Current Images') }}
                                    </label>
                                    @if ($aboutUsSectionTwo && $aboutUsSectionTwo->images)
                                    @php
                                        $images = json_decode($aboutUsSectionTwo->images, true);
                                    @endphp
                                        <div class="row">
                                            @foreach ($images as $image)
                                            <div class="col-md-3">
                                                <img class="form-control" src="{{ asset('images/' . $image) }}"
                                                    width="100px" alt="Existing Image" style="height: 200px">
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif
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
                height: 200
            });
            // set gallery images max items to 4
            $('#galery_images').on('change', function() {
                if (this.files.length > 4) {
                    alert('You can only upload a maximum of 4 images');
                    this.value = '';
                }
            });
        </script> 
        @endpush
@endsection
