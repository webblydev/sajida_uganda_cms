@extends('layouts.main')
@section('title', 'Impact Section')
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
                        <i class="ik ik-bar-chart-2 bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('IMPACT SECTION')}}</h5>
                            <span>{{ __('Manage Impact Statistics')}}</span>
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
                        <h3>{{ __('Impact Information')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($impact) ? route('home-page.impact.update', $impact->id) : route('home-page.impact.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($impact))
                                @method('PUT')
                            @endif
                            
                            <!-- Main Title and Description -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Main Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Impact" value="{{ old('title', isset($impact) ? $impact->title : '') }}">
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
                                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Our work is currently focused in the Busoga region...">{{ old('description', isset($impact) ? $impact->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Impact 1 -->
                            <h5 class="mb-3">Impact Statistic 1</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="impact_1_count">
                                        {{ __('Count/Number') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_1_count" name="impact_1_count" placeholder="e.g., 2,100+" value="{{ old('impact_1_count', isset($impact) ? $impact->impact_1_count : '') }}">
                                    @error('impact_1_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impact_1_title">
                                        {{ __('Title/Label') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_1_title" name="impact_1_title" placeholder="e.g., brought under financial inclusion" value="{{ old('impact_1_title', isset($impact) ? $impact->impact_1_title : '') }}">
                                    @error('impact_1_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Impact 2 -->
                            <h5 class="mb-3">Impact Statistic 2</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="impact_2_count">
                                        {{ __('Count/Number') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_2_count" name="impact_2_count" placeholder="e.g., 181,000+" value="{{ old('impact_2_count', isset($impact) ? $impact->impact_2_count : '') }}">
                                    @error('impact_2_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impact_2_title">
                                        {{ __('Title/Label') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_2_title" name="impact_2_title" placeholder="e.g., USD portfolio" value="{{ old('impact_2_title', isset($impact) ? $impact->impact_2_title : '') }}">
                                    @error('impact_2_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Impact 3 -->
                            <h5 class="mb-3">Impact Statistic 3</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="impact_3_count">
                                        {{ __('Count/Number') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_3_count" name="impact_3_count" placeholder="e.g., 1,070+" value="{{ old('impact_3_count', isset($impact) ? $impact->impact_3_count : '') }}">
                                    @error('impact_3_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impact_3_title">
                                        {{ __('Title/Label') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_3_title" name="impact_3_title" placeholder="e.g., individuals getting access to health care" value="{{ old('impact_3_title', isset($impact) ? $impact->impact_3_title : '') }}">
                                    @error('impact_3_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Impact 4 -->
                            <h5 class="mb-3">Impact Statistic 4</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="impact_4_count">
                                        {{ __('Count/Number') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_4_count" name="impact_4_count" placeholder="e.g., 2,080,500+" value="{{ old('impact_4_count', isset($impact) ? $impact->impact_4_count : '') }}">
                                    @error('impact_4_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="impact_4_title">
                                        {{ __('Title/Label') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="impact_4_title" name="impact_4_title" placeholder="e.g., UGX paid for health financing" value="{{ old('impact_4_title', isset($impact) ? $impact->impact_4_title : '') }}">
                                    @error('impact_4_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ik ik-save"></i> {{ isset($impact) ? 'Update Impact Data' : 'Create Impact Data' }}
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
    <script type="text/javascript">
        $(document).ready(function() {
            // You can add any custom JavaScript here if needed
        });
    </script> 
    @endpush
@endsection
