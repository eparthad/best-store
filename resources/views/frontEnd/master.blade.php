<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('frontEnd/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontEnd/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontEnd/css/flexslider.css') }}" type="text/css" media="screen" />
    <!-- js -->
    <script src="{{ asset('frontEnd/js/jquery.min.js') }}"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="{{ asset('frontEnd/js/simpleCart.min.js') }}"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{ asset('frontEnd/js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="{{ asset('frontEnd/css/jquery.countdown.css') }}" />
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="{{ asset('frontEnd/css/animate.min.css') }}" rel="stylesheet">
    <script src="{{ asset('frontEnd/js/wow.min.js') }}"></script>


    <script src="{{ asset('frontEnd/js/ajaxCartUpdate.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>

<body onload="makeAjaxCart('header-ajax')">
<!-- header -->
<div class="header">
    <div class="container">

        {{--Header Start--}}
        @include('frontEnd.includes.header')

        {{--End of header--}}

        {{--Menu Start--}}

        @include('frontEnd.includes.menu')

        {{--End of menu--}}

    </div>
</div>
<!-- //header -->
<!-- banner -->
    @yield('homeContent')
<!-- //collections-bottom -->
<!-- footer -->
    @include('frontEnd.includes.footer')
<!-- //footer -->
</body>
</html>