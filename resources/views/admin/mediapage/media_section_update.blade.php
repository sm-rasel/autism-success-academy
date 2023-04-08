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
                        <li class="breadcrumb-item active">Testimonial Page Head Image</li>
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
                                        <h4 class=" font-size-18">Testimonial Page Head Image Edit</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.media_index') }}" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.media_update', ['id' => $media->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Image Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" value="{{$media->order}}" class="form-control" required placeholder="Please Type a Order Number"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="file" name="media_image" class="form-control-file" required/>
                                            <div class="mt-2">
                                                <img src="{{asset($media->media_image)}}" style="height: 80px;" alt="">
                                            </div>
                                            @if($errors->has('media_image'))
                                                <span class="error">{{ $errors->first('media_image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Media Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.media_index')}}';">Cancel</button>
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


