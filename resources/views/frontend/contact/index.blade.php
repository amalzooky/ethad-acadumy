@extends('frontend.layouts.pages')

@section('title') تواصل معنا @stop


@section('content')
    <!-- banner -->
    <div class="banner-agile-2">
        <img src="">
        <!-- //navigation -->
    </div>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
        </ol>
    </nav>
    <div class="course-w3ls py-5">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">تواصل معنا
                {{--                <span class="font-weight-bold">business</span>--}}
            </h3>

        </div>
    </div>
    <!-- //course-->
    <!-- breadcrumb -->
    <!-- //banner -->
    <div class='container'>
        <div class="row">
            <div class="col-md-12">
                <div id="map" class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13521.656244649694!2d35.172077223357654!3d32.085093198980594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d27b7e69fecff%3A0x37b8a0567622a0eb!2z2LPZhNmB2YrYqg!5e0!3m2!1sen!2sjo!4v1543964299503" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
        <!--animated bounceInLeft class for selection what will be animated-->
    <div class="conects">
        <div class="container">
        <div class='wrapper animated bounceInLeft'>
            <div class='company-info'>
                <h3>أكاديمية الاتحاد الوطني</h3>
                <ul>
                    <li><i class="fa fa-road"></i> أسماعلية</li>
                    <li><i class="fa fa-phone"></i> (555) 5555-5555</li>
                    <li><i class="fa fa-envelope"></i> info@ntuce.com</li>
                </ul>
            </div>
            <div class='contact'>
                <h3>أرسل استفسارك</h3>
                <form id="contact-form" class="contact-form" action="{{route('contact.send')}}" method="POST">
                    @csrf
                    <p>
                        <label>Name</label>
                        <input class="form-control form-name" name="name" id="name" placeholder="اﻹسم" value="{{old('name')}}" type="text" required="">
                        @if ($errors->has('name'))
                            <strong style="color:red">{{ $errors->first('name') }}</strong>
                        @endif                    </p>
                    <p>
                        <label>Phone Number</label>
                        <input class="form-control form-phone" name="mobile" value="{{old('mobile')}}" id="mobile" placeholder="رقم الهاتف" type="text">
                        @if ($errors->has('mobile'))
                            <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                        @endif                    </p>



                    <p class='full'>
                        <label>Email Adress</label>
                        <input class="form-control form-email" name="email" value="{{old('email')}}" id="email" placeholder="البريد اﻹلكتروني" type="email" required="">
                        @if ($errors->has('email'))
                            <strong style="color:red">{{ $errors->first('email') }}</strong>
                        @endif                    </p>


                    <p class='full'>
                        <label>Message</label>
                        <textarea class="form-control form-message required-field" required name="message" id="message" placeholder="رسالتك" rows="5">{{old('message')}}</textarea>
                        @if ($errors->has('message'))
                            <strong style="color:red">{{ $errors->first('message') }}</strong>
                        @endif                    </p>

                    <p class='full'>
                        <button  type="submit" >Submit</button>
                    </p>
                </form>
            </div>
        </div>
    <!-- course-->
</div>
    </div>

{{--     <!-- Contact End ----}}
{{--     <section id="tw-contact-us" class="tw-contact-us bg-offwhite mb-5">--}}
{{--            <div class="container">--}}
{{--               <div class="row">--}}
{{--                  <div class="col">--}}
{{--                     <div class="section-heading text-center">--}}
{{--                        <h2>--}}
{{--                           <small>إبقى على تواصل</small>--}}
{{--                           إترك لنا <span>رسالة</span>--}}
{{--                        </h2>--}}
{{--                        <span class="animate-border border-ash ml-auto mr-auto tw-mt-20 tw-mb-40"></span>--}}
{{--                     </div>--}}
{{--                  </div>--}}
{{--                  Col End--}}
{{--               </div>--}}
{{--              Row End--->--}}
{{--               <div class="contact-us-form">--}}
{{--                  <form id="contact-form" class="contact-form" action="{{route('contact.send')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                     <div class="error-container"></div>--}}
{{--                     <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                           <div class="form-group">--}}
{{--                              <input class="form-control form-name" name="name" id="name" placeholder="اﻹسم" value="{{old('name')}}" type="text" required="">--}}
{{--                              @if ($errors->has('name'))--}}
{{--                              <strong style="color:red">{{ $errors->first('name') }}</strong>--}}
{{--                               @endif--}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        Col end--}}
{{--                        <div class="col-lg-6">--}}
{{--                           <div class="form-group">--}}
{{--                              <input class="form-control form-phone" name="mobile" value="{{old('mobile')}}" id="mobile" placeholder="رقم الهاتف" type="text">--}}
{{--                              @if ($errors->has('mobile'))--}}
{{--                              <strong style="color:red">{{ $errors->first('mobile') }}</strong>--}}
{{--                               @endif--}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12">--}}
{{--                           <div class="form-group">--}}
{{--                              <input class="form-control form-email" name="email" value="{{old('email')}}" id="email" placeholder="البريد اﻹلكتروني" type="email" required="">--}}
{{--                              @if ($errors->has('email'))--}}
{{--                              <strong style="color:red">{{ $errors->first('email') }}</strong>--}}
{{--                               @endif--}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12">--}}
{{--                           <div class="form-group">--}}
{{--                              <textarea class="form-control form-message required-field" required name="message" id="message" placeholder="رسالتك" rows="5">{{old('message')}}</textarea>--}}
{{--                              @if ($errors->has('message'))--}}
{{--                              <strong style="color:red">{{ $errors->first('message') }}</strong>--}}
{{--                               @endif--}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        Col 12 end--}}
{{--                     </div>--}}
{{--                      Form row end--}}
{{--                     <div class="text-center">--}}
{{--                        <button class="btn btn-primary tw-mt-30" type="submit">إرسال</button>--}}
{{--                     </div>--}}
{{--                  </form>--}}
{{--                Form end--}}
{{--               </div>--}}
{{--            Contact us form end--}}
{{--            </div>--}}
{{--           Container End ---}}
{{--         </section>--}}
@stop
