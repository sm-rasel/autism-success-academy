@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="mb-0"></div>
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
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <h4 class=" font-size-18">Live Editing Section</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.live_index') }}" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.live_update', ['id' => $live->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Youtube Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="youtube_link" class="form-control" value="{{ $live->youtube_link }}" required placeholder="Type Youtube Url"/>
                                            @if($errors->has('button_url'))
                                                <span class="error">{{ $errors->first('button_url') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Live</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.live_index')}}';">Cancel</button>
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


