@extends('layouts.admin.master')

@section('title')
    Blogs
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Blogs</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
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
                    <h4 class="card-title mb-4">Blog List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.blog_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category Name</th>
                                    <th>Title</th>
                                    <th>Blog Image</th>
                                    <th>Featured Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $blog->blogCategory->category_name }}</td>
                                    <td>{!! Str::words("$blog->title", 5, ' ...') !!}</td>
                                    <td>
                                        <img src="{{ asset($blog->blog_image) }}" class="" style="height: 25px;" alt="">
                                    </td>
                                    <td>
                                        @if($blog->is_featured == 1)
                                        <span class="badge badge-success"> Featured </span>
                                        @else
                                        <span class="badge badge-danger">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($blog->status == 1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success btn-sm"><i class="fa fa-eye "></i></button>
                                        <a href="{{route('admin.blog_edit', ['slug' => $blog->slug])}}" class="btn btn-warning btn-sm" title="Edit blog Section">
                                            <i class="fa fa-edit "></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-id="{{ $blog->slug }}" data-action="{{ route('admin.blog_delete',$blog->slug) }}" onclick="deleteConfirmation({{$blog->id}})">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" data-id="{{ $blog->slug }}" data-action="{{ route('admin.blog_status_update',$blog->slug) }}" onclick="statusUpdate({{$blog->id}})">
                                            @if($blog->status == 1)
                                            <i class="fa fa-times "></i>
                                            @else
                                            <i class="fa fa-check "></i>
                                            @endif
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary" data-id="{{ $blog->slug }}" data-action="{{ route('admin.blog_featured_status_update',$blog->slug) }}" onclick="featuredUpdate({{$blog->id}})">
                                            @if($blog->is_featured == 2)
                                            <i class="fa fa-check-double"></i>
                                            @else
                                            <i class="fa fa-power-off"></i>
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
                    url: "{{url('/admin/page-settings/blog-delete')}}/" + id,
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
            text: "This Blog Will be Deactivated",
            icon: "warning",
            buttons: true,
            dangerMode: false
        }).then(function (e) {
            if (e === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/page-settings/blog-status-update')}}/" + id,
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
