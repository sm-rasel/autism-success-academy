@extends('layouts.website.master')
@section('content')
    <!-- Upper Two image -->
    <section class="section-padding pb-0">
        <div class="container-fluid">
            <div class="container">
                <div class="card mb-4">
                    <div class="row">
                        @foreach($medias as $key => $media)
                            @if($key == 0)
                            <div class="col-md-6 col-12 mb-md-0 col-lg-6 col-sm-12 mb-4">
                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning bd-red testimonial-btn" onclick="window.location.href='{{ route('pages.programs') }}'">
                                        Click here
                                    </button>
                                </div>
                            @else
                            <div class="col-md-6 col-12 mb-md-0 col-lg-6 col-sm-12 mb-0">
                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning bd-red testimonial-btn2" data-bs-target="_blank" onclick="window.open('https://www.youtube.com/playlist?list=PLk_Mx05jfxAswrE1m9ImmPm1ZNN7kNrmU', '_blank')">
                                        click here
                                    </button>
                                </div>
                            @endif
                                <img src="{{asset($media->media_image)}}" class="img-fluid w-100" alt="Testimonial Image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Upper Two image -->
    <!-- Slider start -->
    <section class="section-padding pt-md-5" id="review" style="background-color: pink;">
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12 mb-md-5 mb-2">
                    <h2 class="text-bold text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">Want To Be The Next Success Story?</h2>
                    <h5 class="text-center" data-aos="zoom-in">CATCH WHAT OUR STUDENTS HAVE TO SAY ABOUT OUR PROGRAMS!!</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($successes as $key => $success)
                            @if($key == 0)
                            <div class="carousel-item active">
                            @else
                            <div class="carousel-item">
                            @endif
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img src="{{ asset($success->success_image) }}" class="d-block" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
