@extends('layouts.admin.master')

@section('title')
    First Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">First Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">First Section</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">First Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.first_section_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Title</th>
                                    <th>Description One</th>
                                    <th>Description two</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($firsts as $first)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{!! Str::words("$first->title", 2, ' ...') !!}</td>
                                    <td>{!! Str::words("$first->shot_description_one", 3, ' ...') !!}</td>
                                    <td>{!! Str::words("$first->shot_description_two", 3, ' ...') !!}</td>
                                    <td>
                                        <img src="{{ asset($first->first_image) }}" class="" style="height: 50px;" alt="">
                                    </td>
                                    <td>
                                        @if($first->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-outline-success" onclick="window.location.href='{{ route('admin.first_section_edit', ['id' => $first->id]) }}'" title="Edit First Section">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" data-id="{{ $first->id }}" data-action="{{ route('admin.first_section_status_update',['id' => $first->id]) }}" onclick="statusUpdate({{$first->id}})" title="Update First Section Status">
                                            @if($first->status == 1)
                                                <i class="fa fa-times "></i>
                                            @else
                                                <i class="fa fa-check "></i>
                                            @endif
                                        </button>
                                        @if($first->status == 2)
                                            <button class="btn btn-outline-danger btn-sm" data-id="{{ $first->id }}" data-action="{{ route('admin.first_section_delete',['id' => $first->id]) }}" onclick="deleteConfirmation({{$first->id}})" title="Delete First Section">
                                                <i class="fa fa-trash "></i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('customJs')
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal({
                title: `Are you sure ?`,
                text: "You won't be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/first-section-delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                toastr.success(results.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 800);
                            } else {
                                toastr.error(results.message);
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
        function statusUpdate(id) {
            swal({
                title: `Are you sure ?`,
                text: "This Section Will be Deactivated",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/first-section-status-update')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true)
                            {
                                toastr.success(results.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 800);
                            } else {
                                toastr.error(results.message);
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
        function featuredUpdate(id) {
            swal({
                title: `Are you sure ?`,
                text: "This Section Will Be Visible In Front Section",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/blog-featured-status-update')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                toastr.success(results.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 800);
                            } else {
                                toastr.error(results.message);
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
