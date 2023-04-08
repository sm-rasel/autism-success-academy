@extends('layouts.admin.master')

@section('title')
    Programs Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Programs Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Programs Section</li>
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
                    <h4 class="card-title mb-4">Programs Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.programs_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Pillar Name</th>
                                    <th>Pillar Heading</th>
                                    <th>Pillar Text</th>
                                    <th>Pillar URL</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $program->pillar_name }}</td>
                                    <td>{{ $program->pillar_heading }}</td>
                                    <td>{!! Str::words("$program->pillar_text", 7, ' ...') !!}</td>
                                    <td>{!! Str::limit($program->pillar_link, 10) !!}</td>
                                    <td>{{ $program->order }}</td>
                                    <td>
                                        @if($program->status == 1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="fa fa-eye "></i></button>
                                        <a href="{{route('admin.programs_edit', ['id' => $program->id])}}" class="btn btn-warning btn-sm" title="Edit Program Section">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-id="{{ $program->id }}" data-action="{{ route('admin.programs_delete',$program->id) }}" onclick="deleteConfirmation({{$program->id}})">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" data-id="{{ $program->id }}" data-action="{{ route('admin.programs_status_update',$program->id) }}" onclick="statusUpdate({{$program->id}})">
                                            @if($program->status == 1)
                                            <i class="fa rounded-pill fa-times "></i>
                                            @else
                                            <i class="fa rounded-pill fa-check "></i>
                                            @endif
                                        </button>
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
                    url: "{{url('/admin/page-settings/programs-delete')}}/" + id,
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
                    url: "{{url('/admin/page-settings/programs-status-update')}}/" + id,
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
