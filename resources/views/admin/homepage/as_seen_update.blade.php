@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">As Seen Edit Section</li>
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
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <h4 class=" font-size-18">Seen Editing Section</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.as_seen_index') }}" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.as_seen_update', ['id' => $as_seen->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>As Seen Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" value="{{$as_seen->order}}" name="order" class="form-control" required/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>As Seen Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="file" name="seen_image" class="form-control-file mb-4" required/>
                                            <img src="{{asset($as_seen->seen_image)}}" style="height: 80px;" alt="">
                                            @if($errors->has('seen_image'))
                                                <span class="error">{{ $errors->first('seen_image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update As Seen</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.as_seen_index')}}';">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


