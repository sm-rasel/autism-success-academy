<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Autism Success Academy (ATS)">
        <meta name="author" content="">

        <title>Autism Success Academy</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/website/images/favicon-2.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- CSS FILES -->

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Caladea&family=Dancing+Script:wght@700&family=Libre+Franklin:wght@700;800&display=swap');
        </style>

        @include('partials.website.styles')
        @yield('customCss')
<!--
    Autism Transformation & Success

    https://www.facebook.com/shossain.jiko/

-->
    </head>

    <body>

        <main>
            <!-- Navbar Start  -->
            @include('partials.website.header')
            <!-- Navbar End  -->
            @yield('content')

        </main>
        <!-- Footer Start  -->
        @include('partials.website.footer')
        <!-- Footer End  -->
        <!-- Video Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 0.5rem 0.5rem;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <video autoplay="" loop="" muted="" class="" poster="{{ asset('videos/792bd98f3e617786c850493560e11c45.jpg') }}">
                                <source src="{{ asset('videos/814dc43e870597176cad645798825c03.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT FILES -->

        @include('partials.website.scripts')

    </body>
</html>
