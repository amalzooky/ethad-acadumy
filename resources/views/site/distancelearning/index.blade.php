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
                            <h2 class="title text-white text-center">التعلم عن بعد</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li><a href="#">الرئيسية</a></li>
                                <li class="active text-gray-silver">التعلم عن بعد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start main-content -->
          <!-- Section: Course gird -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 blog-pull-right">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="project mb-30 border-2px">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt="" src="{{asset('front/images/project/c5.jpg')}}">
                                            <div class="hover-link">
                                                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>جم500</span> </a>
                                            </div>
                                        </div>
                                        <div class="project-details p-15 pt-10 pb-10">
                                            <h5 class="font-14 font-weight-500 mb-5">البرمجه النوعية</h5>
                                            <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">الدفاع الوطني</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="project mb-30 border-2px">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt="" src="{{asset('front/images/project/c4.jpg')}}">
                                            <div class="hover-link">
                                                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>جم500</span> </a>
                                            </div>
                                        </div>
                                        <div class="project-details p-15 pt-10 pb-10">
                                            <h5 class="font-14 font-weight-500 mb-5">الدفاع الامني</h5>
                                            <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">الدفاع الامني</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="project mb-30 border-2px">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt="" src="{{asset('front/images/project/c3.jpg')}}">
                                            <div class="hover-link">
                                                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>جم500</span> </a>
                                            </div>
                                        </div>
                                        <div class="project-details p-15 pt-10 pb-10">
                                            <h5 class="font-14 font-weight-500 mb-5">الدفاع الامني</h5>
                                            <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">الاتحاد الوطني</a></h4>
                                        </div>
                                    </div>
                                </div>
  <div class="col-sm-6 col-md-3">
                                    <div class="project mb-30 border-2px">
                                        <div class="thumb">
                                            <img class="img-fullwidth" alt="" src="{{asset('front/images/project/c2.jpg')}}">
                                            <div class="hover-link">
                                                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20" href="#"><span>جم500</span> </a>
                                            </div>
                                        </div>
                                        <div class="project-details p-15 pt-10 pb-10">
                                            <h5 class="font-14 font-weight-500 mb-5">الدفاع الامني</h5>
                                            <h4 class="font-weight-700 text-uppercase mt-0"><a href="page-courses-accounting-technologies.html">الاتحاد الوطني</a></h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->

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


