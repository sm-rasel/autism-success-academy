<!-- Navbar Start  -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('pages.index') }}">
            <strong>Autism Success Academy</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto" style="font-family: Libre Franklin">
                <li class="nav-item {{ request()->routeIs('pages.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.index') }}">HOME</a>
                </li>

                <li class="nav-item {{ request()->routeIs('pages.blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.blog') }}">BLOG</a>
                </li>

                <li class="nav-item {{ request()->routeIs('pages.programs') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.programs') }}">PROGRAMS</a>
                </li>

                <li class="nav-item {{ request()->routeIs('pages.live-show') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.live-show') }}">LIVE SHOW</a>
                </li>

                <li class="nav-item {{ request()->routeIs('pages.testimonials') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.testimonials') }}">TESTIMONIALS</a>
                </li>
                <li class="nav-item {{ request()->routeIs('pages.about-us') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.about-us') }}">ABOUT US</a>
                </li>
                <li class="nav-item {{ request()->routeIs('pages.faq') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.faq') }}">FAQ</a>
                </li>
                <li class="nav-item {{ request()->routeIs('pages.tudent-portal') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pages.student-portal') }}">STUDENT PORTAL</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End  -->