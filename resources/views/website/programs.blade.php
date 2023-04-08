@extends('layouts.website.master')
@section('content')
    <!--1st Section -->
    <section class="d-block"m style="background: #FCECE9;" id="about">
        <div class="container-fluid">
            <div class="card card-normal">
                <div class="row">
                    <div class="col-lg-5 col-12 order-lg-first order-last">
                        <img style="height: 100%; width: 100%;" src="{{asset($first->first_image)}}" data-aos="zoom-in" class="img-fluid d-lg-block d-md-block" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 text-center" style="padding: 4%;margin:2%;">
                        <h2 class="heading_color pb-2" data-aos="fade-up" data-aos-delay="200">{{$first->title}}</h2>
                        <h4 class="pb-3 px-4 px-md-0" style="font-style: italic" data-aos="fade-up" data-aos-delay="400">{{$first->shot_description_one}}</h4>
                        <p class="px-3 px-md-0" style="font-size: 19px;" data-aos="fade-up" data-aos-delay="500">{{$first->shot_description_two}}</p>
                        <div class="mt-5 mt-md-5 pt-md-5 mb-3 text-center">
                            <button type="button" class="btn btn-warning bd-red px-5 px-md-5 py-md-2" style="font-size: 22px;" data-aos="fade-up" data-aos-delay="300">
                                <a href="{{$first->button_url}}" target="_blank">Talk to Us</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End 1st Section -->
    <!--The 5 pillar -->
    <section class="section-padding parallax-window" id="pricing-tables" data-parallax="scroll" data-image-src="{{asset('images/news/seen_back.jpg')}}" style="background: rgba(26,26,26,1);opacity: 0.7;">
        <div class="container">
            <div class="row timeline_padding justify-content-center">
                @foreach($pillars as $pillar)
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="program_head">{{ $pillar->piller_name }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Success Story Start  -->
    <section class="section-padding pt-0 mt-4" id="review">
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12 mb-2">
                    <h2 class="text-bold text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">Want To Be The Next Success Story?</h2>
                    <h5 class="text-center" data-aos="zoom-in">CATCH WHAT OUR STUDENTS HAVE TO SAY ABOUT OUR PROGRAMS!!</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($successes_upper as $key => $success)
                                @if($key == 0)
                                    <div class="carousel-item active">
                                        @else
                                            <div class="carousel-item">
                                                @endif
                                                <div class="card review-image">
                                                    <div class="img-wrapper" data-aos="fade-up">
                                                        <img src="{{ asset($success->success_image) }}" class="d-block" alt="">
                                                        <!--<a class="btn btn-sm btn-warning carousel-button" href="{{ route('pages.testimonials') }}">READ MORE</a>-->
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Success Story End  -->
    <!-- This is a Proven system  -->
    <section class="section-padding d-block" style="padding-top: 5%; padding-bottom: 4%; background: #FCECE9;">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg-12 col-md-12 px-3 px-md-0" style="margin: auto;">
                    <h2 class="mb-3 heading_color" style="text-transform: uppercase; font-style: italic; font-weight: 400;">{!! $proven->title !!}</h2>
                    <p style="font-size: 20px;" class="mb-3">{!! $proven->shot_description_one !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End This is a Proven system  -->
    <!-- Helping you system -->
    <section class="d-block mt-4 mt-md-0" id="system">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12 text-left mobile_padding" style="margin: auto;padding: 6%;">
                        <p class="px-3 px-md-0" style="font-size: 19px !important;" data-aos="fade-up" data-aos-delay="300">
                            <span style="font-weight: bold">{!! $proven->shot_description_two !!}</span>
                            <br>
                            <br>
                            <span>{!! $proven->shot_description_three !!}</span>
                            <br>
                            <br>
                            {!! $proven->shot_description_four !!}
                        </p>
                        <p class="px-3 px-md-0" style="font-size: 19px;" data-aos="fade-up" data-aos-delay="300">{!! $proven->shot_description_five !!}</p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <img style="height: 100%" src="{{asset($proven->proven_image)}}" data-aos="zoom-in" class="img-fluid d-lg-block d-md-block" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Helping you system end -->
    <!-- Program Section -->
    <section class="pb-md-5 pb-lg-5 pb-sm-3 pb-5" style="background-color: #FFEBE9;">
        <div class="container-fluid" >
            <div class="row justify-content-center">
                <div class="card col-lg-8 col-md-8 col-12 card-overflow">
                    <h2 class="mb-3 text-center heading_color">THIS PROGRAM IS FOR YOU, IF:</h2>
                    <div class="card-body card_inner" >
                        @php
                            $speed = 0;
                        @endphp
                        @foreach($programes as $program)
                            @php
                                $speed = $speed + 200;
                            @endphp
                        <div class="point_text" data-aos="fade-up" data-aos-delay={{$speed}}>
                            <div class="circle_image">
                                <img src="{{asset('images/4-arrow-right.png')}}" class="" alt="">
                            </div>
                            <div class="circle_text">
                                <p>{{$program->program_title}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Program Section -->
    <section class="section-padding d-block" style="padding-top: 5rem; padding-bottom: 3rem; background: #F4C2BB;">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg-12 col-md-12 px-3 px-md-3" style="margin: auto;">
                    <h2 class="mb-3">{!! $dream->heading !!}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Dream Section -->
    <section class="section-padding d-block" style="padding-top: 2%; padding-bottom: 2%; background: #FCECE9;">
        <div class="container-fluid" >
            <div class="card card-normal">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12 mt-4 imagine_content mobile_padding">
                        <div style="text-align: right;">
                            <h2 style="font-style: italic;" data-aos="fade-left" data-aos-delay="300">{!! $dream->shot_description_one !!}</h2>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-12 mt-3 px-xl-5 px-5">
                        <img src="{{asset($dream->dream_image)}}" data-aos="zoom-in" class="img-fluid d-lg-block d-md-block section-img" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 col-lg-8 col-md-8 col-sm-9 col-12">
                        <div class="text-center imagine_text px-4 px-sm-3 px-xl-4 px-md-4">
                            <h2 class="heading_color" data-aos="fade-up" data-aos-delay="300">{!! $dream->shot_description_two !!}</h2>
                            <p class="px-3" style="font-size: 22px; text-align: initial;" data-aos="fade-up" data-aos-delay="300"> {!! $dream->shot_description_three !!}</p>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="mt-5 mb-3 text-center">
                            <button type="button" class="btn btn-warning bd-red button-width" style=" text-transform: uppercase;" data-aos="fade-up" data-aos-delay="300" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                READ MORE/ LESS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Collapse of Read More -->
            <div class="collapse mt-4" id="collapseExample">
                <div class="container-fluid">
                    <div class="row collapse_padding">
                        <div class="col-2"></div>
                        <div class="col-md-8 col-12 col-sm-12">
                            <div>
                                <p>
                                    Motherhood itself is a vehicle for personal growth, of deeply connecting with our inner self because our children are a mirror of us.
                                </p>
                                <p>
                                    <span style="font-weight: bold;">Autism Transformation & Success (ATS)</span> is a life changing intensive designed specifically for autism mums who doesn’t accept that their non-verbal autism child is any less than neuroatypical kids and they just need the right guidance to become verbal, social, happy, healthy and successful.
                                </p>
                                <p>
                                    Our ELITES students & Success nerds are women who want more from life and motherhood and their inner self want to evolve into this modern mum who has life well balanced on her hands and she is calm and serene inside and outside <span style="font-weight: bold">while her child is growing, reaching their highest potentials!!</span>
                                </p>
                                <p><span class="text-white">Sounds Impossible…. Read on!</span></p>
                                <p>Our program takes a problem- </p>
                                <div style="padding-left: 5%; font-size: 17px;">
                                    <li><span style="font-weight: bold">That the medical system says</span> <span style="font-style: italic">“there is nothing to be done about”,</span></li>
                                    <li>That advocates say “we should sacrifice and keep calm even if our child’s quality of life is degrading worse because <span style="padding-left: 26px;">we are mom so we SHOULD become a MARTYR”,</span> </li>
                                    <li>That society says “she must have done some great sins/ is a loser mum etc that's why she got an abnormal/ autistic <span style="padding-left: 26px;">child”</span>-</li>
                                </div>
                                <p class="mt-3">
                                    <span style="font-weight: bold;">And teaches you how to turn it into a spectacular transformation</span> with ease and grace. We deeply understand your and your child’s needs by being a neurodiverse myself and an autism mum with a Medical Healthcare background. So we are solving and troubleshooting scientifically yet chemical-free. *******************
                                </p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dream Section -->
    <!-- Success Story Start  -->
    <section class="section-padding pt-0 mt-4" id="review">
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12 mb-2">
                    <h2 class="text-bold text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">Want To Be The Next Success Story?</h2>
                    <h5 class="text-center" data-aos="zoom-in">CATCH WHAT OUR STUDENTS HAVE TO SAY ABOUT OUR PROGRAMS!!</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($successes_second as $key => $success)
                                @if($key == 0)
                                <div class="carousel-item active">
                                @else
                                <div class="carousel-item">
                                @endif
                                    <div class="card review-image">
                                        <div class="img-wrapper" data-aos="fade-up">
                                            <img src="{{ asset($success->success_image) }}" class="d-block" alt="">
                                            <!--<a class="btn btn-sm btn-warning carousel-button" href="{{ route('pages.testimonials') }}">READ MORE</a>-->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Imagine Section -->
    <section class="section-padding d-block" style="padding-top: 2%; padding-bottom: 2%; background: #F3C1BA;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-12 mt-3 p-5 p-md-0 float-right text-right" style="">
                    <img src="{{asset($imagine_m->imagine_image)}}" data-aos="zoom-in" class="img-fluid d-lg-block mt-md-4 d-md-block section-img-1" alt="">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-12 px-5 px-sm-3 px-md-0 justify-content-end float-right">
                    <div class="card_inner py-xl-5" style="">
                        <h3 class="heading_color" style="text-transform: uppercase; font-style: italic;">{!! $imagine_m->imagine_title !!}</h3>
                        <hr style="border: 1px solid black;">
                        @php
                            $speed = 0;
                        @endphp
                        @foreach($imagines as $imagine)
                            @php
                                $speed = $speed + 200;
                            @endphp
                        <div class="point_text pt-md-3 pt-2" data-aos="fade-up" data-aos-delay="{{$speed}}">
                            <div class="circle_image">
                                <img src="{{asset('images/4-arrow-right.png')}}" class="" alt="">
                            </div>
                            <div class="circle_text">
                                <p>{!! $imagine->imagine_content !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="text-center imagine_text">
                        <h2 data-aos="fade-up" data-aos-delay="300">{!! $imagine_m->imagine_title_two !!}</h2>
                        <p style="font-size: 23px;" data-aos="fade-up" data-aos-delay="400">{!! $imagine_m->imagine_title_three !!}</p>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </section>
    <!-- Imagine Section End -->
    <!-- How It Works -->
    <section class="section-padding pb-5" id="pricing-tables" style="background-color: #FCECE9; padding-top: 3%;">
        <div class="container" style="padding-top: 1% !important;">
            <div class="row timeline_padding">
                <div class="col-12 text-center py-3 py-md-0">
                    <h2 class="mb-3 heading_color" style="text-transform: uppercase; font-style: italic;">How It Works</h2>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @php
                    $speed = 0;
                @endphp
                @foreach($diplomas as $diploma)
                    @php
                        $speed = $speed +200;
                    @endphp
                <div class="col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="{{$speed}}" style="margin: 2%; border: 1px solid #ebd5a7;">
                    <div class="single-table text-center pb-4 pb-md-0">
                        <div class="plan-header mb-md-3">
                            <h3 class="program_head heading_color" style="font-weight: bold; font-size: 25px !important;">{!! $diploma->title !!}</h3>
                            <hr class="bg-danger">
                            <p>{!! $diploma->description_one !!}</p>
                            <p style="font-weight: bold; font-size: 20px;">{!! $diploma->course_value_one !!}</p>
                            <p style="justify-content: center;">{!! $diploma->description_two !!}</p>
                            <p style="font-weight: bold; font-size: 20px;">{!! $diploma->course_value_two !!}</p>
                            <p class="card m-auto p-2 font-size-20 value-b">{!! $diploma->total_value !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-5 mt-md-5 pt-md-5 mb-3 text-center">
                <button type="button" class="btn btn-warning bd-red px-5 px-md-5 py-md-2" style="font-size: 22px;" data-aos="fade-up" data-aos-delay="600">
                    <a href="{{$end->button_url}}">{!! $end->button_name !!}</a>
                </button>
            </div>
        </div>
    </section>
    <!-- End How It Works -->
    <!-- By The End Section -->
    <section class="section-padding pb-0 pt-0 d-block mb-4 mb-md-3" style="background-color: #FCECE9;">
        <div class="container-fluid">
            <div class="row parallax-window" data-parallax="scroll">
                <div class="container">
                    <div class="mx-5m pt-5">
                        <h2 class="text-center heading_color px-md-5 px-lg-5 px-xl-5 px-4 pb-3 pb-md-3" style="font-style: italic;">
                            {!! $end->end_title !!}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End By The End Section -->
    <!-- 7 Achieve Section -->
    <section class="section-padding pb-5" id="pricing-tables" style="padding-top: 3%; background-color: #fff;">
        <div class="container card pb-5 pb-md-3">
            <div class="row timeline_padding">
                <div class="col-12 text-center mt-4 m-md-5">
                    <h3 style="font-weight: bold;" class="text-dark">What You and Your Child Will Achieve :</h3>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @foreach($achieves as $achieve)
                <div class="col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="300" style="margin: 2%; border: 1px solid #ebd5a7; background-color: #FCECE9;">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="program_head heading_color" style="font-weight: bold;">{!! $achieve->title !!}</h3>
                            <p>{!! $achieve->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End 7 Achieve Section -->
    <!-- Success Story Start  -->
    <section class="section-padding pt-0 mt-4" id="review" >
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12 mb-2">
                    <h2 class="text-bold text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">Want To Be The Next Success Story?</h2>
                    <h5 class="text-center" data-aos="zoom-in">CATCH WHAT OUR STUDENTS HAVE TO SAY ABOUT OUR PROGRAMS!!</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($successes_third as $key => $success)
                                @if($key == 0)
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                        <div class="card review-image">
                                            <div class="img-wrapper" data-aos="fade-up">
                                                <img src="{{ asset($success->success_image) }}" class="d-block" alt="">
                                                <!--<a class="btn btn-sm btn-warning carousel-button" href="{{ route('pages.testimonials') }}">READ MORE</a>-->
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Success Curriculum -->
    <section class="section-padding pb-5" id="pricing-tables" style="background-color: #FCECE9; padding-top: 3%;">
        <div class="container" style="padding-top: 1% !important;">
            <div class="row timeline_padding">
                <div class="col-12 col-md-12 col-lg-12 col-sm-12 text-center">
                    <h4 class="mb-md-4" data-aos="fade-in" data-aos-delay="300" style="font-weight: bold;">{{$pillar_c->pillar_title}}</h4>
                    <p class="mb-md-4" data-aos="fade-up" data-aos-delay="300" style="font-style: italic; font-size: 19px !important;">{{$pillar_c->description}}</p>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @php
                    $speed = 0;
                @endphp
                @foreach($pillar_p as $pillar)
                    @php
                        $speed = $speed + 200;
                    @endphp
                <div class="col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="{{$speed}}" style="margin: 2%; border: 1px solid #ebd5a7;">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="program_head heading_color" style="font-weight: bold;">{!! $pillar->title !!}</h3>
                            <p style="font-weight: bold;">{!! $pillar->value_p !!}</p>
                            <p>{!! $pillar->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row timeline_padding justify-content-center pt-4 pt-md-0">
                <div class="col-12">
                    <h3 class="text-center text-danger" data-aos="fade-up">{{$pillar_c->description_bottom}}</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- End Success Curriculum -->
    <!-- Bonus Section -->
    <section class="section-padding pb-5 " id="pricing-tables" style="background-image: url('{{asset('images/news/bg-image.jpeg')}}'); background-size: cover; padding-top: 3%;">
        <div class="container">
            <div class="row timeline_padding pb-4 pb-md-0">
                <div class="col-12 text-center mb-md-4 mb-sm-2">
                    <h4 data-aos="fade-up" data-aos-delay="300" style="font-weight: bold;">Bonus Masterclasses (Brand New Classes Every Month!)</h4>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @php
                    $speed = 0;
                @endphp
                @foreach($bonuses as $bonus)
                    @php
                        $speed = $speed + 200;
                    @endphp
                <div class="col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="{{$speed}}" style="margin: 2%; border: 1px solid #ebd5a7;">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="heading_color" style="font-weight: bold; font-size: 25px !important;">{!! $bonus->title !!}</h3>
                            <p style="font-weight: bold;">{!! $bonus->values !!}</p>
                            <p>{!! $bonus->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Bonus Section -->
    <!-- Course Outline -->
    <section class="section-padding pb-5" id="pricing-tables" style="background-color: #FCECE9; padding-top: 3%;">
        <div class="container" style="padding-top: 1% !important;">
            <div class="row timeline_padding">
                <div class="col-12 text-center">
                    <h2 class="mb-3 heading_color" data-aos="fade-in" data-aos-delay="300" style="text-transform: uppercase; font-style: italic; font-weight: 400;">Your Investment Devine Parent?</h2>
                    <p data-aos="fade-up" data-aos-delay="300">So Dear Parent here is a summary of the value that you get and the Real nominal investment that you will need to make </p>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @php
                    $timer = 300;
                @endphp
                @foreach($investments as $investment)
                    @php
                        $timer = $timer + 100;
                    @endphp
                <div class="col-md-3 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="{{$timer}}" style="margin: 2%; border: 1px solid #ebd5a7;">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="program_head heading_color" style="font-weight: bold;">{{ $investment->program_title }}</h3>
                            <span class="text-dark">{{ $investment->summery }}</span>
                            <div>
                                {!! $investment->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-5 mt-md-5 pt-md-3 mb-3 text-center">
                <button type="button" class="btn btn-warning bd-red px-5 px-md-5 py-md-2" style="font-size: 22px;" data-aos="fade-in" data-aos-delay="600" onclick="window.open('https://docs.google.com/forms/d/e/1FAIpQLScVxZ50sVKjEu-dGjcQZ7zPj1nHMs2ZtwnMlCzSPslexb530Q/viewform', '_blank')">
                    Lets Discuss More
                </button>
            </div>
        </div>
    </section>
    <!-- End Course Outline -->
    <!-- Start Payment Slots -->
    <section class="section-padding pb-5" id="pricing-tables" style="background-color: #FCECE9; padding-top: 3%;">
        <div class="container-fluid" style="padding-top: 1% !important;">
            <div class="row timeline_padding">
                <div class="col-12 text-center">
                    <h2 class="mb-3 mb-md-4 heading_color" data-aos="fade-in" data-aos-delay="300" style="font-style: italic; font-weight: 400;">Let's Dive Into The Payment Plans !</h2>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                @php
                    $speed = 0;
                @endphp
                @foreach($payments as $payment)
                    @php
                        $speed = $speed + 200;
                    @endphp
                <div class="col-md-3 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="{{$speed}}" style="border: 1px solid #ebd5a7;">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3 class="program_head heading_color mb-4" style="font-weight: bold;">{!! $payment->title !!}</h3>
                            <div class="card py-3 py-md-3 mb-4 px-5 px-md-4" style="margin: auto; height: 300px;">
                                <p style="margin: auto;text-align: center;">{!! $payment->description_one !!}</p>
                            </div>
                            <div class="card p-3 p-md-3 mb-4" style="margin: auto;min-height: 112px;">
                                <p style="margin: auto;text-align: center;">{!! $payment->description_two !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Payment -->
    <!-- Success Story Start  -->
    <section class="section-padding pt-0 mt-4" id="review">
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12 mb-2">
                    <h2 class="text-bold text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">Want To Be The Next Success Story?</h2>
                    <h5 class="text-center" data-aos="zoom-in">CATCH WHAT OUR STUDENTS HAVE TO SAY ABOUT OUR PROGRAMS!!</h5>
                </div>
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($successes_bottom as $key => $success)
                                @if($key == 0)
                                    <div class="carousel-item active">
                                        @else
                                            <div class="carousel-item">
                                                @endif
                                                <div class="card review-image">
                                                    <div class="img-wrapper" data-aos="fade-up">
                                                        <img src="{{ asset($success->success_image) }}" class="d-block" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Talk Section -->
    <section class="section-padding d-block" style="padding-top: 5rem; padding-bottom: 3rem; background: #FCECE9;">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg-12 col-md-12 px-4 px-md-0" style="margin: auto;">
                    <h2 class="mb-3 heading_color" style="text-transform: uppercase; font-style: italic;">
                        {!! $discussion_c->heading !!}
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Talk Section -->
    <!-- This is Who Section -->
    <section class="section-padding d-block pb-4 pb-md-0" style="padding-top: 2%; padding-bottom: 2%; background: #F3C1BA;">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-5 col-12 mt-3 float-right text-right px-5 px-md-0">
                    <img src="{{asset($discussion_c->discussion_image)}}" data-aos="zoom-in" class="img-fluid d-lg-block d-md-block section-img-1" alt="">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-12 pt-3 justify-content-end float-right">
                    <div style="padding-left: 17%; padding-right: 10%;">
                        <p data-aos="fade-right" data-aos-delay="300" style="font-weight: bold; font-style: italic; font-size: 18px;">{!! $discussion_c->title_one !!}</p>
                        <p data-aos="fade-right" data-aos-delay="400" class="mt-2 pb-2" style="font-weight: bold; font-style: italic; font-size: 18px;">{!! $discussion_c->title_two !!}</p>
                        <hr data-aos="fade-right" data-aos-delay="500" style="border: 1px solid black;">
                        <h2 data-aos="fade-right" data-aos-delay="600" class="mb-2 pt-2 pb-2 heading_color">{!! $discussion_c->title_three !!}</h2>
                        @php
                            $speed = 0;
                        @endphp
                        @foreach($discussions as $discussion)
                            @php
                                $speed = $speed + 200;
                            @endphp
                        <div class="point_text" data-aos="fade-up" data-aos-delay="{{$speed}}">
                            <div class="circle_image">
                                <img src="{{asset('images/4-arrow-right.png')}}" class="" alt="">
                            </div>
                            <div class="circle_text">
                                <p>{!! $discussion->discussion_content !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center py-xl-5">
                        <button type="button" class="btn btn-warning bd-red bg-button-width py-md-3" style="text-transform: uppercase; font-weight: bolder; font-size: 19px;" data-aos="fade-in" data-aos-delay="600">
                            <a href="{{$discussion_c->btn_url}}">APPLY FOR A CLARITY & RECLAIM CALL TO SEE IF WE ARE FIT TO WORK WITH EACH OTHER</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End This is Who Section -->
    <!-- Success Story -->
    <section class="section-padding d-block" style="background-color: #FCECE9;">
        <div class="container-fluid" >
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="text-center px-4 px-md-0">
                            <h3 class="lh-1 pb-2 pb-md-0" style="font-weight: bold;">
                                Your Life Can Transform
                                Because Of What You Learn In
                            </h3>
                            <h2 style="font-style: italic;">“Autism Transformation & Success (ATS)”</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Success Story -->
    <!-- Question Section -->
    <section class="section-padding d-block" style="padding-top: 5%; padding-bottom: 3%; background: #F3C1BA;">
        <div class="container-fluid">
            <div class="container">
                <div class="row text-center pb-5">
                    <div class="col-12 col-lg-12 col-md-12" style="padding: 0 4%;">
                        <h2 class="heading_color" style="text-transform: uppercase;">
                            STILL HAVE QUESTIONS IF AUTISM TRANSFORMATION & SUCCESS IS THE RIGHT CHOICE FOR YOU?
                        </h2>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @php
                        $timer = 300;
                    @endphp
                    @foreach ($faqs as $key =>  $faq)
                        @php
                            $timer = $timer + 50;
                        @endphp
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ $timer }}">
                            <h2 class="accordion-header" id="flush-heading-{{$key}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $key }}" aria-expanded="false" aria-controls="flush-collapse-{{$key}}">
                                    <span class="q_button_text">{{ $faq->question }}</span>
                                </button>
                            </h2>
                            <div id="flush-collapse-{{$key}}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{$key}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{!! $faq->answer !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-fluid pb-4 mt-5" data-aos="fade-up" data-aos-delay="800">
                <div class="row">
                    <div class="text-center px-3 py-xl-5">
                        <button type="button" class="btn btn-warning bd-red bg-button-width" style="text-transform: uppercase; font-weight: bold;" data-aos="fade-in" data-aos-delay="600">
                            <a href="{{$discussion_c->btn_url}}" target="_blank">APPLY FOR A CLARITY & RECLAIM CALL TO SEE IF WE ARE FIT TO WORK WITH EACH OTHER</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Question Section -->
    <!-- Community Section -->
    <section class="section-padding d-block" style="background-image: url('{{ asset('images/news/bg-image-1.jpg')}}');background-size: cover; padding-top: 3%;">
        <div class="container-fluid" >
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="text-center pb-5 col-lg-12 col-12" style="padding: 0 25%;">
                            <h2 class="px-xl-5" style="font-weight: bold;">
                                Our Community + Coaching Are Designed To Get You Results
                            </h2>
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 col-md-8 col-sm-9 col-12 mt-3 text-center mb-lg-5 pb-5" data-aos="zoom-in" data-aos-delay="300">
                            <iframe class="m-auto" style="width: 80%; height: 182%; position: relative;" src="{{$meet->youtube_url}}"></iframe>
                        </div>
                        <div class="col-lg-2 col-md-2"></div>
                    </div>
                </div>
                <div class="text-center pt-md-5 pt-sm-5 pt-5" data-aos="fade-up" data-aos-delay="330">
                    <h4 class="pt-5 pt-md-3 pt-sm-5 pb-2 heading_color" style="font-weight: bold; font-style: italic;">If you are ready to learn more and Join us…. </h4>
                </div>
            </div>
            <div class="container-fluid mt-2" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <div class="text-center">
                        <button type="button" class="btn btn-warning bd-red bg-button-width py-3" style="text-transform: uppercase; font-weight: bold; font-size: 19px;">
                            <a href="{{$discussion_c->btn_url}}" target="_blank">APPLY FOR A CLARITY & RECLAIM CALL TO SEE IF WE ARE FIT TO WORK WITH EACH OTHER</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Community Section -->

@endsection

@section('customCss')
    <style>
        .circle_image {
            float: left;
            width: 5%;
        }
        .circle_image img {
            width:85%;
            margin-top: 15%;
        }
        .circle_text {
            width: 95%;
            float: left;
        }
        .circle_text p {
            margin-left: 5px;
        }
        .imagine_content {
            padding-left: 12%;
        }
        .imagine_text {
            margin-top: 55px;
        }
        .imagine_text p {
            font-style: italic;
            padding-top: 25px;
        }
        .imagine_content h4 {
            padding: 0 6% 0;
        }
        .q_button_text {
            font-weight: bold;
        }

    </style>
@endsection
