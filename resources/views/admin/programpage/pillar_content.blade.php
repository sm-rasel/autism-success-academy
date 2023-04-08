@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Pillar Content Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Pillar Content Section</li>
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
                                    @if (!isset($pillar))
                                        <form class="custom-validation" action="{{ route('admin.pillar_content_store') }}" method="POST" enctype="multipart/form-data">
                                    @else
                                        <form class="custom-validation" action="{{ route('admin.pillar_content_store', ['id' => $pillar->id]) }}" method="POST" enctype="multipart/form-data">
                                    @endif
                                        @csrf
                                        @if (!isset($pillar))
                                            <div class="form-group">
                                                <label>Title
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="pillar_title" class="form-control" required placeholder="Please type Title..."/>
                                                @if($errors->has('pillar_title'))
                                                    <span class="error">{{ $errors->first('pillar_title') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" value="{{ $pillar->pillar_title }}" name="pillar_title" class="form-control" required placeholder="Please type Title..."/>
                                                @if($errors->has('pillar_title'))
                                                    <span class="error">{{ $errors->first('pillar_title') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($pillar))
                                            <div class="form-group">
                                                <label>Description
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="description" class="form-control" placeholder="Please type Description......" required/>
                                                @if($errors->has('description'))
                                                    <span class="error">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Description
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="description" value="{{ $pillar->description }}" class="form-control" placeholder="Please type Description......" required/>
                                                @if($errors->has('description'))
                                                    <span class="error">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($pillar))
                                            <div class="form-group">
                                                <label>Description Bottom
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="description_bottom" class="form-control" placeholder="Please type Description......" required/>
                                                @if($errors->has('description_bottom'))
                                                    <span class="error">{{ $errors->first('description_bottom') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Description Bottom
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="description_bottom" value="{{ $pillar->description_bottom }}" class="form-control" placeholder="Please type Description......" required/>
                                                @if($errors->has('description_bottom'))
                                                    <span class="error">{{ $errors->first('description_bottom') }}</span>
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


