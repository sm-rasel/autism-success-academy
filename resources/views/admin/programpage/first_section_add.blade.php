@extends('layouts.admin.master')

@section('title')
    First Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">First Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">First Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.first_section_store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="title" placeholder="Type First Section Title"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_one" class="form-control" id="" cols="15" rows="10" required placeholder="Type Description One"></textarea>
                                            @if($errors->has('shot_description_one'))
                                                <span class="error">{{ $errors->first('shot_description_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_two" class="form-control" id="" cols="15" rows="10" required placeholder="Type Description Two"></textarea>
                                            @if($errors->has('shot_description_two'))
                                                <span class="error">{{ $errors->first('shot_description_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="number" name="order" required class="form-control"/>
                                                @if($errors->has('order'))
                                                    <span class="error">{{ $errors->first('order') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Button Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="url" name="button_url" required class="form-control"/>
                                                @if($errors->has('button_url'))
                                                    <span class="error">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="file" name="first_image" required class="form-control-file"/>
                                                @if($errors->has('first_image'))
                                                    <span class="error">{{ $errors->first('first_image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Create New First Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.first_section_index')}}';">Cancel</button>
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
