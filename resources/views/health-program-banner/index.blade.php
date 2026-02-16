@extends('layouts.main') 
@section('title', 'Health Program Banner')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    @endpush

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fa fa-heartbeat bg-green" aria-hidden="true"></i>
                        <div class="d-inline">
                            <h5>{{ __('Health Program Banner')}}</h5>
                            <span>{{ __('Manage Health Program Banner')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/dashboard')}}" class="btn btn-outline-success" title="Home"><i class="ik ik-home"></i></a>
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
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h3>@lang('Health Program Banner')</h3>
                        @can('create')
                            <div class="card-header-right">
                                <a href="{{route('health-program-banner.create')}}" class="btn btn-primary">
                                    @lang('Add/Edit')
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table responsive">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl')}}</th>
                                    <th>{{ __('Title')}}</th>
                                    <th>{{ __('Description')}}</th>
                                    <th>{{ __('Banner Image')}}</th>
                                    <th>{{ __('Action')}}</th>
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
    <script src="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('js/alerts.js')}}"></script>
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            var searchable = [];
            var selectable = [];

            $.ajaxSetup({
                headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content"),
                }
            });

            var dTable = $('#datatable').DataTable({
                order: [],
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
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
                ajax: {
                    url: "{{route('health-program-banner.index')}}",
                    type: "get"
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'title', name: 'title', orderable: true, searchable: true},
                    {data:'description', name: 'description', orderable: true, searchable: true},
                    {data:'image', name: 'image', orderable: false, searchable: false},
                    {data:'action', name: 'action',  orderable: false, searchable: false}
                ],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn-sm btn-info',
                        title: 'Health Program Banner',
                        header: false,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-sm btn-success',
                        title: 'Health Program Banner',
                        header: true,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-warning',
                        title: 'Health Program Banner',
                        header: true,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible',
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-sm btn-primary',
                        title: 'Health Program Banner',
                        pageSize: 'A4',
                        header: true,
                        footer: true,
                        exportOptions: {
                            // columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-sm btn-default',
                        title: 'Health Program Banner',
                        // orientation:'landscape',
                        pageSize: 'A4',
                        header: true,
                        footer: false,
                        orientation: 'landscape',
                        exportOptions: {
                            // columns: ':visible',
                            stripHtml: false
                        }
                    }
                ],
            });

            // Delete functionality
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                
                swal({
                    title: "Are you sure?",
                    text: "You want to delete this Health Program Banner!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{url('health-program-banner')}}" + '/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                swal("Success!", response.success, "success");
                                dTable.ajax.reload();
                            },
                            error: function(xhr) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        });
                    }
                });
            });
        });
    </script> 
    @endpush

@endsection
