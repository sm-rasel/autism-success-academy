@extends('layouts.admin.master')

@section('title')
    Blog Update
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Blog Update</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Blog Update</li>
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
                                    <form class="custom-validation" action="{{route('admin.blog_update',['slug' => $blog->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Blog Category
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <select id="category-dropdown" class="form-control" name="blog_category_id" value="{{ $blog->blog_category_id }}">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($categories as $category)
                                                    <option {{ ( $category->id == $blog->blog_category_id) ? 'selected' : '' }} value="{{$category->id}}">
                                                        {{$category->category_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{ $blog->title }}" required class="form-control" name="title" placeholder="Type Blog Title"/>
                                            @if($errors->has('title'))
                                                <span class="error">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Image
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <div>
                                                <input type="file" name="blog_image" value="{{ $blog->blog_image }}" required class="form-control-file"/>
                                                @if($errors->has('blog_image'))
                                                    <span class="error">{{ $errors->first('blog_image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Uploaded Image</label>
                                            <div>
                                                <img src="{{ asset($blog->blog_image) }}" class="img-fluid" style="width: 300px;" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Description <span class="text-danger ml-1">*</span></strong></label>
                                            <textarea class="summernote" name="description">{{ $blog->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">
                                                Is Featured
                                            </label>
                                            <input type="checkbox" name="is_featured" {{ $blog->is_featured==1 ? 'checked': '' }}/>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Update Blog</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.blog_index')}}';">Cancel</button>
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
