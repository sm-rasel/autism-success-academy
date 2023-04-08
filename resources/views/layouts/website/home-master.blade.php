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
<!--
    Autism Transformation & Success

    https://www.facebook.com/shossain.jiko/

-->

<!-- MailerLite Universal -->
    <script>
    (function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
    var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
    f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
    var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
    _.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');

    var ml_account = ml('accounts', '3321433', 'r6t4v0b9j5', 'load');
    var ml_webform_5826924 = ml_account('webforms', '5826924', 'x6k1t4', 'load');
    ml_webform_5826924('animation', 'fadeIn');
    </script>
    <!-- End MailerLite Universal -->
    </head>

    <body>

        <main>
            <!-- Hero Section Start -->
            @include('partials.website.hero')
            <!-- Hero Section End -->
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
                            <video autoplay="" loop="" muted="" class="" poster="{{ asset($hero->video) }}">
                                <source src="{{ asset($hero->video) }}" type="video/mp4">
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
