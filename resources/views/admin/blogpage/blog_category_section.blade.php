@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Blog Category Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Blog Category Section</li>
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
                    <h4 class="card-title mb-4">Blog Category Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.blog_category_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Blog Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$blogCategory->category_name}}</td>
                                    <td>
                                        @if($blogCategory->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger"> Inactive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.blog_category_edit', ['id' => $blogCategory->id])}}" class="btn btn-outline-success btn-sm" title="Edit Hero Section">
                                            <i class="fa fa-edit "></i>
                                        </a>

                                        <button class="btn btn-outline-warning btn-sm" title="Active Hero Section"  data-id="{{ $blogCategory->id }}" data-action="{{ route('admin.blog_category_status_update', ['id' => $blogCategory->id]) }}" onclick="updateStatus({{$blogCategory->id}})">
                                            @if($blogCategory->status == 1)
                                                <i class="fa fa-times"></i>
                                            @else
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </button>

                                        <button class="btn btn-outline-danger btn-sm remove-about" title="Delete Hero Section" data-id="{{ $blogCategory->id }}" data-action="{{ route('admin.blog_category_delete', ['id' => $blogCategory->id]) }}" onclick="deleteConfirmation({{$blogCategory->id}})">
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

                {{--   Delete Seen Area Image     --}}
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
                                url: "{{url('/admin/page-settings/blog-category-delete')}}/" + id,
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
                                url: "{{url('/admin/page-settings/blog-category-status-update')}}/" + id,
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

