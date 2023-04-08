@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">End Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">End Section</li>
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
                                    @if (!isset($end))
                                        <form class="custom-validation" action="{{ route('admin.End_section_store') }}" method="POST" enctype="multipart/form-data">
                                    @else
                                        <form class="custom-validation" action="{{ route('admin.End_section_store', ['id' => $end->id]) }}" method="POST" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                        @if (!isset($end))
                                            <div class="form-group">
                                                <label>Title
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="end_title" class="form-control" required placeholder="Please type Title..."/>
                                                @if($errors->has('end_title'))
                                                    <span class="error">{{ $errors->first('end_title') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" value="{{ $end->end_title }}" name="end_title" class="form-control" required placeholder="Please type Title..."/>
                                                @if($errors->has('end_title'))
                                                    <span class="error">{{ $errors->first('end_title') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($end))
                                            <div class="form-group">
                                                <label>Button Name
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="button_name" class="form-control" placeholder="Please type Button text here......" required/>
                                                @if($errors->has('button_name'))
                                                    <span class="error">{{ $errors->first('button_name') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Button Name
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="button_name" value="{{ $end->button_name }}" class="form-control" placeholder="Please type Button text here......" required/>
                                                @if($errors->has('button_name'))
                                                    <span class="error">{{ $errors->first('button_name') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($end))
                                            <div class="form-group">
                                                <label>Button Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="button_url" class="form-control" placeholder="Please type Button url here......" required/>
                                                @if($errors->has('button_url'))
                                                    <span class="error">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Button Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="button_url" value="{{ $end->button_url }}" class="form-control" placeholder="Please type Button text here......" required/>
                                                @if($errors->has('button_url'))
                                                    <span class="error">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                            <div class="form-group mb-0 justify-content-end">
                                                <div>
                                                    <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update</button>
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


