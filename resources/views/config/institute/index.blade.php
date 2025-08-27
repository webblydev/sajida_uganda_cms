@extends('layouts.main')
@section('title', 'Institutes')
@section('content')
    @push('head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/toggle.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-green"></i>
                        <div class="d-inline">
                            <h5>{{ __('INSTITUTES') }}</h5>
                            <span>{{ __('Institute list') }}</span>
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
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h3>@lang('Institute')</h3>
                        @can('manage_institutes')
                            <div class="card-header-right d-flex">
                                <a href="{{ route('institute.create') }}" class="btn btn-primary mr-2">
                                    @lang('Add')
                                </a>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
                                    @lang('Import')
                                </button>
                            </div>
                        @endcan
                    </div>
                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                        aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('institute.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file-input">Choose File</label>
                                            <input type="file" name="file" class="form-control-file" id="file-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="file-type">File Type</label>
                                            <select class="form-control" id="file-type" name="file-type">
                                                <option value="excel">Excel (XLSX)</option>
                                                <option value="csv">CSV</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Institute') }}</th>
                                    <th>{{ __('Area') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('URL') }}</th>
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
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
        <script src="{{ asset('js/alerts.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var searchable = [];
                var selectable = [];
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    }
                });

                var dTable = $('#datatable').DataTable({
                    ordering: true,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'csv',
                        className: 'btn-secondary',
                    }, {
                        extend: 'excel',
                        className: 'btn-success',
                    }],
                    processing: true,
                    responsive: false,
                    serverSide: true,
                    language: {
                        processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
                    },
                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                    ajax: {
                        url: "{{ route('institute.index') }}",
                        type: "get"
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: true,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'Institute',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'area_name',
                            name: 'Area',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'address',
                            name: 'Address',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'url',
                            name: 'URL',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }

                    ],
                });
            });
            // delete Confirm
            function showDeleteConfirm(id) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        deleteItem(id);
                    }
                });
            };

            // Delete Button
            function deleteItem(id) {
                var url = "{{ route('institute.destroy', ':id') }}";
                $.ajax({
                    type: "POST",
                    data: {
                        _method: "DELETE",
                    },
                    url: url.replace(':id', id),
                    success: function(resp) {
                        console.log(resp);
                        // Reloade DataTable
                        $('#datatable').DataTable().ajax.reload();

                        if (resp.success === true) {
                            // show toast message
                            $.toast({
                                heading: 'Success',
                                text: resp.message,
                                position: 'top-right',
                                showHideTransition: 'slide',
                                stack: false,
                                icon: 'success'
                            })
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: resp.message,
                                position: 'top-right',
                                showHideTransition: 'slide',
                                stack: false,
                                icon: 'error'
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorMessage) {
                        console.log(errorMessage);
                    }
                })
            }
        </script>
    @endpush
@endsection
