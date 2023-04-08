@extends('layouts.admin.master')

@section('title')
    Dream Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Dream Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Edit Dream Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.dream_section_update', ['id' => $dream->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Heading
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea required class="form-control" name="heading" cols="10" rows="10" placeholder="Type Heading">{{ $dream->heading }}</textarea>
                                            @if($errors->has('heading'))
                                                <span class="error">{{ $errors->first('heading') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_one" class="form-control" id="" cols="10" rows="10" required placeholder="Type Description One">{{ $dream->shot_description_one }}</textarea>
                                            @if($errors->has('shot_description_one'))
                                                <span class="error">{{ $errors->first('shot_description_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_two" class="form-control" id="" cols="10" rows="2" required placeholder="Type Description Two">{{ $dream->shot_description_two }}</textarea>
                                            @if($errors->has('shot_description_two'))
                                                <span class="error">{{ $errors->first('shot_description_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Three
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_three" class="form-control" id="" cols="10" rows="5" required placeholder="Type Description Three">{{ $dream->shot_description_three }}</textarea>
                                            @if($errors->has('shot_description_three'))
                                                <span class="error">{{ $errors->first('shot_description_three') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Button Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="button_url" value="{{ $dream->button_url }}" class="form-control" id="" required placeholder="Type Button Url">
                                            @if($errors->has('button_url'))
                                                <span class="error">{{ $errors->first('button_url') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="file" name="dream_image" class="form-control-file"/>
                                                @if($errors->has('dream_image'))
                                                    <span class="error">{{ $errors->first('dream_image') }}</span>
                                                @endif
                                            </div>
                                            <img class="mt-4 h-25 w-25" src="{{asset( $dream->dream_image )}}" alt="Dream Section Image">
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Dream Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.dream_section_index')}}';">Cancel</button>
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
