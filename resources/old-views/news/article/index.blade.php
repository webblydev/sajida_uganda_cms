@extends('layouts.main')
@section('title', 'News Articles')
@section('content')
    <!-- push external head elements to head -->
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
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-success" title="Home"><i
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
                        {{-- <h3>@lang('News Articles')</h3> --}}
                        @can('create')
                            <div class="card-header-right">
                                <a href="{{ URL::to('news-page/news/create') }}" class="btn btn-primary">
                                    @lang('Add')
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table responsive">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Feature News') }}</th>
                                    <th>{{ __('Image') }}</th>
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
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
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
                    // dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                    ajax: {
                        url: "{{ route('news-page.news.index') }}",
                        type: "get"
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'title',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'category',
                            name: 'category',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'description',
                            name: 'description',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'image',
                            name: 'image',
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
                var url = '{{ route('news-page.news.destroy', ':id') }}';
                $.ajax({
                    type: "DELETE",
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
            //Status
            $('.card-body').on('click', '.changeStatus', function(e) {
                e.preventDefault();
                var id = $(this).attr('getId');
                // var id=JSON.stringify($(this).attr('getId'))
                // console.log(id);
                swal({
                    title: `Are you sure?`,
                    text: `Want to change this status?`,
                    buttons: true,
                    dangerMode: true,
                }).then((changeStatus) => {
                    if (changeStatus) {
                        var url = '{{ route('news.status', ':id') }}';
                        $.ajax({
                            type: "GET",
                            url: url.replace(':id', id),
                            success: function(resp) {
                                // alert(resp);
                                console.log(resp);
                                $('#datatable').DataTable().ajax.reload();
                                if (resp.success === true) {
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
                                        heading: 'Success',
                                        text: resp.message,
                                        position: 'top-right',
                                        showHideTransition: 'slide',
                                        stack: false,
                                        icon: 'warning'
                                    })
                                }
                            },
                            error: function(jqXHR, textStatus, errorMessage) {
                                console.log(errorMessage);
                            }
                        });
                    }
                });
            })
        </script>
    @endpush
@endsection
