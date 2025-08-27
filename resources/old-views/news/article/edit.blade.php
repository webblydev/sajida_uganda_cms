@extends('layouts.main')
@section('title', 'Update Article')
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
                            <img src="{{ asset('sections/news/news-s2.png') }}" alt="" srcset=""
                                style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('News PAGE') }}</h5>
                            <span>{{ __('Section-2') }}</span>
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
                        <h3>{{ __('Update Approach Article') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('news-page.news.update', $news->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Title Here" value="{{ old('title', optional($news)->title) }}"
                                        required>
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="news_category_id">
                                            {{ __('News Category') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="news_category_id" id="news_category_id" class="form-control select2">
                                            <option value="">Select Category</option>
                                            @forelse($newsCategories as $newsCategory)
                                                <option value="{{ $newsCategory->id }}"
                                                    @if (old('news_category_id') == $newsCategory->id || $news->news_category_id == $newsCategory->id) selected @endif>
                                                    {{ $newsCategory->title }}
                                                </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('news_category_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Content Inage') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="image" name="image"
                                        value="">

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($news && $news->image)
                                    <div class="form-group col-md-6">
                                        <label for="image">
                                            {{ __('Current Image') }}
                                        </label>
                                        <img class="form-control" src="{{ asset('images/' . $news->image) }}"
                                            width="100px" alt="Existing Image" style="height: 200px">
                                    </div>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote">{{ $news->description }}</textarea>
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
