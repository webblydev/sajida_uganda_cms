@extends('layouts.main')
@section('title', 'Health Program Section Three')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('HEALTH PROGRAM SECTION THREE') }}</h5>
                            <span>{{ __('Impacts Made Statistics') }}</span>
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
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Health Program Section Three List') }}</h3>
                        <div class="card-header-right">
                            <a href="{{ route('health-program-section-three.create') }}" class="btn btn-primary">
                                <i class="ik ik-plus"></i> {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Section Title') }}</th>
                                    <th>{{ __('First Stat') }}</th>
                                    <th>{{ __('Background Image') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                var table = $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('health-program-section-three.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'section_title',
                            name: 'section_title'
                        },
                        {
                            data: 'stat_one',
                            name: 'stat_one'
                        },
                        {
                            data: 'background_image',
                            name: 'background_image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

                // Delete functionality
                $(document).on('click', '.delete-btn', function() {
                    var id = $(this).data('id');
                    if (confirm('Are you sure you want to delete this item?')) {
                        $.ajax({
                            url: "{{ url('health-program-section-three') }}/" + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload();
                                alert(response.success);
                            },
                            error: function(xhr) {
                                alert('Error: ' + xhr.responseJSON.error);
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
