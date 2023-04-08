@extends('layouts.admin.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Imagine Media Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page Settings</a></li>
                        <li class="breadcrumb-item active">Imagine Media Section</li>
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
                                    @if (!isset($imagine))
                                        <form class="custom-validation" action="{{ route('admin.imagine_media_section_store') }}" method="POST" enctype="multipart/form-data">
                                    @else
                                        <form class="custom-validation" action="{{ route('admin.imagine_media_section_store', ['id' => $imagine->id]) }}" method="POST" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                        @if (!isset($imagine))
                                        <div class="form-group">
                                            <label>Imagine Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="imagine_title" class="form-control" required placeholder="Please type Title..."/>
                                            @if($errors->has('imagine_title'))
                                                <span class="error">{{ $errors->first('imagine_title') }}</span>
                                            @endif
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>Imagine Title
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{ $imagine->imagine_title }}" name="imagine_title" class="form-control" required placeholder="Please type Title..."/>
                                            @if($errors->has('imagine_title'))
                                                <span class="error">{{ $errors->first('imagine_title') }}</span>
                                            @endif
                                        </div>
                                        @endif
                                        @if (!isset($imagine))
                                        <div class="form-group">
                                            <label> Title Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="imagine_title_two" class="form-control" required placeholder="Please type Title Two..."/>
                                            @if($errors->has('imagine_title_two'))
                                                <span class="error">{{ $errors->first('imagine_title_two') }}</span>
                                            @endif
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>Title Two
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{ $imagine->imagine_title_two }}" name="imagine_title_two" class="form-control" required placeholder="Please type Title Two..."/>
                                            @if($errors->has('imagine_title_two'))
                                                <span class="error">{{ $errors->first('imagine_title_two') }}</span>
                                            @endif
                                        </div>
                                        @endif
                                        @if (!isset($imagine))
                                        <div class="form-group">
                                            <label> Title Three
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" name="imagine_title_three" class="form-control" required placeholder="Please type Title Three..."/>
                                            @if($errors->has('imagine_title_three'))
                                                <span class="error">{{ $errors->first('imagine_title_three') }}</span>
                                            @endif
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>Title Three
                                                <span class="text-danger ml-1">*</span>
                                            </label>
                                            <input type="text" value="{{ $imagine->imagine_title_three }}" name="imagine_title_three" class="form-control" required placeholder="Please type Title Three..."/>
                                            @if($errors->has('imagine_title_three'))
                                                <span class="error">{{ $errors->first('imagine_title_three') }}</span>
                                            @endif
                                        </div>
                                        @endif
                                        @if (!isset($imagine))
                                            <div class="form-group">
                                                <label>Imagine Image
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="file" name="imagine_image" class="form-control-file" required/>
                                                @if($errors->has('imagine_image'))
                                                    <span class="error">{{ $errors->first('imagine_image') }}</span>
                                                @endif
                                            </div>
                                        @else
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Imagine Image
                                                    <span class="text-danger ml-1">*</span>
                                                </label>
                                                <input type="file" name="imagine_image" class="form-control-file"/>
                                            <img class="mt-4 h-25 w-25" src="{{asset( $imagine->imagine_image )}}" alt="Proven Section Image">
                                        </div>
                                        @endif
                                        <div class="form-group mb-0 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-outline-success waves-effect w-md px-5 mr-1">Update Imagine Media</button>
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


