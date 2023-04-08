@extends('layouts.admin.master')

@section('title')
    Meet Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Meet Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Meet Section</li>
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
                    <h4 class="card-title mb-4">Meet Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.meet_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Meet Header</th>
                                    <th>Meet Text</th>
                                    <th>Button Text</th>
                                    <th>Button URL</th>
                                    <th>Youtube URL</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($meets as $meet)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $meet->header }}</td>
                                    <td>{!! Str::words("$meet->meet_text", 5, ' ...') !!}</td>
                                    <td>{{ $meet->button_text }}</td>
                                    <td>{!! Str::limit($meet->button_url, 15) !!}</td>
                                    <td>{!! Str::limit($meet->youtube_url, 15) !!}</td>
                                    <td>
                                        @if($meet->status == 1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="fa fa-eye "></i></button>
                                        <a href="{{route('admin.meet_edit', ['id' => $meet->id])}}" class="btn btn-warning btn-sm" title="Edit Meet Section">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-id="{{ $meet->id }}" data-action="{{ route('admin.meet_delete',$meet->id) }}" onclick="deleteConfirmation({{$meet->id}})">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" data-id="{{ $meet->id }}" data-action="{{ route('admin.meet_status_update',$meet->id) }}" onclick="statusUpdate({{$meet->id}})">
                                            @if($meet->status == 1)
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
                    url: "{{url('/admin/page-settings/meet-delete')}}/" + id,
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
                    url: "{{url('/admin/page-settings/meet-status-update')}}/" + id,
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
