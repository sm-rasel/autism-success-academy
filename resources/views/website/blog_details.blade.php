@extends('layouts.website.master')
@section('content')
    <!-- Blog Start  -->
    <section class="news-detail section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-10 mx-auto">
                    <h2 class="mb-3" data-aos="fade-up">{{ $blog->title }}</h2>
                    <div class="clearfix my-4 mt-lg-0 mt-5">
                        {!! $blog->description !!}
                    </div>

                    <div class="social-share d-flex mt-5">
                        <span class="me-4" data-aos="zoom-in">Share this article:</span>

                        <a href="#" class="social-share-icon bi-facebook" data-aos="zoom-in"></a>

                        <a href="#" class="social-share-icon bi-twitter mx-3" data-aos="zoom-in"></a>

                        <a href="#" class="social-share-icon bi-envelope" data-aos="zoom-in"></a>
                    </div>
                </div>
                @if($nextBlog !== null)
                <div class="col-lg-8 col-10 mx-auto text-center mt-4">
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
    <section class="section-paddingp-0" id="media">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 mb-4">
                    <h4 class="text-center" style="font-style: italic" data-aos="fade-out" data-aos-delay="300">A social media fan?</h4>
                    <ul class="social-icon mb-2 text-center">
                        <li><a href="{{ $social->facebook_url }}" class="social-icon-section bi-facebook"></a></li>
                        <li><a href="{{ $social->instagram_url }}" class="social-icon-section bi-instagram"></a></li>

                    </ul>
                    <h4 class="text-center">Follow Us on <a href="{{ $social->instagram_url }}">INSTAGRAM </a> or Join our <a href="{{ $social->facebook_url }}">FACEBOOK COMMUNITY</a></h4>
                    <p class="text-center">Catch us living our best lives on social media platforms. Pick your handle, and let’s go, sister!!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Social Media Share Buttons End -->
@endsection