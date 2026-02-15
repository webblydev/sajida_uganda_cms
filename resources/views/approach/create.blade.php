@extends('layouts.main')
@section('title', 'Add Section 3')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i>
                            <img src="{{ asset('sections/home/home-s3.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
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
                    {{-- <div class="card-header">
                        <h3>{{ __('Add Approach')}}</h3>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{route('home-page.approach.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title Here" value="{{ old('title') }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('ShortDescription') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Slider Description Here" value="{{ old('description') }}" required>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="link">
                                        {{ __('Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter Slider Link Here" value="{{ old('link') }}" required>
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- type: Health / Microfinance --}}
                                <div class="form-group col-md-4">
                                    <label for="type">
                                        {{ __('Type') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Health" {{ old('type') == 'Health' ? 'selected' : '' }}>Health</option>
                                        <option value="Financial" {{ old('type') == 'Financial' ? 'selected' : '' }}>Financial</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Image Upload --}}
                                <div class="form-group col-md-4">
                                    <label for="image">
                                        {{ __('Image') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                    @error('image')
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
@endsection
