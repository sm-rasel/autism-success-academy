@extends('layouts.admin.master')

@section('title')
    About Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">About Section</li>
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
                    <h4 class="card-title mb-4">About Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.about_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>About Text One</th>
                                    <th>About Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($abouts as $about)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $about->name }}</td>
                                    <td>{!! Str::words("$about->about_one", 5, ' ...') !!}</td>
                                    <td>
                                        <img src="{{ asset($about->about_image) }}" class="" style="height: 25px;" alt="">
                                    </td>
                                    <td>
                                        @if($about->status == 1)
                                        <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                        <span class="badge rounded-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="fa fa-eye "></i></button>
                                        <a href="{{route('admin.about_edit', ['id' => $about->id])}}" class="btn btn-warning btn-sm" title="Edit About Section">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-id="{{ $about->id }}" data-action="{{ route('admin.about_delete',$about->id) }}" onclick="deleteConfirmation({{$about->id}})">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" data-id="{{ $about->id }}" data-action="{{ route('admin.about_status_update',$about->id) }}" onclick="statusUpdate({{$about->id}})">
                                            @if($about->status == 1)
                                            <i class="fa fa-times "></i>
                                            @else
                                            <i class="fa fa-check "></i>
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
                    url: "{{url('/admin/page-settings/about-delete')}}/" + id,
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
                    url: "{{url('/admin/page-settings/about-status-update')}}/" + id,
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
