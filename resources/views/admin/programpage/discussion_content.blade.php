@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Discussion Content Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Discussion Content Section</li>
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
                                    @if (!isset($discussions))
                                        <form class="custom-validation" action="{{ route('admin.discussion_content_section_store') }}" method="POST" enctype="multipart/form-data">
                                    @else
                                        <form class="custom-validation" action="{{ route('admin.discussion_content_section_store', ['id' => $discussions->id]) }}" method="POST" enctype="multipart/form-data">
                                    @endif
                                        @csrf
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label>Heading
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" name="heading" class="form-control" required placeholder="Please type Title..."/>
                                                @if($errors->has('heading'))
                                                    <span class="error">{{ $errors->first('heading') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Heading
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="text" value="{{ $discussions->heading }}" name="heading" class="form-control" required placeholder="Please type Heading..."/>
                                                @if($errors->has('heading'))
                                                    <span class="error">{{ $errors->first('heading') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label> Title One
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_one" class="form-control" required cols="15" rows="10" placeholder="Please type Title one..."></textarea>
                                                @if($errors->has('title_one'))
                                                    <span class="error">{{ $errors->first('title_one') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title Two
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_one" class="form-control" required cols="15" rows="10" placeholder="Please type Title one...">{{ $discussions->title_one }}</textarea>
                                                @if($errors->has('title_one'))
                                                    <span class="error">{{ $errors->first('title_one') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label> Title Two
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_two" class="form-control" required cols="15" rows="10" placeholder="Please type Title two..."></textarea>
                                                @if($errors->has('title_two'))
                                                    <span class="error">{{ $errors->first('title_two') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title two
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_two" class="form-control" required cols="15" rows="10" placeholder="Please type Title two...">{{ $discussions->title_two }}</textarea>
                                                @if($errors->has('title_two'))
                                                    <span class="error">{{ $errors->first('title_two') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label> Title Three
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_three" class="form-control" required cols="15" rows="10" placeholder="Please type Title Three..."></textarea>
                                                @if($errors->has('title_three'))
                                                    <span class="error">{{ $errors->first('title_three') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title Three
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <textarea name="title_three" class="form-control" required cols="15" rows="10" placeholder="Please type Title Three...">{{ $discussions->title_three }}</textarea>
                                                @if($errors->has('title_three'))
                                                    <span class="error">{{ $errors->first('title_three') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label> Button Url
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="btn_url" class="form-control" required placeholder="Please type Url..."/>
                                                @if($errors->has('btn_url'))
                                                    <span class="error">{{ $errors->first('btn_url') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label>Title Three
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="url" name="btn_url" value="{{ $discussions->btn_url }}" class="form-control" required placeholder="Please type Url..."/>
                                                @if($errors->has('btn_url'))
                                                    <span class="error">{{ $errors->first('btn_url') }}</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if (!isset($discussions))
                                            <div class="form-group">
                                                <label>Discussion Image
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="file" name="discussion_image" class="form-control-file" required/>
                                                @if($errors->has('discussion_image'))
                                                    <span class="error">{{ $errors->first('discussion_image') }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Discussion Image
                                                        <span class="text-danger ml-1">*</span>
                                                    </label>
                                                    <input type="file" name="discussion_image" class="form-control-file"/>
                                                    <img class="mt-4 h-25 w-25" src="{{asset( $discussions->discussion_image )}}" alt="Discussion Section Image">
                                                </div>
                                            </div>
                                        @endif
                                            <div class="form-group mb-0 justify-content-end">
                                                <div>
                                                    <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Discussion Content</button>
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


