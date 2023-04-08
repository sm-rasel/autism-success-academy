@extends('layouts.admin.master')

@section('title')
    Proven Section Edit
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Proven Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Edit Proven Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.proven_section_update', ['id' => $proven->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="title" value="{{ $proven->title }}" placeholder="Type Proven Section Title"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_one" class="form-control" id="" cols="10" rows="5" required placeholder="Type Description One">{{ $proven->shot_description_one }}</textarea>
                                            @if($errors->has('shot_description_one'))
                                                <span class="error">{{ $errors->first('shot_description_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_two" class="form-control" id="" cols="10" rows="10" required placeholder="Type Description Two">{{ $proven->shot_description_two }}</textarea>
                                            @if($errors->has('shot_description_two'))
                                                <span class="error">{{ $errors->first('shot_description_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Three
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_three" class="form-control" id="" cols="10" rows="10" required placeholder="Type Description Three">{{ $proven->shot_description_three }}</textarea>
                                            @if($errors->has('shot_description_three'))
                                                <span class="error">{{ $errors->first('shot_description_three') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Four
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_four" class="form-control" id="" cols="10" rows="10" required placeholder="Type Description Four">{{ $proven->shot_description_four }}</textarea>
                                            @if($errors->has('shot_description_four'))
                                                <span class="error">{{ $errors->first('shot_description_four') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Five
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_five" class="form-control" id="" cols="10" rows="10" required placeholder="Type Description Five">{{ $proven->shot_description_five }}</textarea>
                                            @if($errors->has('shot_description_five'))
                                                <span class="error">{{ $errors->first('shot_description_five') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div>
                                                <input type="file" name="proven_image" class="form-control-file"/>
                                            </div>
                                            <img class="mt-4 h-25 w-25" src="{{asset( $proven->proven_image )}}" alt="Proven Section Image">
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Proven Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.proven_section_index')}}';">Cancel</button>
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
