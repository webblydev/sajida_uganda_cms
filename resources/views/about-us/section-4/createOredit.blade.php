@extends('layouts.main')
@section('title', 'Section 4')
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
                            <img src="{{ asset('sections/aboutus/aboutus-s4.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('ABOUT PAGE')}}</h5>
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
                        {{-- <h3>{{ __('')}}</h3> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($aboutUsSectionThree) ? route('about-us-page.section-four.update', $aboutUsSectionThree->id) : route('about-us-page.section-four.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($aboutUsSectionThree))
                                @method('PUT')
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">
                                        {{ __('Name') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Patron Name Here" value="{{ old('name', isset($aboutUsSectionThree) ? $aboutUsSectionThree->title : '') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title Here" value="{{ old('title', isset($aboutUsSectionThree) ? $aboutUsSectionThree->title : '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Image (522*799)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="image" name="image">
                                                                
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Current Image') }}
                                    </label>
                                    @if ($aboutUsSectionThree && $aboutUsSectionThree->image)
                                        <img class="form-control" src="{{ asset('images/' . $aboutUsSectionThree->image) }}" alt="Existing Image" style="width: 180px; height: 200px">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description 1') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="" rows="10">{{ old('description', isset($aboutUsSectionThree) ? $aboutUsSectionThree->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description 2') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description_two" id="" rows="10">{{ old('description_two', isset($aboutUsSectionThree) ? $aboutUsSectionThree->description_two : '') }}</textarea>
                                    @error('description_two')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description 3') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description_three" id="" rows="10">{{ old('description_three', isset($aboutUsSectionThree) ? $aboutUsSectionThree->description_three : '') }}</textarea>
                                    @error('description_three')
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
                height: 200
            });
        </script> 
        @endpush
@endsection
