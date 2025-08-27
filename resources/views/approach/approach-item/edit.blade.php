@extends('layouts.main')
@section('title', 'Update Approach Article')
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
                        <i class="ik ik-headphones bg-danger"></i>
                        <div class="d-inline">
                            <h5>{{ __('Approach Article') }}</h5>
                            <span>{{ __('Update Approach Article') }}</span>
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
                        <form action="{{ route('home-page.approach-item.update', $approachItem->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="approach_id">
                                            {{ __('Approach')}}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="approach_id" id="approach_id" class="form-control select2">
                                            <option value="">Select Approach</option>
                                            @forelse($approaches as $approach)
                                            <option value="{{ $approach->id }}"
                                                @if( old('approach_id') == $approach->id || $approachItem->approach_id == $approach->id)
                                                    selected
                                                @endif
                                                >
                                                {{ $approach->title }}
                                            </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('approach_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title">
                                        {{ __('Title') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Approach Title Here" value="{{ old('title', optional($approachItem)->content_title) }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url">
                                        {{ __('URL') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter External Link Here" value="{{ old('url', optional($approachItem)->url) }}" required>
                                    @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Content Image (1330*520)') }}
                                    </label>
                                    <input type="file" class="form-control dropify" id="image" name="image" value="{{ old('image') }}">

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Current Image') }}
                                    </label>
                                    @if ($approachItem && $approachItem->image)
                                        <img class="form-control" src="{{ asset('images/' . $approachItem->image) }}"
                                             width="100px" alt="Existing Image" style="height: 200px">
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">
                                        {{ __('Description') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="summernote">{{$approachItem->description}}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="summary">
                                        {{ __('Summary') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" name="summary" id="">{{$approachItem->summary}}</textarea>
                                    @error('summary')
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
