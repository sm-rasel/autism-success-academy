@extends('layouts.admin.master')

@section('title')
    Achieve Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Achieve Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Achieve Section</li>
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
                    <h4 class="card-title mb-4">Achieve Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.achieve_section_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($achieves as $achieve)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $achieve->order }}</td>
                                    <td>{!! Str::words("$achieve->title", 5, ' ...') !!}</td>
                                    <td>{!! Str::words("$achieve->description", 3, ' ...') !!}</td>
                                    <td>
                                        @if($achieve->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-outline-success" onclick="window.location.href='{{ route('admin.achieve_section_edit', ['id' => $achieve->id]) }}'" title="Edit Achieve Section">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" data-id="{{ $achieve->id }}" data-action="{{ route('admin.diploma_section_status_update',['id' => $achieve->id]) }}" onclick="statusUpdate({{$achieve->id}})" title="Update Diploma Section Status">
                                            @if($achieve->status == 1)
                                                <i class="fa fa-times "></i>
                                            @else
                                                <i class="fa fa-check "></i>
                                            @endif
                                        </button>
                                        @if($achieve->status == 2)
                                            <button class="btn btn-outline-danger btn-sm" data-id="{{ $achieve->id }}" data-action="{{ route('admin.diploma_section_delete',['id' => $achieve->id]) }}" onclick="deleteConfirmation({{$achieve->id}})" title="Delete Diploma Section">
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
                        url: "{{url('/admin/page-settings/achieve-section-delete')}}/" + id,
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
                        url: "{{url('/admin/page-settings/achieve-section-status-update')}}/" + id,
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

    </script>
@endsection
