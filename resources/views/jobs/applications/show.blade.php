@extends('layouts.main') 
@section('title', 'Job Application')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        {{-- <i class="fa fa-book bg-blue" aria-hidden="true"></i> --}}
                        <i class="fa fa-cog fa-spin fa-3x fa-fw text-green"></i>
                        <div class="d-inline">
                            <h5>{{ __('JOB APPLICATION')}}</h5>
                            <span>{{ __('Job Application')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('inventory/dashboard') }}" class="btn btn-outline-success" title="Home"><i
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
                <div class="card p-3">
                    <div class="card-header">
                        <h3>{{ __('Applicant Details') }}</h3>
                        <div class="card-header-right">

                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4>Cover Later</h4>
                            <p>
                                {{$jobApplication->cover_later}} 
                            </p>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th><strong>{{ __('Application Date') }}</strong></th>
                                <td>{{  date('d-m-Y', strtotime($jobApplication->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th><strong>{{ __('Applicant Name') }}</strong></th>
                                <td>{{ $jobApplication->applicant_name }}</td>
                            </tr>

                            <tr>
                                <th><strong>{{ __('Applicant Email') }}</strong></th>
                                <td>{{ $jobApplication->applicant_email }}</td>
                            </tr>

                            <tr>
                                <th><strong>{{ __('Provided Link') }}</strong></th>
                                <td>{{ $jobApplication->link }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
