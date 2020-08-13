<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('title')</title>
        @yield('metatag')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.png" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap" rel="stylesheet" />


        @include('layouts.partials.frontend.css')
    </head>

    <body class="home-5 home-6 home-8 home-9 home-electronic">
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->
<!-- 
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div> -->

        <!--====== PRELOADER PART ENDS ======-->
        <div id="app">
            <!-- Header Start -->
            @include('layouts.partials.frontend.header')
            <!-- Header End -->

            @yield('content')
            <!-- Footer Area start -->
            @include('layouts.partials.frontend.footer')
            <!--  Footer Area End -->
        </div>

        <!-- Modal -->
        @include('frontend.modal')
        <!-- Modal end -->
        @include('layouts.partials.frontend.scripts')
    </body>

</html>
