@extends('layouts.main')
@section('title', 'News-Section 1')
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
                            <img src="{{ asset('sections/news/news-s1.png') }}" alt="" srcset=""
                                style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('News PAGE') }}</h5>
                            <span>{{ __('Section-1') }}</span>
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
                        <h3>{{ __('News Page') }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($newsBanner) ? route('news-page.news-banner.update', $newsBanner->id) : route('news-banner.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($newsBanner))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Banner Title Here"
                                        value="{{ old('title', isset($newsBanner) ? $newsBanner->title : '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="thumbnail">
                                        {{ __('Link') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Enter Link Here"
                                        value="{{ old('link', isset($newsBanner) ? $newsBanner->link : '') }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="background_image">
                                        {{ __('Background Image (1920*700)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="background_image"
                                        name="background_image">

                                    @error('background_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($newsBanner && $newsBanner->background_image)
                                    <div class="form-group col-md-6">
                                        <label for="image">
                                            {{ __('Current Image') }}
                                        </label>
                                        <img class="form-control"
                                            src="{{ asset('images/' . $newsBanner->background_image) }}" width="100px"
                                            alt="Existing Image" style="height: 200px">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="thumbnail">
                                        {{ __('Thumbnail Image (456*292)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="thumbnail" name="thumbnail">

                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($newsBanner && $newsBanner->thumbnail)
                                    <div class="form-group col-md-6">
                                        <label for="image">
                                            {{ __('Current Image') }}
                                        </label>
                                        <img class="form-control" src="{{ asset('images/' . $newsBanner->thumbnail) }}"
                                            width="100px" alt="Existing Image" style="height: 200px">
                                    </div>
                                @endif


                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote">{{ old('description', isset($newsBanner) ? $newsBanner->description : '') }}</textarea>
                                    @error('code')
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
                height: 100
            });
        </script>
    @endpush
@endsection
