<section class="hero" id="hero">
    <div class="heroImage">
        <img src="{{ asset($hero->logo_image) }}" alt="logo">
    </div>
    <div class="heroText">
        <h2 class="text-white mt-3 mb-lg-2" data-aos="zoom-in" data-aos-delay="800">
            <span class="text-primary">{{$hero->heading_one}} {{$hero->heading_two}}</span> <br> <span class="by">by</span> <span style="color: #ebd5a7;font-family: 'Dancing Script', cursive">{{$hero->heading_three}}</span>
        </h2>
        <h5 class="mb-lg-3" data-aos="fade-up" data-aos-delay="900">
            <span class="text-primary">{{$hero->tag_line}}</span>
        </h5>
        <p class="text-secondary-white-color"  data-aos="fade-up" data-aos-delay="800" style="font-family: serif">
            <span style="font-style: italic">{{$hero->question_text}}</span> <br>
            <strong class="text-white" style="font-style: italic;">{{$hero->roll_out}}</strong>
        </p>
    </div>
    <button type="button" class="btn btn-outline-danger video-button" style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{ 'Watch This' }}
    </button>
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="{{ asset($hero->video) }}">
            <source src="{{ asset($hero->video) }}" type="video/mp4">

            Your browser does not support the video tag.
        </video>
    </div>
    <div class="overlay"></div>
</section>
