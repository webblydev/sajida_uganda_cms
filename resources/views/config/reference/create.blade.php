@extends('layouts.main')
@section('title', 'Create References')
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
                            <h5>{{ __('Reference') }}</h5>

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
                        <h3>{{ __('Add Reference') }}</h3>
                    </div>
                    <div class="card-body">

                        {{-- {{ Form::open(array('route' => 'hrm.designation.store', 'class' => 'forms-sample', 'id'=>'createRank','method'=>'POST')) }} --}}
                        <form action="{{ route('reference.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">
                                            {{ __('Reference Name') }}
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
                                        <label for="phone_number">
                                            {{ __('Phone Number') }}
                                            <span class="text-red">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+88</span>
                                            <input type="text" class="form-control phone-number-input" id="phone_number"
                                                name="phone_number" placeholder="e.g 01712345678" required
                                                value="{{ old('phone_number') }}">
                                        </div>
                                        <small class="text-danger error-message" style="display: none;">Phone number should
                                            be 11
                                            digits.</small>
                                        <div class="help-block with-errors"></div>
                                        @error('phone_number')
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

            const phoneNumberInputs = document.querySelectorAll('.phone-number-input');

            function formatPhoneNumber(event) {
                const input = event.target;
                let formattedNumber = input.value.replace(/\D/g, '');

                if (formattedNumber.length > 0) {
                    formattedNumber = formattedNumber.replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
                }

                input.value = formattedNumber;
            }

            function validatePhoneNumber(event) {
                const input = event.target;
                const phoneNumber = input.value.replace(/\D/g, '');
                const errorMessage = input.parentElement.parentElement.querySelector('.error-message');

                if (phoneNumber.length !== 11) {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    errorMessage.style.display = 'block';
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    errorMessage.style.display = 'none';
                }
            }

            phoneNumberInputs.forEach(input => {
                input.addEventListener('input', formatPhoneNumber);
                input.addEventListener('blur', validatePhoneNumber);
            });

        });
    </script>
@endsection
