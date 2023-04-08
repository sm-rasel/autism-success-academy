@extends('layouts.admin.master')

@section('title')
    Piller Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Piller Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Piller Section</li>
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
                    <h4 class="card-title mb-4">Piller Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.piller_section_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Order</th>
                                    <th>Pillar Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pillers as $piller)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $piller->order }}</td>
                                    <td>{{ $piller->piller_name }}</td>
                                    <td>
                                        @if($piller->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-success" onclick="window.location.href='{{ route('admin.piller_section_edit', ['id' => $piller->id]) }}'" title="Edit First Section">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" data-id="{{ $piller->id }}" data-action="{{ route('admin.piller_section_status_update',$piller->id) }}" onclick="statusUpdate({{$piller->id}})">
                                            @if($piller->status == 1)
                                                <i class="fa rounded-pill fa-times "></i>
                                            @else
                                                <i class="fa rounded-pill fa-check "></i>
                                            @endif
                                        </button>
                                        @if($piller->status == 2)
                                            <button class="btn btn-outline-danger btn-sm" data-id="{{ $piller->id }}" data-action="{{ route('admin.piller_section_delete',$piller->id) }}" onclick="deleteConfirmation({{$piller->id}})">
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
                        url: "{{url('/admin/page-settings/piller-section-delete')}}/" + id,
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
                text: "This Section Will Be Visible In Front Section",
                icon: "warning",
                buttons: true,
                dangerMode: false
            }).then(function (e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/admin/page-settings/piller-section-status-update')}}/" + id,
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
