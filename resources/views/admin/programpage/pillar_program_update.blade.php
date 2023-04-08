@extends('layouts.admin.master')

@section('title')
    Pillar Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Pillar Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Pillar Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.pillar_program_section_update', ['id' => $pillar->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Pillar Name
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="title" value="{{ $pillar->title }}" placeholder="Type Pillar Title here"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Pillar Value
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" value="{{ $pillar->value_p }}" name="value_p" placeholder="Type Value here"/>
                                            @if($errors->has('value_p'))
                                                <span class="error">{{ $errors->first('value_p') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea class="form-control" name="description" cols="15" rows="10" required placeholder="Type Description here...">{{ $pillar->description }}</textarea>
                                            @if($errors->has('description'))
                                                <span class="error">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" value="{{ $pillar->order }}" class="form-control" required placeholder="Type Order"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Pillar Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.pillar_program_section_index')}}';">Cancel</button>
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
