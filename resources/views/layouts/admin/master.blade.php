<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title> Admin | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Autism Success Academy (ATS)" name="description" />
    <meta content="Sabbir Hossain Jiko" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/admin/images/favicon-2.png')}}">
    <!-- CSS FILES -->
    @include('partials.admin.styles')

</head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            <!--Header-->
            @include('partials.admin.header')
            <!--  Left Sidebar Start  -->
            @include('partials.admin.sidebar')
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('partials.admin.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

            <!-- JAVASCRIPT FILES -->
            @include('partials.admin.scripts')
            @yield('customJs')
    </body>
</html>
