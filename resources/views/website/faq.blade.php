@extends('layouts.website.master')
@section('content')
<section class="section-padding d-block" style="padding-top: 12%; padding-bottom: 3%; background: #FFEBE9;">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg-12 col-md-12" style="padding: 0 9%;">
                    <h3 class="mb-3 heading_color" style="text-transform: uppercase;font-family: 'Dancing Script', cursive;">
                        STILL HAVE QUESTIONS IF AUTISM TRANSFORMATION & SUCCESS IS THE RIGHT CHOICE FOR YOU?
                    </h3>
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
                    <button type="button" class="btn btn-warning bd-red bg-button-width" style="text-transform: uppercase; font-weight: bold;" data-aos="fade-in" data-aos-delay="600" onclick="window.open('https://docs.google.com/forms/d/e/1FAIpQLScVxZ50sVKjEu-dGjcQZ7zPj1nHMs2ZtwnMlCzSPslexb530Q/viewform', '_blank')">
                        APPLY FOR A CLARITY & RECLAIM CALL TO SEE IF WE ARE FIT TO WORK WITH EACH OTHER
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
