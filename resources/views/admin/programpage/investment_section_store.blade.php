@extends('layouts.admin.master')

@section('title')
    Investment Section
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Investment Section</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Investment Section</li>
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
                                    <form class="custom-validation" action="{{route('admin.investment_section_store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Program Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea required class="form-control" name="program_title" cols="10" rows="2" placeholder="Type Title"></textarea>
                                            @if($errors->has('program_title'))
                                                <span class="error">{{ $errors->first('program_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Summery
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <textarea required class="form-control" name="summery" cols="10" rows="2" placeholder="Type Summery"></textarea>
                                            @if($errors->has('summery'))
                                                <span class="error">{{ $errors->first('summery') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Description <span class="text-danger ml-1">*</span></strong></label>
                                            <textarea class="summernote" name="description" placeholder="Type Description Here...."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Order
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="number" required class="form-control" name="order" placeholder="Type Order Number"/>
                                            @if($errors->has('order'))
                                                <span class="error">{{ $errors->first('order') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success w-md waves-effect waves-light mr-1">Creat New Investment Section</button>
                                                <button type="reset" class="btn btn-outline-danger w-md waves-effect" onclick="window.location.href ='{{route('admin.investment_section_index')}}';">Cancel</button>
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
