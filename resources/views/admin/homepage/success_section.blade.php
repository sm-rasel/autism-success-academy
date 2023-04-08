@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Success Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Success Section</li>
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
                    <h4 class="card-title mb-4">Success Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{route('admin.success_add')}}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="text-center align-content-center">
                                <th>Sl No.</th>
                                <th>Order</th>
                                <th>Slider Image</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($successes as $success)
                                <tr class="text-center m-auto">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $success->order }}</td>
                                    <td>
                                        <img src="{{asset($success->success_image)}}" alt="" style="height: 50px;">
                                    </td>
                                    <td>
                                        @if($success->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($success->is_featured == 1)
                                            <span class="badge rounded-pill badge-success"> Featured </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger"> Not Featured </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.success_edit', ['id' => $success->id])}}" class="btn btn-outline-success btn-sm" title="Edit Success Section">
                                            <i class="fa fa-edit "></i>
                                        </a>

                                        <button class="btn btn-outline-warning btn-sm" title="Active Testimonial Section"  data-id="{{ $success->id }}" data-action="{{ route('admin.success_status_update', ['id' => $success->id]) }}" onclick="updateStatus({{$success->id}})">
                                            @if($success->status == 1)
                                                <i class="fa fa-times"></i>
                                            @else
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" title="Active Success Section"  data-id="{{ $success->id }}" data-action="{{ route('admin.success_featured_update', ['id' => $success->id]) }}" onclick="updatefeatured({{$success->id}})">
                                            @if($success->is_featured == 2)
                                                <i class="fa fa-check-double"></i>
                                            @else
                                                <i class="fa fa-power-off"></i>
                                            @endif
                                        </button>
                                        @if($success->status == 2 && $success->is_featured == 2)
                                            <button class="btn btn-outline-danger btn-sm remove-about" title="Delete Success Section" data-id="{{ $success->id }}" data-action="{{ route('admin.hero_delete', ['id' => $success->id]) }}" onclick="deleteConfirmation({{$success->id}})">
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

    {{-- Delete Success Section Area --}}

    function deleteConfirmation(id) {
        swal({
            title: 'Are you sure',
            text: "You Won't be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: false,
        }).then(function (e) {
            if (e == true)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/page-settings/success-delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: "JSON",
                    success: function (results) {
                        if (results.success == true)
                        {
                            swal("Done!", results.message, "success");
                            location.reload();
                        }
                        else
                        {
                            swal("Error!", results.message, "error");
                        }
                    }
                });
            }
            else
            {
                e.dismiss;
            }
        },
        function (dismiss) {
            return false;
        })
    }

    {{--  Status Activation Section --}}

    function updateStatus(id) {
        swal({
            title: 'Are you sure ? ',
            text: "This Image Will be Visible in Testimonial Section!",
            icon: "warning",
            buttons: true,
            dangerMode: false,
        }).then(function (e) {
            if (e == true)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/page-settings/success-status-update')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success == true) {
                            toastr.success(results.message);
                            setTimeout(function (){
                                location.reload();
                            },500)
                        }
                        else {
                            toastr.success(results.message);
                        }
                    }
                });
            }
            else
            {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }

    {{-- Featured Active Section --}}

    function updatefeatured(id)
    {
        swal({
            title: 'Are you sure ?',
            text: 'This Image Will be Visible In Home Page !',
            icon: "warning",
            buttons: true,
            dangerMode: false,
        }).then(function (e) {
            if (e == true)
            {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/page-settings/success-featured-update')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true)
                        {
                            toastr.success(results.message);
                            setTimeout(function () {
                                location.reload();
                            }, 400)
                        }
                        else
                        {
                            toastr.error(results.message);
                        }
                    }
                })
            }
            else
            {
                e.dismiss;
            }
        },function (dismiss)
            {
                return false;
            })
    }

    </script>
@endsection
