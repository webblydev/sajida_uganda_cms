@extends('layouts.main')
@section('title', 'Create Sessions')
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
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Session') }}</h5>

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
            <!-- start message session-->
            @include('include.message')
            <!-- end message session-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Add Session') }}</h3>
                    </div>
                    <div class="card-body">

                        {{-- {{ Form::open(array('route' => 'hrm.designation.store', 'class' => 'forms-sample', 'id'=>'createRank','method'=>'POST')) }} --}}
                        <form action="{{ route('session.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">
                                            {{ __('Session Name') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" placeholder="">
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
                                        <label for="session_date">
                                            {{ __('Session Date') }}
                                        </label>
                                        <input type="month" id="session_date" type="text"
                                            class="form-control @error('session_date') is-invalid @enderror" name="session_date" placeholder="">{{ old('session_date') }}</input>
                                        <div class="help-block with-errors"></div>
                                        @error('session_date')
                                            <span class="text-red-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    @endpush

    <script type="text/javascript">
        $(document).ready(function() {

            $(".integer-decimal-only").each(function() {
                $(this).keypress(function(e) {
                    var code = e.charCode;

                    if (((code >= 48) && (code <= 57)) || code == 0 || code == 46) {
                        return true;
                    } else {
                        return false;
                    }
                });
            });


            $('#add-store').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/newstore",
                    data: $('#add-store').serialize(),
                    //processData: false,
                    dataType: 'json',
                    //contentType: false,
                    //beforeSend: function(){},
                    success: function(response) {
                        console.log(response);
                        alert("Data saved successfully.");
                    }
                    //error: alert("Data can not be saved.")
                });
            });



        });
    </script>
@endsection
