@extends('layouts.main')
@section('title', 'Update Job Circular')
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
                            <h5>{{ __('Job Circular') }}</h5>
                            <span>{{ __('Update Job Circular') }}</span>
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
                        <h3>{{ __('Update Job Circular') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('job.circular.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="profession_id">
                                            {{ __('Profession') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="profession_id" id="profession_id" class="form-control select2">
                                            <option value="">Select Profession</option>
                                            @forelse($professions as $profession)
                                                <option value="{{ $profession->id }}"
                                                    @if (old('profession_id') == $profession->id || $job->profession_id == $profession->id) selected @endif>
                                                    {{ $profession->name }}
                                                </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('profession_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="team_id">
                                            {{ __('Team') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="team_id" id="team_id" class="form-control select2">
                                            <option value="">Select Team</option>
                                            @forelse($teams as $team)
                                                <option value="{{ $team->id }}"
                                                    @if (old('team_id') == $team->id || $job->team_id == $team->id) selected @endif>
                                                    {{ $team->name }}
                                                </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('team_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="location_id">
                                            {{ __('Location') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <select name="location_id" id="location_id" class="form-control select2">
                                            <option value="">Select Location</option>
                                            @forelse($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    @if (old('location_id') == $location->id || $job->location_id == $location->id) selected @endif>
                                                    {{ $location->name }}
                                                </option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('location_id')
                                            <span class="text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="job_nature">
                                        {{ __('Job Nature') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="job_nature" name="job_nature"
                                        placeholder="Enter Job Nature Here" value="{{ old('job_nature', optional($job)->job_nature) }}" required>
                                    @error('job_nature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="salary_range">
                                        {{ __('Salary Range') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="salary_range" name="salary_range"
                                        placeholder="Enter Salary Range" value="{{ old('salary_range', optional($job)->salary_range) }}" required>
                                    @error('salary_range')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="closing_date">
                                        {{ __('Closing Date') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="closing_date" name="closing_date"
                                        value="{{ date('Y-m-d', strtotime($job->closing_date)) }}" required>
                                    @error('closing_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="vacancy">
                                        {{ __('Vacancy') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="vacancy" name="vacancy"
                                        placeholder="Enter Job Vacancy" value="{{ old('vacancy', optional($job)->vacancy) }}" required>
                                    @error('vacancy')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="company_details">
                                        {{ __('Company Details') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" id="company_details" name="company_details" required>
                                        {{ old('company_details', optional($job)->company_details) }}
                                    </textarea>
                                    @error('company_details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="job_details">
                                        {{ __('Job Details') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <textarea class="form-control" id="job_details" name="job_details" required>
                                        {{ old('job_details', optional($job)->job_details) }}
                                    </textarea>
                                    @error('job_details')
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
            $(document).ready(function() {
                $('#company_details').summernote({
                    placeholder: 'Enter Company Details Here',
                    height: 150
                });

                $('#job_details').summernote({
                    placeholder: 'Enter Job Details Here',
                    height: 150,
                    codemirror: {
                        theme: 'monokai'
                    }
                });
            });
        </script>
    @endpush
@endsection
