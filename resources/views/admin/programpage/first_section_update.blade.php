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
                        <li class="breadcrumb-item active">First Section Edit</li>
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
                                    <form class="custom-validation" action="{{ route('admin.first_section_update', ['id' => $first->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required class="form-control" name="title" value="{{ $first->title }}"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description One
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_one" class="form-control" id="" cols="15" rows="10" required placeholder="Type Description One">{{ $first->shot_description_one }}</textarea>
                                            @if($errors->has('shot_description_one'))
                                                <span class="error">{{ $errors->first('shot_description_one') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea name="shot_description_two" class="form-control" id="" cols="15" rows="10" required placeholder="Type Description Two">{{ $first->shot_description_two }}</textarea>
                                            @if($errors->has('shot_description_two'))
                                                <span class="error">{{ $errors->first('shot_description_two') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="number" value="{{ $first->order }}" name="order" required class="form-control"/>
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
                                                <input type="url" name="button_url" value="{{ $first->button_url }}" required class="form-control"/>
                                                @if($errors->has('button_url'))
                                                    <span class="error">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div>
                                                <input type="file" name="first_image" class="form-control-file"/>
                                            </div>
                                            <img class="mt-4 h-25 w-25" src="{{asset( $first->first_image )}}" alt="First Section Image">
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update First Section</button>
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
