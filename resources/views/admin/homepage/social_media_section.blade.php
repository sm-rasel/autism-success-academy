@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Social Media Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Social Media Section</li>
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
                                <div class="card-body">
                                    @if (!isset($media))
                                        <form class="custom-validation" action="{{route('admin.social_media_store')}}" method="POST">
                                    @else
                                        <form class="custom-validation" action="{{route('admin.social_media_store', ['id' => $media->id])}}" method="POST">
                                    @endif
                                        @csrf
                                        @if (!isset($media))
                                            <div class="form-group">
                                                <label>Instagram Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="instagram_url" class="form-control" required placeholder="Please type Instagram Url"/>
                                                @if($errors->has('instagram_url'))
                                                    <span class="error">{{ $errors->first('instagram_url') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Instagram Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" value="{{ $media->instagram_url }}" name="instagram_url" class="form-control" required placeholder="Please type Instagram Url"/>
                                                @if($errors->has('instagram_url'))
                                                    <span class="error">{{ $errors->first('instagram_url') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($media))
                                            <div class="form-group">
                                                <label>Facebook Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="facebook_url" class="form-control" required placeholder="Please type Facebook Url"/>
                                                @if($errors->has('facebook_url'))
                                                    <span class="error">{{ $errors->first('facebook_url') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Facebook Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="facebook_url" value="{{$media->facebook_url}}" class="form-control" required placeholder="Please type Facebook Url"/>
                                                @if($errors->has('facebook_url'))
                                                    <span class="error">{{ $errors->first('facebook_url') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Social URL</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.index')}}';">Cancel</button>
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


