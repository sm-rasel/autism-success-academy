@extends('layouts.admin.master')

@section('title')
    Programs Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Programs Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Programs Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.programs_update',['id' => $program->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Pillar Name
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $program->pillar_name }}" class="form-control" name="pillar_name" placeholder="Type Pillar Name"/>
                                            @if($errors->has('pillar_name'))
                                                <span class="error">{{ $errors->first('pillar_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Pillar Heading
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" required value="{{ $program->pillar_name }}" class="form-control" name="pillar_heading" placeholder="Type Pillar Heading"/>
                                            @if($errors->has('pillar_heading'))
                                                <span class="error">{{ $errors->first('pillar_heading') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Pillar Text
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <textarea name="pillar_text" required class="form-control" rows="5" placeholder="Pillar Text">{{ $program->pillar_text }}"</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pillar Url
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="url" name="pillar_link" value="{{ $program->pillar_link }}" class="form-control" required placeholder="Type Pillar Url"/>
                                            @if($errors->has('pillar_link'))
                                                <span class="error">{{ $errors->first('pillar_link') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" value="{{ $program->order }}" class="form-control" required placeholder="Type Order"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Pillar Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.programs_index')}}';">Cancel</button>
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
