<!DOCTYPE html>
<html lang="en"><!-- sherad by mellatweb.com -->
<head>
    <meta charset="utf-8">
    {{-- scrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="Fabulous is a creative, clean, fully responsive, powerful and multipurpose HTML Template with latest website trends. Perfect to all type of fashion stores.">
    <meta name="keywords" content="HTML,CSS,womens clothes,fashion,mens fashion,fashion show,fashion week">
    <meta name="author" content="JTV">
    <title>Fabulous by mellatweb.com</title>

    <!-- Favicons Icon -->
    <link rel="icon" href="/front/images/favicon.ico" type="image/x-icon" />

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="/front/css/styles.css" media="all">
</head>

<body class="cms-index-index cms-home-page">

<!-- Mobile Menu -->
    @include('layouts.front.mobile_menu')
<div id="page">
    <!-- Header -->
    @include('layouts.front.header')
    <!-- end header -->
    @yield('contact')
    <!-- Footer -->
   @include('layouts.front.footer')
</div>

<!-- JavaScript -->
<script src="/front/js/jquery.min.js"></script>
<!-- Validation Script -->
<script src="/front/js/jquery.validate.js"></script>
<script src="/front/js/bootstrap.min.js"></script>
<script src="/front/js/revslider.js"></script>
<script src="/front/js/main.js"></script>
<script src="/front/js/owl.carousel.min.js"></script>
<script src="/front/js/mob-menu.js"></script>
<script src="/front/js/countdown.js"></script>
<!-- sweet alert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Custom Front Scripts -->
<script src="/front/js/front_scripts.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#rev_slider_1').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 858,
            startheight: 500,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
<!-- Hot Deals Timer -->
<script>
    var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "08/04/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
        ddiff = new Date((dnow1) - (dthen1));
    else
        ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);

    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);
</script>
</body>
</html>
