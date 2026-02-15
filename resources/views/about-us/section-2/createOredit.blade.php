@extends('layouts.main')
@section('title', 'Section 2')
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
                            <img src="{{ asset('sections/aboutus/aboutus-s2.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('ABOUT PAGE')}}</h5>
                            <span>{{ __('Section-2')}}</span>
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
                        <form action="{{ isset($aboutUsSectionOne) ? route('about-us-page.section-two.update', $aboutUsSectionOne->id) : route('about-us-page.section-two.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($aboutUsSectionOne))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Banner Title Here" value="{{ old('title', isset($aboutUsSectionOne) ? $aboutUsSectionOne->title : '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote" rows="10">{{ old('description', isset($aboutUsSectionOne) ? $aboutUsSectionOne->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="button_one_text">
                                        {{ __('Button One Text') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="button_one_text" name="button_one_text" placeholder="Enter Button One Text Here" value="{{ old('button_one_text', isset($aboutUsSectionOne) ? $aboutUsSectionOne->button_one_text : '') }}">
                                    @error('button_one_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="button_one_link">
                                        {{ __('Button One Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="button_one_link" name="button_one_link" placeholder="Enter Button One Link Here" value="{{ old('button_one_link', isset($aboutUsSectionOne) ? $aboutUsSectionOne->button_one_link : '') }}">
                                    @error('button_one_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="button_two_text">
                                        {{ __('Button Two Text') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="button_two_text" name="button_two_text" placeholder="Enter Button Two Text Here" value="{{ old('button_two_text', isset($aboutUsSectionOne) ? $aboutUsSectionOne->button_two_text : '') }}">
                                    @error('button_two_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="button_two_link">
                                        {{ __('Button Two Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="button_two_link" name="button_two_link" placeholder="Enter Button Two Link Here" value="{{ old('button_two_link', isset($aboutUsSectionOne) ? $aboutUsSectionOne->button_two_link : '') }}">
                                    @error('button_two_link')
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
