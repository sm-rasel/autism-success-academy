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
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="custom-validation" action="{{route('admin.meet_update',['id' => $meet->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Header
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $meet->header }}" class="form-control" name="header" placeholder="Type Header"/>
                                            @if($errors->has('header'))
                                                <span class="error">{{ $errors->first('header') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Header Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $meet->header_two }}" class="form-control" name="header_two" placeholder="Type Header Two"/>
                                            @if($errors->has('header_two'))
                                                <span class="error">{{ $errors->first('header_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Meet Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <textarea name="meet_text" required class="form-control" rows="5" placeholder="Meet Text">{{ $meet->meet_text }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Meet Text Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <textarea name="meet_text_two" required class="form-control" rows="5" placeholder="Meet Text">{{ $meet->meet_text_two }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Button Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $meet->button_text }}" class="form-control" name="button_text" placeholder="Type Button Text"/>
                                            @if($errors->has('button_text'))
                                                <span class="error">{{ $errors->first('button_text') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Button Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="button_url" value="{{ $meet->youtube_url }}" class="form-control" required placeholder="Type Youtube Url"/>
                                            @if($errors->has('button_url'))
                                                <span class="error">{{ $errors->first('button_url') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Youtube Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="youtube_url" value="{{ $meet->youtube_url }}" class="form-control" required placeholder="Type Youtube Url"/>
                                            @if($errors->has('youtube_url'))
                                                <span class="error">{{ $errors->first('youtube_url') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Youtube Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="file" name="youtube_image" class="form-control-file" required/>
                                            <div class="mt-2">
                                                <img src="{{asset($meet->youtube_image)}}" style="height: 80px;" alt="">
                                            </div>
                                            @if($errors->has('youtube_image'))
                                                <span class="error">{{ $errors->first('youtube_image') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Creat New Meet Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.meet_index')}}';">Cancel</button>
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
