@extends('layouts.website.master')
@section('content')
    <!-- About Us Start -->
    <section class="section-padding pb-3 " style="background: #F3C1BA;" id="livevideo">
        <div class="container pb-lg-5 mt-5">
            <div class="card" style="background: #fff">
                <div class="row">
                    <h2 class="m-4 heading_color" style="text-align: center;font-family: 'Dancing Script', cursive" data-aos="fade-up">{{'Meet Your Success Team'}}</h2>
                </div>
                @foreach ($about_us as $about)
                    @if ($loop->iteration % 2 == 0)
                    <div class="row" style="padding: 2%">
                        <div class="col-md-3 col-lg-3 col-12 mt-3 mb-lg-5 text-center" style="">
                            <img data-aos="fade-up" class="aboutImage" src="{{ asset($about->about_image) }}" alt="bg-pic">
                        </div>
                        <div class="col-md-9 col-lg-9 col-12 live_text">
                            <h2 class="mb-3 heading_color" style="text-align: right;font-family: 'Dancing Script', cursive" data-aos="fade-up">{{$about->about_title}}</h2>
                            <h5 class="mb-3" style="text-align: right;" data-aos="fade-up">{{$about->about_heading}}</h5>
                            <p data-aos="fade-up" style="text-align: right">
                                {!!$about->about_description!!}
                            </p>
                            <img data-aos="fade-up" src="{{ asset('images/about/about_back.png') }}" alt="" style="width: 95%;">
                        </div>
                    </div>
                    @else
                    <div class="row" style="padding: 2%">
                        <div class="col-md-9 col-lg-9 col-12 order-lg-first live_text">
                            <h2 class="mb-3 heading_color" style="text-align: right;font-family: 'Dancing Script', cursive" data-aos="fade-up">{{$about->about_title}}</h2>
                            <h5 class="mb-3" style="text-align: right;" data-aos="fade-up">{{$about->about_heading}}</h5>
                            <p data-aos="fade-up" style="text-align: right">
                                {!!$about->about_description!!}
                            </p>
                            <img data-aos="fade-up" src="{{ asset('images/about/about_back.png') }}" alt="" style="width: 95%;">
                        </div>
                        <div class="col-md-3 col-lg-3 col-12 mt-3 mb-lg-5 order-lg-last order-first text-center" style="">
                            <img data-aos="fade-up" class="aboutImage" src="{{ asset($about->about_image) }}" alt="bg-pic">
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- About Us Start -->
@endsection
