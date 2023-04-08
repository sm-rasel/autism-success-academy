@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Success Section</li>
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
                                <div class="card-body row">
                                    <div class="col-6">
                                        <h4 class=" font-size-18">Success Editing Section</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.success_index') }}" title="Success Home" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.success_update', ['id' => $success->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" class="form-control" value="{{$success->order}}" required/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-4">
                                            <label>Upload Success Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div class="mb-4">
                                                <input type="file" name="success_image" required class="form-control-file">
                                            </div>
                                            <img src="{{asset($success->success_image)}}" class="h-100 w-50" alt="">
                                            @if($errors->has('success_image'))
                                                <span class="error">{{ $errors->first('success_image') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-4">
                                            <label>Show Program Page Upper Section
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="checkbox" name="program_upper" {{ $success->program_upper ==1 ? 'checked': '' }}/>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Show Program Page Second
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="checkbox" name="program_second" {{ $success->program_second ==1 ? 'checked': '' }}/>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Show Program Page Third
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="checkbox" name="program_third" {{ $success->program_third ==1 ? 'checked': '' }}/>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Show Program Page Bottom Section
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="checkbox" name="program_bottom" {{ $success->program_bottom ==1 ? 'checked': '' }}/>
                                        </div>
                                        
                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Success Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.success_index')}}';">Cancel</button>
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
