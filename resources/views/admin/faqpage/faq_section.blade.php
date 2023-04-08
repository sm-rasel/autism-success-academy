@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">FAQ Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">FAQ Section</li>
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
                    <h4 class="card-title mb-4">FAQ Section List
                        <button class="btn btn-sm btn-outline-info w-md float-right"><a href="{{ route('admin.faq_add') }}">Create New</a></button>
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped align-middle table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Featured</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{!! Str::words("$faq->question", 5, ' ...') !!}</td>
                                    <td>{!! Str::words("$faq->answer", 5, ' ...') !!}</td>
                                    <td>
                                        @if($faq->is_featured == 1)
                                            <span class="badge rounded-pill badge-success"> Featured </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger"> Not Featured </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($faq->status == 1)
                                            <span class="badge rounded-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge rounded-pill badge-danger"> Inactive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.faq_edit', ['id' => $faq->id])}}" class="btn btn-outline-success btn-sm" title="Edit FAQ Section">
                                            <i class="fa fa-edit "></i>
                                        </a>

                                        <button class="btn btn-outline-warning btn-sm"   data-id="{{ $faq->id }}" data-action="{{ route('admin.faq_status_update', ['id' => $faq->id]) }}" onclick="updateStatus({{$faq->id}})">
                                            @if($faq->status == 1)
                                                <i class="fa fa-times" title="Inactive FAQ"></i>
                                            @else
                                                <i class="fa fa-check" title="Active FAQ"></i>
                                            @endif
                                        </button>

                                        <button class="btn btn-outline-info btn-sm"   data-id="{{ $faq->id }}" data-action="{{ route('admin.faq_featured_status_update', ['id' => $faq->id]) }}" onclick="updateFeaturedStatus({{$faq->id}})">
                                            @if($faq->is_featured == 2)
                                                <i class="fa fa-check-double" title="Active Featured Section"></i>
                                            @else
                                                <i class="fa fa-power-off" title="Inactive Featured Section"></i>
                                            @endif
                                        </button>

                                        <button class="btn btn-outline-danger btn-sm remove-about" title="Delete FAQ" data-id="{{ $faq->id }}" data-action="{{ route('admin.faq_delete', ['id' => $faq->id]) }}" onclick="deleteConfirmation({{$faq->id}})">
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

                {{--   Delete  FAQ     --}}
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
                                url: "{{url('/admin/page-settings/faq-delete')}}/" + id,
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

                {{--  Update Featured Status  --}}

                function updateFeaturedStatus(id)
                {
                    swal({
                        title: 'Are you sure ?',
                        text: 'This FAQ will be Visible In Program Page',
                        icon: "warning",
                        buttons: true,
                        dangerMode: false
                    }).then(function (e)
                    {
                        if (e === true)
                        {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/admin/page-settings/faq-featured-status-update')}}/" + id,
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (results)
                                {
                                    if (results.success == true)
                                    {
                                        toastr.success(results.message);
                                        setTimeout(function ()
                                        {
                                            location.reload();
                                        }, 500);
                                    }
                                    else
                                    {
                                        toastr.error(results.message);
                                    }

                                }
                            });
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

                {{--   Update Status     --}}
                function updateStatus(id) {
                    swal({
                        title: `Are you sure ?`,
                        text: "This FAQ will be unavailable",
                        icon: "warning",
                        buttons: true,
                        dangerMode: false,
                    }).then(function (e)
                    {
                        if (e === true)
                        {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'POST',
                                url: "{{url('/admin/page-settings/faq-status-update')}}/" + id,
                                data: {_token: CSRF_TOKEN},
                                dataType: 'JSON',
                                success: function (results) {
                                    if (results.success === true) {
                                        toastr.success(results.message);
                                        setTimeout(function () {
                                            location.reload();
                                        }, 500);
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

