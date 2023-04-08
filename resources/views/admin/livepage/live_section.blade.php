@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Live Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Live Section</li>
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
                    <h4 class="card-title mb-4">Live Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.live_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Youtube Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($lives as $live)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{!! Str::words("$live->youtube_link", 5, ' ...') !!}</td>
                                    <td>
                                        @if($live->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger"> Inactive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.live_edit', ['id' => $live->id])}}" class="btn btn-outline-success btn-sm" title="Edit Live Section">
                                            <i class="fa fa-edit "></i>
                                        </a>

                                        <button class="btn btn-outline-warning btn-sm"   data-id="{{ $live->id }}" data-action="{{ route('admin.live_status_update', ['id' => $live->id]) }}" onclick="updateStatus({{$live->id}})">
                                            @if($live->status == 1)
                                                <i class="fa fa-times" title="Inactive Live"></i>
                                            @else
                                                <i class="fa fa-check" title="Active Live"></i>
                                            @endif
                                        </button>

                                        <button class="btn btn-outline-danger btn-sm remove-about" title="Delete Live" data-id="{{ $live->id }}" data-action="{{ route('admin.live_delete', ['id' => $live->id]) }}" onclick="deleteConfirmation({{$live->id}})">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        @endsection

        @section('customJs')
            <script type="text/javascript">

                {{--   Delete  Live     --}}
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
                                url: "{{url('/admin/page-settings/live-delete')}}/" + id,
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
                        text: "This Live will be unavvailable",
                        icon: "warning",
                        buttons: true,
                        dangerMode: false
                    }).then(function (e) {
                        if (e === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/admin/page-settings/live-status-update')}}/" + id,
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

