@extends('layouts.main') 
@section('title', 'Middle Banner Item')
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
                        <i>
                            <img src="{{ asset('sections/home/home-s4.png') }}" alt="" srcset="" style="max-width: 40px; max-height: 50px">
                        </i>
                        <div class="d-inline">
                            <h5>{{ __('HOME PAGE')}}</h5>
                            <span>{{ __('Section-4')}}</span>
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
                        {{-- <h3>@lang('Middle Banner Item')</h3> --}}
                        @can('create')
                            <div class="card-header-right">
                                <a href="{{URL::to('home-page/middle-banner-content/create')}}" class="btn btn-primary">
                                    @lang('Add Country')
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($middleBanner) ? route('middle-banner.update', $middleBanner->id) : route('middle-banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($middleBanner))
                                @method('PUT')
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="banner_image">
                                        {{ __('Banner Image (1920*600)') }}
                                        <span class="text-red">*</span>
                                    </label>
                                    <input type="file" class="form-control dropify" id="banner_image" name="banner_image">
                                
                                    @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($middleBanner && $middleBanner->image)
                                <div class="form-group col-md-6">
                                    <label for="image">
                                        {{ __('Current Image') }}
                                    </label>
                                    <img class="form-control" src="{{  asset('images/' . $middleBanner->image) }}"
                                    width="100px" alt="Existing Image" style="height: 200px">
                                </div>
                                @endif
                                
                            </div>

                            <div class="row mt-30">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table responsive">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl')}}</th>
                                    <th>{{ __('Country')}}</th>
                                    <th>{{ __('Country Image')}}</th>
                                    <th>{{ __('Description')}}</th>
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
                // dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                ajax: {
                    url: "{{route('home-page.middle-banner-content.index')}}",
                    type: "get"
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'country_name', name: 'country_name', orderable: true, searchable: true},
                    {data:'country_image', name: 'country_image', orderable: true, searchable: true},
                    {data:'description', name: 'description', orderable: true, searchable: true},
                    {data:'action', name: 'action',  orderable: false, searchable: false}

                ],
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
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
            var url = '{{ route("home-page.middle-banner-content.destroy",":id") }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                success: function (resp) {
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


