@extends('layouts.website.master')
@section('content')
    <!-- Youtube Videos Area Start  -->
    <section class="section-padding pb-0" id="liveshow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4">
                    <h4 class="mb-3 text-center" data-aos="fade-in">Watch Our Live Videos</h4>
                </div>
                <div class="col-12 col-lg-6 col-md-6 mb-4">
                    <iframe width="100%" height="380px" src="{{ $lives[0]->youtube_link }}"></iframe>
                </div>
                <div class="col-12 col-lg-3 col-md-4 mb-4">
                    <iframe width="100%" height="185px%" src="{{ $lives[1]->youtube_link }}"></iframe>
                    <iframe width="100%" height="185px%" src="{{ $lives[3]->youtube_link }}"></iframe>
                </div>
                <div class="col-12 col-lg-3 col-md-4 mb-4">
                    <iframe width="100%" height="185px%" src="{{ $lives[2]->youtube_link }}"></iframe>
                    <iframe width="100%" height="185px%" src="{{ $lives[4]->youtube_link }}"></iframe>
                </div>
                @foreach ($lives as $key => $live)
                @if($key > 4)
                    <div class="col-12 col-lg-3 col-md-4 mb-4">
                        <iframe width="100%" height="100%" src="{{ $live->youtube_link }}"></iframe>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Youtube Videos On End  -->
@endsection
