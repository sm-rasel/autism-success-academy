@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="mb-0"></div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">FAQ Editing Section</li>
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
                                        <h4 class=" font-size-18">FAQ Editing Section</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.faq_index') }}" class="btn btn-outline-warning btn-lg">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <form class="custom-validation" action="{{ route('admin.faq_update', ['id' => $faq->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Question</label>
                                            <textarea name="question" class="form-control" id="question" cols="10" rows="5">{{ $faq->question }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <textarea name="answer" class="form-control" id="question" cols="30" rows="10">{{ $faq->answer }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>FAQ Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" name="order" value="{{$faq->order}}" class="form-control" required placeholder="Please Type a Order Number"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update FAQ</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.faq_index')}}';">Cancel</button>
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


