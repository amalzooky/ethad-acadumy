<!DOCTYPE html>
<html dir="rtl" lang="en">
    <head>
        <title>أكاديمية الاتحاد الوطني </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="أكاديمية الاتحاد الوطني " />
        <!-- fonts -->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">-->
        {{--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <!-- Favicon and Touch Icons -->
    <link href="{{asset('front/images/favicon.png" rel="shortcut icon')}}" type="image/png">
    <link href="{{asset('front/images/apple-touch-icon.png" rel="apple-touch-icon')}}">
    <link href="{{asset('front/images/apple-touch-icon-72x72.png" rel="apple-touch-icon')}}" sizes="72x72">
    <link href="{{asset('front/images/apple-touch-icon-114x114.png" rel="apple-touch-icon')}}" sizes="114x114">
    <link href="{{asset('front/images/apple-touch-icon-144x144.png" rel="apple-touch-icon')}}" sizes="144x144">

    <!-- Stylesheet -->
{{--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

        <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('front/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/css-plugin-collections.css')}}" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{asset('front/css/menuzord-skins/menuzord-rounded-boxed.css')}}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{asset('front/css/style-main.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{asset('front/css/preloader.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{asset('front/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | RTL Layout -->
    <link href="{{asset('front/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/style-main-rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/style-main-rtl-extra.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- Revolution Slider 5.x CSS settings -->
    <link  href="{{asset('front/js/revolution-slider/css/settings.css')}}" rel="stylesheet" type="text/css"/>
    <link  href="{{asset('front/js/revolution-slider/css/layers.css')}}" rel="stylesheet" type="text/css"/>
    <link  href="{{asset('front/js/revolution-slider/css/navigation.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{asset('css/all.min.css')}}"></script>

    <!-- CSS | Theme Color -->
    <link href="{{asset('front/css/colors/theme-skin-color-set-1.css')}}" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">
    <!-- external javascripts -->
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

        <script src="{{asset('front/js/jquery-2.2.4.min.js')}}"></script>

        <script src="{{asset('front/js/jquery-ui.min.js')}}"></script>

    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>

        <!-- JS | jquery plugin collection for this theme -->
    <script src="{{asset('front/js/jquery-plugin-collection.js')}}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{asset('front/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('front/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}'"></script>
        <script src="{{asset('front/js/scripthome.js')}}"></script>

    </head>

<body class="rtl">
<div id="wrapper" class="clearfix">

@include('site.includes.header')



    @yield('content')

    @include('site.includes.footer')
</body>

    <script type="text/javascript" src="{{asset('front/js/custom.js')}}"></script>

    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript">
    jQuery('#myCarousel').bind('mousewheel', function(e) {
        if(e.originalEvent.wheelDelta /120 > 0) {
            $(this).carousel('next');
        } else {
            $(this).carousel('prev');
        }
    });



    $('#myCarousel').carousel({
        interval: 3000,
    })
</script>

</html>
