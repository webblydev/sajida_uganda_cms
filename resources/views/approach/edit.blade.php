@extends('layouts.main')
@section('title', 'Update Approach')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-danger"></i>
                        <div class="d-inline">
                            <h5>{{ __('Approach') }}</h5>
                            <span>{{ __('Update Approach') }}</span>
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
                        <h3>{{ __('Update Approach') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('home-page.approach.update', $approach->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Approach Title Here"
                                        value="{{ old('title', optional($approach)->title) }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Short Description') }} 
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Approach Description Here"
                                        value="{{ old('description', optional($approach)->description) }}">
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
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter Slider Link Here" value="{{ old('link', optional($approach)->link) }}" required>
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
                                        <option value="Health" {{ old('type', optional($approach)->type) == 'Health' ? 'selected' : '' }}>Health</option>
                                        <option value="Financial" {{ old('type', optional($approach)->type) == 'Financial' ? 'selected' : '' }}>Financial</option>
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
                                    @if(optional($approach)->image)
                                        <img src="{{ asset('images/' . $approach->image) }}" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                                    @endif
                                    @error('image')
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
@endsection
