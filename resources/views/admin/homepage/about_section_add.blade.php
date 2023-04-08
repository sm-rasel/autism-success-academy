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
                                    <form class="custom-validation" action="{{route('admin.about_store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="name" placeholder="Type Name"/>
                                            @if($errors->has('name'))
                                                <span class="error">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Heading One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="heading_one" placeholder="Type Header One"/>
                                            @if($errors->has('heading_one'))
                                                <span class="error">{{ $errors->first('heading_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Heading Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="heading_two" placeholder="Type Header Two"/>
                                            @if($errors->has('heading_two'))
                                                <span class="error">{{ $errors->first('heading_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <textarea name="about_one" required class="form-control" rows="5" placeholder="About Us Description One"></textarea>
                                            </div>
                                            @if($errors->has('about_one'))
                                                <span class="about_one">{{ $errors->first('about_four') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <textarea name="about_two" required class="form-control" rows="5" placeholder="About Us Description Two"></textarea>
                                            </div>
                                            @if($errors->has('about_two'))
                                                <span class="about_two">{{ $errors->first('about_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info Three</label>
                                            <div>
                                                <textarea name="about_three" class="form-control" rows="5" placeholder="About Us Description Three"></textarea>
                                            </div>
                                            @if($errors->has('about_three'))
                                                <span class="about_three">{{ $errors->first('about_three') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info Four</label>
                                            <div>
                                                <textarea name="about_four" class="form-control" rows="5" placeholder="About Us Description Four"></textarea>
                                            </div>
                                            @if($errors->has('about_four'))
                                                <span class="about_four">{{ $errors->first('about_four') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info Five</label>
                                            <div>
                                                <textarea name="about_five" class="form-control" rows="5" placeholder="About Us Description Five"></textarea>
                                            </div>
                                            @if($errors->has('about_five'))
                                                <span class="about_five">{{ $errors->first('about_five') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Short About Us Info Six</label>
                                            <div>
                                                <textarea name="about_six" class="form-control" rows="5" placeholder="About Us Description Six"></textarea>
                                            </div>
                                            @if($errors->has('about_six'))
                                                <span class="about_six">{{ $errors->first('about_six') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Go Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="go_text" placeholder="Type Go Text"/>
                                            @if($errors->has('go_text'))
                                                <span class="error">{{ $errors->first('go_text') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>About Dr T. Image
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
