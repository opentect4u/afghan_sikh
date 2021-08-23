<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Welcome to Afghan Sikh Helps Line</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicons -->
        <link href="{{ asset('public/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/venobox/venobox.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/vendor/aos/aos.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/userform.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


        <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup ( {
                headers: {
                    'X-CSRF-TOKEN': $ ( 'meta[name="csrf-token"]' ).attr ( 'content' )
                }
            } );
        </script>

    </head>
    <!-- ======= Top Bar ======= -->
    @include('common.topbar')
    <!-- ======= end Top Bar ======= -->
    <!-- ======= Header ======= -->
    @include('common.header')
    <!-- ======= end Header ======= -->
    <!-- ======= Hero Section ======= -->
    @if(Route::currentRouteName()=='indexnot' || Route::currentRouteName()=='index')
    @include('common.hero-banner')
    @endif
    <!-- ======= end Hero Section ======= -->
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        @if(Route::currentRouteName() == 'user.register' || Route::currentRouteName() == 'gurudwara.register' || Route::currentRouteName() == 'user.servicesregister')
            @include('common.breadcrumbs')
        @endif
        <!-- ======= Breadcrumbs ======= -->
        @yield('content')
    </main>
    <!-- ======= Footer ======= -->
    @include('common.footer')
    <!-- End Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('public/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('public/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('public/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('public/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('public/js/main.js') }}"></script>
    @yield('script')
    
    <script>
        $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
        });

        $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
        });

        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }
        });
    </script>
</html>