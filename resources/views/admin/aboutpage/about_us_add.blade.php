@extends('layouts.admin.master')

@section('title')
    About Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">About Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.about_us_store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>About Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="about_title" required class="form-control" placeholder="Type About Title"/>
                                            @if($errors->has('about_title'))
                                                <span class="error">{{ $errors->first('about_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>About Heading
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="about_heading" required class="form-control" placeholder="Type About Heading"/>
                                            @if($errors->has('about_heading'))
                                                <span class="error">{{ $errors->first('about_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label><strong>About Description <span class="text-danger ml-1">*</span></strong></label>
                                            <textarea class="summernote" name="about_description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>About Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" required class="form-control" placeholder="Type About Order Number"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>About Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="file" name="about_image" required class="form-control-file"/>
                                                @if($errors->has('about_image'))
                                                    <span class="error">{{ $errors->first('about_image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Creat New About Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.about_index')}}';">Cancel</button>
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
