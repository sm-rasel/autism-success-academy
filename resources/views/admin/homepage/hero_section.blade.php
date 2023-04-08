@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Hero Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Hero Section</li>
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
                    <h4 class="card-title mb-4">Hero Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.hero_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Header One</th>
                                    <th>Tagline</th>
                                    <th>Question Text</th>
                                    <th>Hero Video</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($heroes as $hero)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-center">{{$hero->heading_one}}</td>
                                    <td class="text-center">{{$hero->tag_line}}</td>
                                    <td class="text-center">{{$hero->question_text}}</td>
                                    <td class="text-center">
                                        <video autoplay="" loop="" muted="" style="height: 60px;">
                                            <source src="{{asset($hero->video)}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                        @if($hero->status == 1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        <button type="button" class="btn btn-outline-info btn-sm" title="Show Details" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header col-lg-12">
                                                        <h4 class="modal-title col-lg-6">Hero Section Details</h4>
{{--                                                        <div class="col-sm-4 float-right mt-1">--}}
{{--                                                            @if($hero->status == 1)--}}
{{--                                                                <span class="badge badge-success">Active</span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="badge badge-danger">Inactive</span>--}}
{{--                                                            @endif--}}
{{--                                                        </div>--}}
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Header One</label>
                                                            <input type="text" class="form-control" value="{{$hero->heading_one}}" readonly/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Two</label>
                                                            <input type="text" class="form-control" value="{{$hero->heading_two}}" readonly/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Three</label>
                                                            <input type="text" class="form-control" value="{{$hero->heading_three}}" readonly/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Button Text</label>
                                                            <input type="text" class="form-control" value="{{$hero->button_text}}" readonly/>
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger btn-lg px-5 " data-dismiss="modal">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('admin.hero_edit', ['id' => $hero->id])}}" class="btn btn-outline-success btn-sm" title="Edit Hero Section">
                                            <i class="fa fa-edit "></i>
                                        </a>

                                        <button class="btn btn-outline-warning btn-sm" title="Active Hero Section"  data-id="{{ $hero->id }}" data-action="{{ route('admin.hero_status_update', ['id' => $hero->id]) }}" onclick="updateStatus({{$hero->id}})">
                                            @if($hero->status == 1)
                                                <i class="fa rounded-pill fa-times"></i>
                                            @else
                                                <i class="fa rounded-pill fa-check"></i>
                                            @endif
                                        </button>
                                        @if($hero->status == 2)
                                        <button class="btn btn-outline-danger btn-sm remove-about" title="Delete Hero Section" data-id="{{ $hero->id }}" data-action="{{ route('admin.hero_delete', ['id' => $hero->id]) }}" onclick="deleteConfirmation({{$hero->id}})">
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

       {{--   Delete Hero Area     --}}
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
                        url: "{{url('/admin/page-settings/hero-delete')}}/" + id,
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


       {{--   Update Status     --}}
        function updateStatus(id) {
            swal({
                title: `Are you sure ?`,
                text: "This Section Will be Visible In Front Section",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/hero-status-update')}}/" + id,
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
