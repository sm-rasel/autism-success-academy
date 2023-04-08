@extends('layouts.admin.master')

@section('title')
    About Us
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About Us</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                    <h4 class="card-title mb-4">About Us List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.about_us_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Order</th>
                                <th>Title</th>
                            {{-- <th>About Description</th>--}}
                                <th>About Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $about->order }}</td>
                                    <td>{!! Str::words("$about->about_title", 5, ' ...') !!}</td>
                            {{-- <td>{!! Str::words("$about->about_description", 2, ".....") !!}</td>--}}
                                    <td>
                                        <img src="{{ asset($about->about_image) }}" class="" style="height: 40px;" alt="">
                                    </td>

                                    <td>
                                        @if($about->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.about_us_edit', ['id' => $about->id])}}" class="btn btn-outline-success btn-sm" title="Edit about Section">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <button class="btn btn-outline-warning btn-sm" title="Update Status" data-id="{{ $about->id }}" data-action="{{ route('admin.about_us_status_update',['id', $about->id]) }}" onclick="statusUpdate({{$about->id}})">
                                            @if($about->status == 1)
                                                <i class="fa fa-times"></i>
                                            @else
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </button>
                                        @if($about->status == 2)
                                            <button class="btn btn-outline-danger btn-sm" data-id="{{ $about->id }}" data-action="{{ route('admin.about_us_delete', ['id', $about->id]) }}" onclick="deleteConfirmation({{$about->id}})">
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
                        url: "{{url('/admin/page-settings/about-us-delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                toastr.success(results.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
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
        };

        function statusUpdate(id) {
            swal({
                title: `Are you sure ?`,
                text: "This About Section Will be Deactivated",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/about-us-status-update')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                toastr.success(results.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
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

