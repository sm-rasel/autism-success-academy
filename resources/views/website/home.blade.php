@extends('layouts.website.home-master')
@section('content')
     <!-- As Seen On Start  -->
    <section class="section-padding pb-0 pt-0" id="seenon" style="background-image: url('{{asset('images/news/seen_back.jpg')}}'); background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4">
                    <h4 class="mb-3 heading_color text-center" style="font-family: 'Dancing Script', cursive" data-aos="fade-in">As Seen ON</h4>
                </div>
                <div class="col-12 mb-4 mx-auto text-center aos-init aos-animate">
                    @php
                        $speed = 0;
                    @endphp
                    @foreach($as_seen as $seen)
                        @php
                        $speed = $speed + 200;
                        @endphp
                        <img src="{{ asset($seen->seen_image) }}" data-aos="zoom-in" data-aos-delay="{{$speed}}" class="img-fluid seen-image" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- As Seen On End  -->
    <!-- subscription Start -->
    <section class="section-padding d-block" style="background: #F3C1BA;" id="subscription-area">
        <div class="container">
            <div class="row card parallax-window text-center" style="background: #fff; box-shadow: 0px 12px 18px -6px rgb(0 0 0 / 30%)">
                <div class="col-lg-12 col-md-12 col-12" style="margin:auto">
                    <h5 style="margin: 10%" class="mb-4 mt-4 b-font justify-content-center text-center" data-aos="fade-up">YOUR <span class="text-primary"> FREE </span> GUIDE TO AUTISM DIET , DETOX, LIFESTYLE, PARENTING & PERSONAL DEVELOPMENT IS STRAIGHT TO YOUR INBOX EVERY WEEK.</h5>
                    <div style="max-height: 350px;display: block;overflow: hidden;">
                        <img src="{{ asset('images/gina_journaling.jpg') }}" alt="" class="img-fluid" style="width: 85%;height: auto;">
                    </div>
                    <h5 class="mt-4" style="font-style: italic">EVERY <span class="text-primary">TUESDAY & FRIDAY</span> YOU’LL GET THE FOLLOWING:</h5>
                    <ul class="text-primary" style="margin-left: 6%;margin-right: 6%;">
                        <li class="text-primary text-left" data-aos="fade-in" data-aos-delay="100">
                            <p style="text-align: left"><span class="text-primary" style="font-weight: bold">Must watch episodes: </span>Our LIVE show, guides, research and important links so that you don’t have to scour the internet until 3 am. (Your Nerding needs are met)</p>
                        </li>
                        <li class="text-primary" data-aos="fade-in" data-aos-delay="100">
                            <p style="text-align: left"><span class="text-primary" style="font-weight: bold">Bonus: </span>Turn your exhausted, dull days into one of energy, focus and productivity as an Autism mom by signing up for our You will receive our <span class="text-primary" style="font-weight: bold">21</span> days Autism Mum Detox Bonanza Mini Course. (You are the start of the success for your child)</p>
                        </li>
                        <li class="text-primary" data-aos="fade-in" data-aos-delay="100">
                            <p style="text-align: left"><span class="text-primary" style="font-weight: bold">Support: </span>Emotional health support, designing serenity for your life, behind the scenes of our epic life and those of our student wins (Inspiration Well for when you feel lost)</p>
                        </li>
                    </ul>
                    <a href="javascript:;" class="btn btn-warning bd-red signUp_btn" onclick="ml_webform_5826924('show')">SIGN UP HERE</a>
                    <h6 class="mt-2 mb-4" data-aos="fade-out" data-aos-delay="300">
                        <a href="whatsapp://tel:+1 (613) 410-2027" class="bi-whatsapp"><span style="margin-left: 5px">+1 (613) 410-2027</span></a>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription End -->
    <!-- Meet Dr T Start -->
    <section class="section-padding d-block" id="about" style="padding-top:5rem;padding-bottom:2rem;background: #fff;">
        <div class="container">
            <div class="card" style="background: #F3C1BA;">
                <div class="row about_dr">
                    <div class="col-lg-12 col-md-12 col-12" style="text-align: center;">
                        <img class="aboutImagehome mt-2" src="{{ asset($about->about_image) }}" data-aos="zoom-in" class="img-fluid d-none d-lg-block" alt="">
                        <img data-aos="fade-up" src="{{ asset('images/about/about_back.png') }}" alt="" style="width: 50%;display: block;text-align: center;margin: auto;height: 8%;">

                        <h5 style="font-family: 'Dancing Script', cursive;text-align: center;color: red;font-size: 30px !important;margin-bottom: 0;" data-aos="zoom-in">{{$about->name}}</h5>
                        <h5 class="m-0" data-aos="zoom-in">{{$about->heading_one.'. . .'}}</h5>
                        <h6 class="m-0 mb-2 text-center" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">{{$about->heading_two}}</h6>
                        <p class="text-center" data-aos="fade-up" data-aos-delay="300" style="width: 80%;text-align:center;margin: auto;">
                            {!!$about->about_one!!}{{$about->about_two}}
                        </p>
                        <p class="text-center mb-2" style="width: 80%;text-align:center;margin: auto;">
                            {{$about->about_three}}
                        </p>
                        <p class="m-0 pb-2 text-center">
                            {{$about->go_text}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Meet Dr T End -->
    <!-- Tuesday With Dr T Start  -->
    <section class="section-padding pb-3 " style="background: #FFEBE9;" id="livevideo">
        <div class="container pb-lg-5">
            <div class="card" style="background: #fff">
                <div class="row" style="padding: 2%">
                    <div class="col-lg-6 col-12 mt-3 mb-lg-5 text-center youtube_vid" style="">
                        <img class="visualimage" src="{{ $meet->youtube_image }}" alt="bg-pic" style="border: 15px solid #B41D16; position: relative; top:15%; width: 74%; height: 80%;">
                        <iframe class="visual-video mb-4 d-none" id="visualvideo" src="{{$meet->youtube_url}}" style="border: 15px solid #B41D16; position: relative; top:15%; width: 74%; height: 80%;"></iframe>
                        <a id="playvid">
                        <svg id="play" class="visual-svg" viewBox="0 0 163 163" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" ="0px"="">
                            <g fill="none">
                              <g transform="translate(2.000000, 2.000000)" stroke-width="4">
                              <path d="M10,80 C10,118.107648 40.8923523,149 79,149 L79,149 C117.107648,149 148,118.107648 148,80 C148,41.8923523 117.107648,11 79,11" id="lineOne" stroke="#dbbe8d"></path>
                              <path d="M105.9,74.4158594 L67.2,44.2158594 C63.5,41.3158594 58,43.9158594 58,48.7158594 L58,109.015859 C58,113.715859 63.4,116.415859 67.2,113.515859 L105.9,83.3158594 C108.8,81.1158594 108.8,76.6158594 105.9,74.4158594 L105.9,74.4158594 Z" id="triangle" stroke="#dbbe8d"></path>
                              <path d="M159,79.5 C159,35.5933624 123.406638,0 79.5,0 C35.5933624,0 0,35.5933624 0,79.5 C0,123.406638 35.5933624,159 79.5,159 L79.5,159" id="lineTwo" stroke="#dbbe8d"></path>
                              </g>
                            </g>
                          </svg>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 live_text mt-4">
                        <h2 class="mt-5 heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">{{$meet->header}}</h2>
                        <h5 class="mb-3" data-aos="fade-up">{{$meet->header_two}}</h5>
                        <p data-aos="fade-up" data-aos-delay="500" style="text-align: justify">
                            {{$meet->meet_text}}<br><br>
                            {{$meet->meet_text_two}}
                        </p>
                        <a class="btn btn-md btn-warning bd-red" data-aos="fade-right" href="{{$meet->button_url}}" role="button">{{$meet->button_text}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Start  -->
    <section class="news section-padding" style="background: #fff;" id="blog">
        <div class="container">
            <div class="row mobile_padding">
                <div class="col-12">
                    <h2 class="mb-3 heading_color" data-aos="fade-up" style="font-family: 'Dancing Script', cursive">Prefer Reading Your Info?</h2>
                    <h4 class="mb-5" style="text-align: left;" data-aos="fade-up">READ OUR BLOG</h4>
                </div>
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="news-thumb" data-aos="fade-up">
                        <div class="news-category">
                            <span>{{ $blogs[0]->blogCategory->category_name }}</span>
                        </div>
                        <a href="{{ route('pages.blog_details', ['slug' => $blogs[0]->slug]) }}" class="news-image-hover news-image-hover-warning">
                            <img src="{{ asset($blogs[0]->blog_image) }}" class="img-fluid large-news-image news-image" alt="">
                        </a>
                        <div class="news-text-info">
                            <h5 class="news-title">
                                <a href="{{ route('pages.blog_details', ['slug' => $blogs[0]->slug]) }}" class="news-title-link">{{ $blogs[0]->title }}</a>
                            </h5>

                            <div class="d-flex flex-wrap">
                                <span class="text-muted">{{ date('D-M-Y', strtotime($blogs[0]->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up" style="margin-bottom: 7%;">
                        <div class="news-top w-100">
                            <div class="news-category" style="width: 50%;top: 10%;">
                                <span>{{ $blogs[1]->blogCategory->category_name }}</span>
                            </div>
                            <a href="{{ route('pages.blog_details', ['slug' => $blogs[1]->slug]) }}" class="news-image-hover news-image-hover-primary">
                                <img src="{{ asset($blogs[1]->blog_image) }}" class="img-fluid news-image" alt="">
                            </a>
                        </div>

                        <div class="news-bottom w-100">
                            <div class="news-text-info">
                                <h5 class="news-title">
                                    <a href="{{ route('pages.blog_details', ['slug' => $blogs[1]->slug]) }}" class="news-title-link">{{ $blogs[1]->title }}</a>
                                </h5>

                                <div class="d-flex flex-wrap">
                                    <span class="text-muted">{{ date('D-M-Y', strtotime($blogs[1]->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                        <div class="news-top w-100" data-aos="fade-up">
                            <div class="news-category" style="top: 10%;">
                                <span>{{ $blogs[2]->blogCategory->category_name }}</span>
                            </div>
                            <a href="{{ route('pages.blog_details', ['slug' => $blogs[2]->slug]) }}" class="news-image-hover news-image-hover-success">
                                <img src="{{ asset($blogs[2]->blog_image) }}" class="img-fluid news-image" alt="">
                            </a>
                        </div>

                        <div class="news-bottom w-100">
                            <div class="news-text-info">
                                <h5 class="news-title">
                                    <a href="{{ route('pages.blog_details', ['slug' => $blogs[2]->slug]) }}" class="news-title-link">{{ $blogs[2]->title }}</a>
                                </h5>
                                <div class="d-flex flex-wrap">
                                    <span class="text-muted">{{ date('D-M-Y', strtotime($blogs[2]->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog End  -->
    <!-- Success Story Start  -->
     <section class="section-padding pt-0" style="background: #FFEBE9;" id="review">
         <div class="container">
             <div class="row mobile_padding">
                 <div class="col-12 mb-2">
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
    <!-- Success Story End  -->
    <!-- Tuesday With Dr T End  -->
    <!-- Programs Timeline Start  -->
    <section class="section-padding pb-4" style="background: #F3C1BA;" id="pricing-tables">
        <div class="container">
            <div class="row timeline_padding">
                <div class="col-12">
                    <h2 class="mb-0 text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-up">What Is Your Next Step?</h2>
                    <h4 class="mb-0 text-center text-dark" data-aos="fade-up">Learn about our Programs</h4>
                    <h3 class="mb-5 text-center" style="color: red;" data-aos="fade-up">“AUTISM TRANSFORMATION & SUCCESS (ATS)”</h3>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            {{-- <img src="{{ asset() }}" alt=""> --}}
                            <h3>{{ $programs[0]->pillar_heading }}</h3>
                            <p>{{ $programs[0]->pillar_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3>{{ $programs[1]->pillar_heading }}</h3>
                            <p>{{ $programs[1]->pillar_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3>{{ $programs[2]->pillar_heading }}</h3>
                            <p>{{ $programs[2]->pillar_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3>{{ $programs[3]->pillar_heading }}</h3>
                            <p>{{ $programs[3]->pillar_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin: 2%">
                    <div class="single-table text-center">
                        <div class="plan-header">
                            <h3>{{ $programs[4]->pillar_heading }}</h3>
                            <p>{{ $programs[4]->pillar_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row timeline_padding justify-content-center">
                <div class="col-12">
                    <h5 class="mb-4 text-center" data-aos="fade-up">
                        Designed to SIMPLIFY autism recovery & to teach <span class="text-bold"> EVERYTHING </span> you need to Start and Finish your child’s success journey, all the while being supported, cared and guided.
                    </h5>
                    <h3 class="mb-5 text-center text-dark" data-aos="fade-up"><button class="btn btn-warning"><a href="{{ route('pages.programs') }}" class="text-dark"> KNOW ABOUT OUR PROGRAMS</a></button></h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Programs Timeline End  -->
    <!-- Social Media Share Buttons -->
    <section class="section-padding pt-5" style="background: #FFEBE9;" id="media">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 mb-4">
                    <h4 class="text-center">Last but Not the Least </h4>
                    <h2 class="text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-out" data-aos-delay="300">A Social Media Fan?</h2>
                    <h4 class="text-center">Follow Us on <a class="bi-instagram" style="margin-bottom: 5px;color: #fb3958;" href="{{ $social->instagram_url }}"></a> OR Join our <a href="{{ $social->facebook_url }}" class="bi-facebook" style="margin-bottom: 5px;color: #3b5998;"></a></h4>
                    <p class="text-center">Catch us living our best lives on social media platforms. Pick your handle, and let’s go, sister!!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Social Media Share Buttons End -->
@endsection
