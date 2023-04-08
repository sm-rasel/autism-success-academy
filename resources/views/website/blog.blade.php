@extends('layouts.website.master')
@section('content')
    <!-- Blog Start  -->
    <section class="news section-padding pt-0 pb-0" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-5 text-center" data-aos="fade-up">BLOG</h2>
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
                @if($nextBlog !== null)
                <div class="col-lg-8 col-10 mx-auto text-center mt-5 mb-5 pt-4">
                    <span class="d-block" data-aos="zoom-in">Next article</span>
                    <h3 class="news-title" data-aos="fade-up">
                        <a href="{{ route('pages.blog_details', ['slug' => $nextBlog->slug]) }}" class="news-title-link">{{ $nextBlog->title }}</a>
                    </h3>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Blog End  -->
    <!-- Media Blogs End -->
    <!-- Social Media Share Buttons -->
    <section class="section-padding pt-5" style="background: #fff;" id="media">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 mb-4">
                    <h2 class="text-center heading_color" style="font-family: 'Dancing Script', cursive" data-aos="fade-out" data-aos-delay="300">A Social Media Fan?</h2>
                    <h4 class="text-center">Follow Us on <a class="bi-instagram" style="margin-bottom: 5px;color: #fb3958;" href="{{ $social->instagram_url }}"></a> OR Join our <a href="{{ $social->facebook_url }}" class="bi-facebook" style="margin-bottom: 5px;color: #3b5998;"></a></h4>
                    <p class="text-center">Catch us living our best lives on social media platforms. Pick your handle, and let’s go, sister!!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Social Media Share Buttons End -->
@endsection
