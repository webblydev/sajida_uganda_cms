@extends('layouts.main')
@section('title', 'Edit Institutes')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link href="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/gh/mobius1/selectr@latest/dist/selectr.min.js" defer type="text/javascript">
        </script>
    @endpush


    <div class="container-fluid">
        <style>
            input {
                box-sizing: border-box !important;
            }
        </style>
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Institute') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}" class="btn btn-outline-success" title="Home"><i
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
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Add Institute') }}</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('institute.update', $institute->id) }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">
                                            {{ __('Institute Name') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $institute->name }}" placeholder="">
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="text-red-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="area_id">
                                            {{ __('Area') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select id="area_id"
                                            class="form-control select-area @error('area_id') is-invalid @enderror"
                                            name="area_id">
                                            <option value="">Select an Area</option>
                                            @foreach ($areas as $area)
                                                <option class="area-field" value="{{ $area->id }}"
                                                    {{ $area->id == $institute->area->id ? 'selected' : '' }}>
                                                    {{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('area_id')
                                            <span class="text-red-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">
                                            {{ __('Address') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ $institute->address }}" placeholder="">
                                        <div class="help-block with-errors"></div>
                                        @error('address')
                                            <span class="text-red-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="url">
                                            {{ __('URL') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input id="url" type="text"
                                            class="form-control @error('url') is-invalid @enderror" name="url"
                                            value="{{ $institute->url }}" placeholder="">
                                        <div class="help-block with-errors"></div>
                                        @error('url')
                                            <span class="text-red-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectArea = document.querySelector(".select-area");
            new Selectr(selectArea);
        });
    </script>
@endsection
