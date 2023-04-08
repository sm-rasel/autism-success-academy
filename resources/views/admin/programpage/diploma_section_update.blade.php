@extends('layouts.admin.master')

@section('title')
    Diploma Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Diploma Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Diploma Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.diploma_section_update', ['id' => $diploma->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $diploma->title }}" class="form-control" name="title" placeholder="Type Diploma Title here"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="description_one" cols="15" rows="10" required placeholder="Type Description One here...">{{ $diploma->description_one }}</textarea>
                                            @if($errors->has('description_one'))
                                                <span class="error">{{ $errors->first('description_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Course Value
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="course_value_one" cols="5" rows="2" required placeholder="Type Course Value here...">{{ $diploma->course_value_one }}</textarea>
                                            @if($errors->has('course_value_one'))
                                                <span class="error">{{ $errors->first('course_value_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="description_two" cols="5" rows="10" required placeholder="Type Description Two here...">{{ $diploma->description_two }}</textarea>
                                            @if($errors->has('description_two'))
                                                <span class="error">{{ $errors->first('description_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Course Value
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="course_value_two" cols="5" rows="2" required placeholder="Type Course Value here...">{{ $diploma->course_value_two }}</textarea>
                                            @if($errors->has('course_value_two'))
                                                <span class="error">{{ $errors->first('course_value_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Total Value
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="total_value" cols="5" rows="2" required placeholder="Type Total Value here...">{{ $diploma->total_value }}</textarea>
                                            @if($errors->has('total_value'))
                                                <span class="error">{{ $errors->first('total_value') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" value="{{ $diploma->order }}" class="form-control" required placeholder="Type Order"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Diploma Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.diploma_section_index')}}';">Cancel</button>
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
