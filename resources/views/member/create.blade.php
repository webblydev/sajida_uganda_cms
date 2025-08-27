@extends('layouts.main')
@section('title', 'Add Member Item')
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
                            <img src="{{ asset('sections/home/home-s5.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
                            <span>{{ __('Section-5')}}</span>
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
                        {{-- <h3>{{ __('Add Leader')}}</h3> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('home-page.members.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="member_type_id">
                                            {{ __('Desgination')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="member_type_id" id="member_type_id" class="form-control select2">
                                            <option value="">Select Desgination</option>
                                            @forelse($memberTypes as $memberType)
                                            <option value="{{ $memberType->id }}"
                                                @if( old('member_type_id') == $memberType->id )
                                                    selected
                                                @endif
                                                >
                                                {{ $memberType->title }}
                                            </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('member_type_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="member_category_id">
                                            {{ __('Category')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="member_category_id" id="member_category_id" class="form-control select2">
                                            <option value="">Select Category</option>
                                            @forelse($memberCategories as $memberCategory)
                                            <option value="{{ $memberCategory->id }}"
                                                @if( old('member_category_id') == $memberCategory->id )
                                                    selected
                                                @endif
                                                >
                                                {{ $memberCategory->title }}
                                            </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('member_category_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="order_no">
                                        {{ __('Order No') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Enter Order Number" value="{{ old('order_no') }}" required>
                                    @error('order_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="member_name">
                                        {{ __('Member Name') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter Member Name Here" value="{{ old('member_name') }}" required>
                                    @error('member_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="member_image">
                                        {{ __('Member Inage (265*314)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="member_image" name="member_image" value="{{ old('member_image') }}" required>
                                    @error('member_image')
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
