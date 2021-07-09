@extends('site.layouts.base')




@section('content')
    <!-- banner -->
    <!-- Start main-content -->
    <div class="main-content bg-lighter">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{asset('front/images/bg/bg6.jpg')}}">
            <div class="container pt-70 pb-20">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white text-center">About</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li class="active text-gray-silver">Page Title</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: About -->
        <section id="about">
            <div class="container mt-50 pb-70 pt-0">
                <div class="section-content">
                    <div class="row mt-10">
                        <div class="col-sm-12 col-md-6 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h3 class="text-uppercase mt-15">Welcome To <span class="text-theme-color-2">  LearnPress </span></h3>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Quos dolo rem consequ untur, natus laudantium commodi earum aliquid in ullam.Lorem ipsum.</p>
                            <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem laudantium deleniti.</p>
                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem laudantium deleniti.</p>
                            <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-0" href="#">View Details</a>
                        </div>
                        <div class="col-sm-12 col-md-6 mt-10 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="video-popup">
                                <a href="https://www.youtube.com/watch?v=pW1uVUg5wXM" data-lightbox-gallery="youtube-video" title="Video">
                                    <img alt="" src="{{asset('front/images/about/5.jpg')}}" class="img-responsive img-fullwidth mt-10 ml-30 ml-xs-0 ml-sm-0">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: teachers --
        <section class="bg-lightest">
            <div class="container pt-50 pb-80">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 wow mt-20 fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h3 class="text-uppercase title line-bottom mt-0 mb-30">Our <span class="text-theme-color-2">Teachers</span></h3>
                            <div class="owl-carousel-2col">
                                <div class="item">
                                    <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth" alt="" src="images/team/lg2.jpg">
                                            <div class="team-overlay"></div>
                                        </div>
                                        <div class="team-details bg-silver-light pt-10 pb-10">
                                            <h4 class="text-uppercase font-weight-600 m-5"><a href="page-teachers-details.html">Jhon Smith</a></h4>
                                            <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Teacher Designation</h6>
                                            <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth" alt="" src="images/team/lg3.jpg">
                                            <div class="team-overlay"></div>
                                        </div>
                                        <div class="team-details bg-silver-light pt-10 pb-10">
                                            <h4 class="text-uppercase font-weight-600 m-5"><a href="page-teachers-details.html">Jhon Smith</a></h4>
                                            <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Teacher Designation</h6>
                                            <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth" alt="" src="images/team/lg4.jpg">
                                            <div class="team-overlay"></div>
                                        </div>
                                        <div class="team-details bg-silver-light pt-10 pb-10">
                                            <h4 class="text-uppercase font-weight-600 m-5"><a href="page-teachers-details.html">Jhon Smith</a></h4>
                                            <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Teacher Designation</h6>
                                            <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <h3 class="text-uppercase ml-15 title line-bottom">Next <span class="text-theme-color-2 font-weight-700">Events</span></h3>
                            <div class="bxslider bx-nav-top p-0 m-0">
                                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                                    <div class="pricing table-horizontal maxwidth400">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="thumb">
                                                    <img class="img-fullwidth mb-sm-0" src="images/about/as1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-10 pl-sm-50">
                                                <h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white">Upcoming Event Title</a></h4>
                                                <ul class="list-inline font-16 mb-5 text-white">
                                                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                                                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                                                </ul>
                                                <p class="mb-0 font-13 text-white mr-5 pr-10">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit. Quas eveniet.</p>
                                                <a class="font-16  text-white mt-20" href="#">Read More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-30">
                                    <div class="pricing table-horizontal maxwidth400">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="thumb">
                                                    <img class="img-fullwidth mb-sm-0" src="images/about/as2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-10 pl-sm-50">
                                                <h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white">Upcoming Event Title</a></h4>
                                                <ul class="list-inline font-16 mb-5 text-white">
                                                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                                                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                                                </ul>
                                                <p class="mb-0 font-13 text-white mr-5 pr-10">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit. Quas eveniet.</p>
                                                <a class="font-16  text-white mt-20" href="#">Read More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-30">
                                    <div class="pricing table-horizontal maxwidth400">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="thumb">
                                                    <img class="img-fullwidth mb-sm-0" src="images/about/as3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-10 pl-sm-50">
                                                <h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white">Upcoming Event Title</a></h4>
                                                <ul class="list-inline font-16 mb-5 text-white">
                                                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                                                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                                                </ul>
                                                <p class="mb-0 font-13 text-white mr-5 pr-10">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit. Quas eveniet.</p>
                                                <a class="font-16  text-white mt-20" href="#">Read More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-30">
                                    <div class="pricing table-horizontal maxwidth400">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="thumb">
                                                    <img class="img-fullwidth mb-sm-0" src="images/about/as4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 p-10 pl-sm-50">
                                                <h4 class="mt-0 mb-5 mt-10"><a href="#" class="text-white">Upcoming Event Title</a></h4>
                                                <ul class="list-inline font-16 mb-5 text-white">
                                                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i> June 26, 2016 |</li>
                                                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i>New York</li>
                                                </ul>
                                                <p class="mb-0 font-13 text-white mr-5 pr-10">Lorem ipsum dolor sit amet, conse ctetur adipisicing elit. Quas eveniet.</p>
                                                <a class="font-16  text-white mt-20" href="#">Read More →</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Reservation Form --
        <section>
            <div class="container pt-0 pb-0">
                <div class="row">
                    <div class="col-md-7">
                        <div class="p-40 pl-0">
                            <!-- Reservation Form Start--
                            <form id="reservation_form" name="reservation_form" class="reservation-form" method="post" action="#"><h3 class="mt-0 line-bottom mb-40">Get A Free<span class="text-theme-color-2"> Service Now!</span></h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-30">
                                            <input placeholder="Enter Name" type="text" id="reservation_name" name="reservation_name" required="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <input placeholder="Email" type="text" id="reservation_email" name="reservation_email" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <input placeholder="Phone" type="text" id="reservation_phone" name="reservation_phone" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <div class="styled-select">
                                                <select id="booking_service" name="booking_service" class="form-control" required="">
                                                    <option value="">- Select Your  Courses -</option>
                                                    <option value="Accounting Technoloiges">Accounting Technoloiges</option>
                                                    <option value="Chemical Engineering">Chemical Engineering</option>
                                                    <option value="Computer Technologies">Computer Technologies</option>
                                                    <option value="Development Studies">Development Studies</option>
                                                    <option value="Electrical & Electronic">Electrical & Electronic</option>
                                                    <option value="Modern Languages">Modern Languages</option>
                                                    <option value="Modern Technologies">Modern Technologies</option>
                                                    <option value="Software Engineering">Software Engineering</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-30">
                                            <input name="reservation_date" class="form-control required date-picker" type="text" placeholder="Reservation Date" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-0 mt-0">
                                            <input name="form_botcheck" class="form-control" type="hidden" value="">
                                            <button type="submit" class="btn btn-colored btn-theme-colored btn-lg btn-flat border-left-theme-color-2-4px" data-loading-text="Please wait...">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Reservation Form End-->



@stop


