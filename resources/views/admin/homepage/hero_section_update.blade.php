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
                        <li class="breadcrumb-item active">Hero Editing Section</li>
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
                                        <h4 class=" font-size-18">Hero Editing Section</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.hero_index') }}" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.hero_update', ['id' => $hero->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Header One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="heading_one" class="form-control" value="{{$hero->heading_one}}" required placeholder="Type Hero Header One"/>
                                            @if($errors->has('heading_one'))
                                                <span class="error">{{ $errors->first('heading_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Header Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="heading_two" class="form-control" value="{{$hero->heading_two}}" required placeholder="Type Hero Header Two"/>
                                            @if($errors->has('heading_two'))
                                                <span class="error">{{ $errors->first('heading_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Header Three
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="heading_three" class="form-control" value="{{$hero->heading_three}}" required placeholder="Type Hero Header Three"/>
                                            @if($errors->has('heading_three'))
                                                <span class="error">{{ $errors->first('heading_three') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tagline
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{$hero->tag_line}}" name="tag_line" class="form-control" required placeholder="Type Tag Line"/>
                                            @if($errors->has('tag_line'))
                                                <span class="error">{{ $errors->first('tag_line') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Question Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{$hero->question_text}}" name="question_text" class="form-control" required placeholder="Question Text"/>
                                            @if($errors->has('question_text'))
                                                <span class="error">{{ $errors->first('question_text') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Roll Out
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="roll_out" value="{{$hero->roll_out}}" class="form-control" required placeholder="Roll Out Text"/>
                                            @if($errors->has('roll_out'))
                                                <span class="error">{{ $errors->first('roll_out') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Button Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="button_text" class="form-control" value="{{$hero->button_text}}" required placeholder="Type Button Text"/>
                                            @if($errors->has('button_text'))
                                                <span class="error">{{ $errors->first('button_text') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Button Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="button_url" class="form-control" value="{{$hero->button_url}}" required placeholder="Type Button Url"/>
                                            @if($errors->has('button_url'))
                                                <span class="error">{{ $errors->first('button_url') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Hero Video</label>
                                            <div>
                                                <input type="file" name="video" class="form-control-file">
                                            </div>
                                            <video class="h-100 w-50 mt-md-4" autoplay="" loop="" muted="" src="{{asset($hero->video)}}"></video>
                                            @if($errors->has('video'))
                                                <span class="error">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Logo Image</label>
                                            <div>
                                                <input type="file" name="logo_image" class="form-control-file">
                                            </div>
                                            <div>
                                                <img src="{{ asset($hero->logo_image) }}" class="img-fluid" style="width: 300px;" alt="">
                                            </div>
                                            @if($errors->has('logo_image'))
                                                <span class="error">{{ $errors->first('logo_image') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md waves-light mr-1">Update Hero Area</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.hero_index')}}';">Cancel</button>
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
