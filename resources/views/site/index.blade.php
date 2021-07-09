@extends('site.layouts.base')

@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<div class="main-content">
    <!-- Start main-content -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slide)

            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <div class="mask flex-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 order-md-1 order-2" style="margin-top: 100px;">
                                <h3 style="color: #ffffcc; margin-bottom: 20px;">{{$slide->title}}
                                    </h3>

                                <h5 style="color: #ffffcc;">{{$slide->desc}}</h5>
                              </div>
                            <div class="col-md-6 col-12 order-md-2 order-1" style="margin-top: 20px; margin-bottom: 20px; height: 100%"><img src="{{asset('dashboard')}}/{{$slide->image}}" class="mx-auto" alt="slide"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
    <!--slide end-->
        <!-- Section: home -->
{{--        <div id="sg-carousel" class="carousel slide carousel-fade" data-ride="carousel">--}}
{{--            <ol class="carousel-indicators">--}}
{{--                <li data-target="#carousel" data-slide-to="0" class="active"></li>--}}
{{--                <li data-target="#carousel" data-slide-to="1" class=""></li>--}}
{{--                <li data-target="#carousel" data-slide-to="2" class=""></li>--}}
{{--                <li data-target="#carousel" data-slide-to="3" class=""></li>--}}
{{--            </ol>--}}
{{--            <!-- Carousel items -->--}}
{{--            <div class="carousel-inner carousel-zoom">--}}
{{--                @foreach ($sliders as $key => $slide)--}}

{{--                    <div class="item {{$key == 0 ? 'active' : '' }}"><img class="img-responsive" src="{{asset('dashboard')}}/{{$slide->image}}" alt="">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            <h1  data-animation="animated zoomInLeft" class="cap-txt ">{{$slide->title}}</h1>--}}
{{--                            <p data-animation="animated bounceInDown">{{$slide->desc}}</p>--}}
{{--                            <button data-animation="animated bounceInUp" class="button button--tamaya button--border-thick" data-text="Send"><span>Send</span></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            @endforeach--}}

{{--            <!-- Carousel nav -->--}}
{{--                <a class="carousel-control left" href="#sg-carousel" data-slide="prev">‹</a>--}}
{{--                <a class="carousel-control right" href="#sg-carousel" data-slide="next">›</a>--}}
{{--            </div>--}}
{{--        </div>--}}


    </div>


        <!-- Section: About -->
        <section id="about">
            <div class="container pb-70">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h2 class="text-uppercase mt-0">مرحبا بكم<span class="text-theme-color-2">  أكاديمية الاتحاد الوطني</span></h2>
                            <p class="lead">أكاديمية تابعه لاتحاد الوطني لدعم مؤسسات الدوله </p>
                            <div class="row mt-40">
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="1s">
                                    <div class="mb-sm-30">
                                        <img class="img-fullwidth" src="{{asset('front/images/about/7.jpg')}}" alt="">
                                        <h4 class="letter-space-1 mt-10">شهادة <span class="text-theme-color-2"> معتمده</span></h4>
                                        <p>تقدم أكاديمية الاتحاد شهادة معتمده من الاتحاد الوطني لدعم مؤسسات الدولة</p>
                                        <a href="#" class="btn btn-sm btn-theme-colored">المزيد</a>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="1.2s">
                                    <div class="mb-sm-30">
                                        <img class="img-fullwidth" src="{{asset('front/images/about/8.jpg')}}" alt="">

                                        <h4 class=" letter-space-1 mt-10">تعليم <span class="text-theme-color-2"> أون لين</span></h4>
                                        <p>  منصة تعليمية أون لين تابعه الاتحاد الوطني لدعم مؤسسات الدولة</p>
                                        <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="1.2s">
                                    <div class="mb-sm-30">
                                        <img class="img-fullwidth" src="{{asset('front/images/about/8.jpg')}}" alt="">

                                        <h4 class=" letter-space-1 mt-10">تعليم <span class="text-theme-color-2"> أون لين</span></h4>
                                        <p>  منصة تعليمية أون لين تابعه الاتحاد الوطني لدعم مؤسسات الدولة</p>
                                        <a href="#" class="btn btn-sm btn-theme-colored">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Section: Mission -->
        <section id="mission">
            <div class="container-fluid pt-0 pb-0">
                <div class="row equal-height">
                    <div class="col-sm-6 col-md-6 xs-pull-none bg-theme-colored wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="pt-60 pb-40 pl-90 pr-160 p-md-30">
                            <h2 class="title text-white text-uppercase line-bottom mt-0 mb-30">لماذا أكاديمية الاتحاد?</h2>
                            <div class="icon-box clearfix m-0 p-0 pb-10">
                                <a href="#" class="icon icon-circled bg-white icon-lg pull-left flip sm-pull-none">
                                    <i class="fa fa-desktop text-theme-color-2 font-36"></i>
                                </a>
                                <div class="ml-120 ml-sm-0">
                                    <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">أفضل منصة تعليمية</h4>
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                </div>
                            </div>
                            <div class="icon-box clearfix m-0 p-0 pb-10">
                                <a href="#" class="icon icon-circled bg-white icon-lg pull-left flip sm-pull-none">
                                    <i class="fa fa-user text-theme-color-2 font-36"></i>
                                </a>
                                <div class="ml-120 ml-sm-0">
                                    <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">أفضل هيئة تدريس</h4>
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                </div>
                            </div>
                            <div class="icon-box clearfix m-0 p-0 pb-10">
                                <a href="#" class="icon icon-circled bg-white icon-lg pull-left flip sm-pull-none">
                                    <i class="fa fa-money text-theme-color-2 font-36"></i>
                                </a>
                                <div class="ml-120 ml-sm-0">
                                    <h4 class="icon-box-title text-white mt-5 mb-10 letter-space-1">أقل تكلفة</h4>
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 p-0 bg-img-cover wow fadeInRight hidden-xs" data-bg-img="{{asset('front/images/photos/ab1.jpg')}}" data-wow-duration="1s" data-wow-delay="0.3s">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: courses -->

   <section>
            <div class="container pt-70 pb-40">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">برامج <span class="text-theme-color-2"> الاكاديمية</span></h2>

                        </div>
                    </div>
                </div>
                <div class="row multi-row-clearfix">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col owl-nav-top" data-dots="true">

                            <div class="item">
                                <div class="project mb-30 border-2px">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset('front/images/project/p2.jpg')}}">
                                        <div class="hover-link">
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>$500</span> </a>
                                        </div>
                                    </div>
                                    <div class="project-details p-15 pt-10 pb-10">
                                        <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                        <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                        <ul class="list-inline project-conditions text-center m-0 p-10">
                                            <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                            <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="project mb-30 border-2px">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset('front/images/project/p3.jpg')}}">
                                        <div class="hover-link">
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>$500</span> </a>
                                        </div>
                                    </div>
                                    <div class="project-details p-15 pt-10 pb-10">
                                        <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                        <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                        <ul class="list-inline project-conditions text-center m-0 p-10">
                                            <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                            <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="project mb-30 border-2px">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset('front/images/project/p4.jpg')}}">
                                        <div class="hover-link">
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>$500</span> </a>
                                        </div>
                                    </div>
                                    <div class="project-details p-15 pt-10 pb-10">
                                        <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                        <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                        <ul class="list-inline project-conditions text-center m-0 p-10">
                                            <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                            <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="project mb-30 border-2px">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset('front/images/project/p5.jpg')}}">
                                        <div class="hover-link">
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>$500</span> </a>
                                        </div>
                                    </div>
                                    <div class="project-details p-15 pt-10 pb-10">
                                        <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                        <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                        <ul class="list-inline project-conditions text-center m-0 p-10">
                                            <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                            <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="project mb-30 border-2px">
                                    <div class="thumb">
                                        <img class="img-fullwidth" alt="" src="{{asset('front/images/project/p6.jpg')}}">
                                        <div class="hover-link">
                                            <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>$500</span> </a>
                                        </div>
                                    </div>
                                    <div class="project-details p-15 pt-10 pb-10">
                                        <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                        <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                        <ul class="list-inline project-conditions text-center m-0 p-10">
                                            <li class="current-fund"><strong>Time</strong> June 26</li>
                                            <li class="target-fund"><strong>Discount</strong>15%</li>
                                            <li class="remaining-days"><strong>Duration</strong>6 Months</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section>
        <div class="container pt-70 pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">المحاضرات <span class="text-theme-color-2"> الاوف لين</span></h2>

                    </div>
                </div>
            </div>
            <div class="row multi-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-3col owl-nav-top" data-dots="true">


                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="project mb-30 border-2px">
                                <div class="thumb">
                                    <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="https://easetemplate.com/free-website-templates/finvisor/images/testi_img_1.jpg" alt="" class="img-fluid"></div>
                                        <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <a href="#" class="video-play"></a>
                                    </div>
                                </div>
                                <div class="project-details p-15 pt-10 pb-10">
                                    <h5 class="font-14 font-weight-500 mb-5">Subtitle place here</h5>
                                    <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">Course Title Here</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum diam tortor, egestas varius erat aliquam. </p>
                                    <ul class="list-inline project-conditions text-center m-0 p-10">
                                        <li class="current-fund"><strong>الوقت</strong> يونيو 26</li>
                                        <li class="remaining-days"><strong>المده</strong>6 شهور</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Divider: Funfact -->
        <section class="divider parallax layer-overlay" data-bg-img="{{asset('front/images/bg/bg6.jpg')}}" data-parallax-ratio="0.7">
            <div class="container pt-70 pb-60">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <i class="fa fa-users mt-5 text-white"></i>
                            <h2 data-animation-duration="2000" data-value="50" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                            <h4 class="text-white text-uppercase">Professors</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <i class="fa fa-book mt-5 text-white"></i>
                            <h2 data-animation-duration="2000" data-value="75" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                            <h4 class="text-white text-uppercase">Class Types</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <i class="fa fa-home mt-5 text-white"></i>
                            <h2 data-animation-duration="2000" data-value="204" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                            <h4 class="text-white text-uppercase">Class Rooms</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                        <div class="funfact text-center">
                            <i class="fa  fa-graduation-cap mt-5 text-white"></i>
                            <h2 data-animation-duration="2000" data-value="2324" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                            <h4 class="text-white text-uppercase">Students</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Teachers -->
        <section id="teachers">
            <div class="container pt-70 pb-70">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">أعضاء <span class="text-theme-color-2">  هيئة التدريس</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row mtli-row-clearfix">
                    <div class="col-md-12">
                        <div class="owl-carousel-4col">
                            {{--{{dd($teachers->user->name)}}--}}
                            @foreach ($teachers as $teacher)

                            <div class="item">
                                <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                    <div class="team-thumb">
                                        <img class="img-fullwidth" style="height: 100%" alt="" src="{{asset('dashboard')}}/{{($teacher->user->avatar)}}">
                                        <div class="team-overlay"></div>
                                    </div>
                                    <div class="team-details bg-silver-light pt-10 pb-10">
                                        <h4 class="text-uppercase font-weight-600 m-5"><a href="page-teachers-details.html">{{$teacher->user->full_name}}</a></h4>
                                        <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{$teacher->job_title}}</h6>
                                        <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                            <li><a href="{{$teacher->user->facebook_url}}" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: events -->
{{--        <section id="events" class="divider parallax layer-overlay overlay-dark-8" data-stellar-background-ratio="0.5" data-bg-img="images/bg/bg1.jpg">--}}
{{--            <div class="container pt-70 pb-40">--}}
{{--                <div class="section-title mb-30">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 col-md-offset-3 text-center">--}}
{{--                            <h2 class="mt-0 line-height-1 text-center mb-10 text-white text-uppercase">Upcoming Events</h2>--}}
{{--                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="section-content">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-sm-6 col-md-6 mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">--}}
{{--                            <div class="pricing table-horizontal maxwidth400">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img class="img-fullwidth mb-sm-0" src="{{asset('front/images/about/as7.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 p-30 pl-sm-50">--}}
{{--                                        <h4 class="mt-0 mb-5"><a href="#" class="text-white">Upcoming Events Title</a></h4>--}}
{{--                                        <ul class="list-inline mb-5 text-white">--}}
{{--                                            <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>--}}
{{--                                            <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>--}}
{{--                                        </ul>--}}
{{--                                        <p class="mb-15 mt-15 text-white">Lorem ipsum dolor sit amet, consectetur adi isicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>--}}
{{--                                        <a class="text-white font-weight-600" href="#">Read More →</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-6 col-md-6 mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">--}}
{{--                            <div class="pricing table-horizontal maxwidth400">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img class="img-fullwidth mb-sm-0" src="{{asset('front/images/about/as8.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 p-30 pl-sm-50">--}}
{{--                                        <h4 class="mt-0 mb-5"><a href="#" class="text-white">Upcoming Events Title</a></h4>--}}
{{--                                        <ul class="list-inline mb-5 text-white">--}}
{{--                                            <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>--}}
{{--                                            <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>--}}
{{--                                        </ul>--}}
{{--                                        <p class="mb-15 mt-15 text-white">Lorem ipsum dolor sit amet, consectetur adi isicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>--}}
{{--                                        <a class="text-white font-weight-600" href="#">  More →</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-6 col-md-6 mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">--}}
{{--                            <div class="pricing table-horizontal maxwidth400">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img class="img-fullwidth mb-sm-0" src="{{asset('front/images/about/as9.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 p-30 pl-sm-50">--}}
{{--                                        <h4 class="mt-0 mb-5"><a href="#" class="text-white">Upcoming Events Title</a></h4>--}}
{{--                                        <ul class="list-inline mb-5 text-white">--}}
{{--                                            <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>--}}
{{--                                            <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>--}}
{{--                                        </ul>--}}
{{--                                        <p class="mb-15 mt-15 text-white">Lorem ipsum dolor sit amet, consectetur adi isicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>--}}
{{--                                        <a class="text-white font-weight-600" href="#">Read More →</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-sm-6 col-md-6 mb-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">--}}
{{--                            <div class="pricing table-horizontal maxwidth400">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="thumb">--}}
{{--                                            <img class="img-fullwidth mb-sm-0" src="{{asset('front/images/about/as10.jpg')}}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 p-30 pl-sm-50">--}}
{{--                                        <h4 class="mt-0 mb-5"><a href="#" class="text-white"> Upcoming Events Title </a></h4>--}}
{{--                                        <ul class="list-inline mb-5 text-white">--}}
{{--                                            <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 </li>--}}
{{--                                            <li class="pl-5"><i class="fa fa-map-marker mr-5"></i> New York </li>--}}
{{--                                        </ul>--}}
{{--                                        <p class="mb-15 mt-15 text-white"> Lorem ipsum dolor sit amet, consectetur adi isicing elit. Quas eveniet, nemo dicta. Ullam nam.</p>--}}
{{--                                        <a class="text-white font-weight-600" href="#"> Read More </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}
            <section id="contact">
                <div class="section-content">
                    <h1 class="section-header">أرسل   <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> أستفسارك</span></h1>
                    <h3>مع أكاديمية الاتحاد الوطني </h3>
                </div>
                <div class="contact-section">
                    <div class="container">
                        <form>
                            <div class="col-md-6 form-line">
                                <div class="form-group">
                                    <label for="exampleInputUsername">الاسم</label>
                                    <input type="text" class="form-control" id="" placeholder="  الاسم">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">الايميل</label>
                                    <input type="email" class="form-control" id="exampleInputEmail" placeholder=" البريد الالكتروني">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">رقم الموبيل .</label>
                                    <input type="tel" class="form-control" id="telephone" placeholder=" رقم موبيل">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for ="description"> الرساله</label>
                                    <textarea  class="form-control" id="description" placeholder="الرساله"></textarea>
                                </div>
                                <div>

                                    <button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  أرسال </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

        </section>

        <!-- Gallery Grid 3 -->
        <section id="gallery">
            <div class="container pt-70 pb-70">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="mt-0 line-height-1 text-center mb-10 text-black-333 text-uppercase">الصور <span class="text-theme-color-2"> معرض</span></h2>
                            <p class="mb-0 pb-0">أكاديمية الاتحاد الوطني<br></p>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Portfolio Filter -->
                            <div class="portfolio-filter font-alt align-center text-center mb-6 0">
                                <a href="#" class="active" data-filter="*">الكل</a>
                                @foreach($categories as $cate)
                                <a href="#{{$cate->id}}" class="" data-filter=".{{$cate->id}}">{{$cate->name}}</a>
                                @endforeach
{{--                                <a href="#campus" class="" data-filter=".campus">Campus</a>--}}
{{--                                <a href="#students" class="mt-10" data-filter=".students">Students</a>--}}
                            </div>
                            <!-- End Portfolio Filter -->

                            <!-- Portfolio Gallery Grid -->
                            <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                                <!-- Portfolio Item Start -->
                                @foreach($galleries as $galle)
                                <div class="gallery-item {{$galle->gallery_category_id}}">
                                    <div class="thumb">
                                        <img class="img-fullwidth"  src="{{asset('dashboard')}}/{{$galle->media}}" style="height: 257px;}" alt="project">
                                        <div class="overlay-shade"></div>
                                        <div class="text-holder">
{{--                                            <div class="title text-center">Sample Title</div>--}}
                                        </div>
                                        <div class="icons-holder">
                                            <div class="icons-holder-inner">
                                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                    <a href="{{asset('dashboard')}}/{{$galle->media}}" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <!-- Portfolio Item End -->


                            </div>
                            <!-- End Portfolio Gallery Grid -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Client Say -->
        <section class="divider parallax layer-overlay overlay-dark-4" data-background-ratio="0.5" data-bg-img="{{asset('front/images/bg/bg2.jpg')}}">
            <div class="container pt-60 pb-60">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 pb-0  text-center text-white" > اراء الطلاب </h2>
                        <div class="owl-carousel-1col" data-dots="true">
{{--                            {{dd($testimonials)}}--}}
                            @foreach($allNews as $new)
                            <div class="item">
                                <div class="testimonial-wrapper text-center">
                                    <div class="thumb"><img class="" alt="" src="{{asset('dashboard')}}/{{$new->image}}"></div>
                                    <div class="content pt-10">
                                        <p class="lead text-white">{{$new->title}}</p>
                                        <h4 class="author text-white mb-0">{{$new->description}}</h4>
                                        <h6 class="title text-white mt-0 mb-15">Designer</h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="item">
                                <div class="testimonial-wrapper text-center">
                                    <div class="thumb"><img class="" alt="" src="{{asset('front/images/testimonials/2.jpg')}}"></div>
                                    <div class="content pt-10">
                                        <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque est quasi, quas ipsam, expedita placeat facilis odio illo ex accusantium eaque itaque officiis et sit. Vero quo, impedit neque.</p>
                                        <h4 class="author text-white mb-0">Catherine Grace</h4>
                                        <h6 class="title text-white mt-0 mb-15">Designer</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-wrapper text-center">
                                    <div class="thumb"><img class="" alt="" src="{{asset('front/images/testimonials/3.jpg')}}"></div>
                                    <div class="content pt-10">
                                        <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque est quasi, quas ipsam, expedita placeat facilis odio illo ex accusantium eaque itaque officiis et sit. Vero quo, impedit neque.</p>
                                        <h4 class="author text-white mb-0">Catherine Grace</h4>
                                        <h6 class="title text-white mt-0 mb-15">Designer</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Blog -->
        <section id="blog">
            <div class="container pt-70">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="mt-0 line-height-1 text-uppercase">أخر  <span class="text-theme-color-2"> الاخبار</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col owl-nav-top mb-sm-0" data-dots="true">
                            <div class="item">
                                <article class="post clearfix maxwidth600 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('front/images/blog/1.jpg')}}" alt="" class="img-responsive img-fullwidth"> </div>
                                        <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <ul>
                                                        <li><a class="text-white" href="#"><i class="fa fa-comments-o mt-0 pt-0"></i> 85 <br> comments</a></li>
                                                        <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h4 class="entry-title mt-0 pt-0"><a href="#">Post Title Here</a></h4>
                                        <span class="text-theme-colored mr-10 font-14">Admin | <i class="fa fa-calendar mr-5 text-theme-colored"></i> 21 February 2016</span>
                                        <p class="text-left mb-20 mt-5 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="blog-single-left-sidebar.html">Read more</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <article class="post clearfix maxwidth600 mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('front/images/blog/2.jpg')}}" alt="" class="img-responsive img-fullwidth"> </div>
                                        <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <ul>
                                                        <li><a class="text-white" href="#"><i class="fa fa-comments-o mt-0 pt-0"></i> 85 <br> comments</a></li>
                                                        <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h4 class="entry-title mt-0 pt-0"><a href="#">Post Title Here</a></h4>
                                        <span class="text-theme-colored mr-10 font-14">Admin | <i class="fa fa-calendar mr-5 text-theme-colored"></i> 21 February 2016</span>
                                        <p class="text-left mb-20 mt-5 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="blog-single-left-sidebar.html">Read more</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <article class="post clearfix maxwidth600 mb-sm-30 wow fadeInRight" data-wow-delay=".6s">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('front/images/blog/3.jpg')}}" alt="" class="img-responsive img-fullwidth"> </div>
                                        <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <ul>
                                                        <li><a class="text-white" href="#"><i class="fa fa-comments-o mt-0 pt-0"></i> 85 <br> comments</a></li>
                                                        <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h4 class="entry-title mt-0 pt-0"><a href="#">Post Title Here</a></h4>
                                        <span class="text-theme-colored mr-10 font-14">Admin | <i class="fa fa-calendar mr-5 text-theme-colored"></i> 21 February 2016</span>
                                        <p class="text-left mb-20 mt-5 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="blog-single-left-sidebar.html">Read more</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <article class="post clearfix maxwidth600 mb-sm-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('front/images/blog/2.jpg')}}" alt="" class="img-responsive img-fullwidth"> </div>
                                        <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <ul>
                                                        <li><a class="text-white" href="#"><i class="fa fa-comments-o mt-0 pt-0"></i> 85 <br> comments</a></li>
                                                        <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h4 class="entry-title mt-0 pt-0"><a href="#">Post Title Here</a></h4>
                                        <span class="text-theme-colored mr-10 font-14">Admin | <i class="fa fa-calendar mr-5 text-theme-colored"></i> 21 February 2016</span>
                                        <p class="text-left mb-20 mt-5 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="blog-single-left-sidebar.html">Read more</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <article class="post clearfix maxwidth600 mb-sm-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('front/images/blog/3.jpg')}}" alt="" class="img-responsive img-fullwidth"> </div>
                                        <div class="entry-meta meta-absolute text-center pl-10 pr-10">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <ul>
                                                        <li><a class="text-white" href="#"><i class="fa fa-comments-o mt-0 pt-0"></i> 85 <br> comments</a></li>
                                                        <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up mt-20"></i> 250 <br> Likes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h4 class="entry-title mt-0 pt-0"><a href="#">Post Title Here</a></h4>
                                        <span class="text-theme-colored mr-10 font-14">Admin | <i class="fa fa-calendar mr-5 text-theme-colored"></i> 21 February 2016</span>
                                        <p class="text-left mb-20 mt-5 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="blog-single-left-sidebar.html">Read more</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Clients -->
        <section class="clients bg-theme-colored">
            <div class="container pt-10 pb-10 pb-sm-0 pt-sm-0">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section: Clients -->
                        <div class="owl-carousel-6col transparent text-center owl-nav-top">
                            <div class="item">
                                <a href="#" data-toggle="modal" data-target="#5">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
                                </a>



                            </div>

                            <div class="item"> <a href="#" data-toggle="modal" data-target="#lightbox"><img src="{{asset('front/images/testimonials/2.jpg')}}" ></a></div>
                            <div class="item"> <a href="#" data-toggle="modal" data-target="#lightbox"><img src="{{asset('front/images/testimonials/2.jpg')}}" ></a></div>
                            <div class="item"> <a href="#" data-toggle="modal" data-target="#lightbox"><img src="{{asset('front/images/testimonials/3.jpg')}}"  alt=""></a></div>
                            <div class="item"> <a href="#" data-toggle="modal" data-target="#lightbox"><img src="{{asset('front/images/testimonials/4.jpg')}}"  alt=""></a></div>
                            <div class="item"> <a href="#" data-toggle="modal" data-target="#lightbox"><img src="{{asset('front/images/testimonials/5.jpg')}}" alt=""></a></div>
                            <div class="item"> <a href="#"><img src="{{asset('front/images/testimonials/1.jpg')}}" data-toggle="modal" data-target="#lightbox" alt=""></a></div>
                            <div class="item"> <a href="#"><img src="{{asset('front/images/testimonials/2.jpg')}}" data-toggle="modal" data-target="#lightbox" alt=""></a></div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="5" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="modal-body">
                            <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
                        </div>
                        <div class="col-md-12 description">
                            <h4>This is the fifth one on my Gallery</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end main-content -->
<script>
    $(".video-play").on('click', function(e) {
        e.preventDefault();
        var vidWrap = $(this).parent(),
            iframe = vidWrap.find('.video iframe'),
            iframeSrc = iframe.attr('src'),
            iframePlay = iframeSrc += "?autoplay=1";
        vidWrap.children('.video-thumbnail').fadeOut();
        vidWrap.children('.video-play').fadeOut();
        vidWrap.find('.video iframe').attr('src', iframePlay);


    });

</script>

@endsection
