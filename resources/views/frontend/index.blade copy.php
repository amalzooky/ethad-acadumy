@extends('frontend.layouts.base')

@section('title') مركز الراتب للتفوق و الابداع – مركز تعليم إلكتروني يقدم خدمات تعليميه للطلبه بكل المراحل @stop
@section('slider')
    @include('frontend.includes.slider')
@endsection

@section('features')
    @include('frontend.includes.features')
@endsection

@section('banner')
    @include('frontend.includes.banner')
@endsection

@section('working_process')
    @include('frontend.includes.working_process')
@endsection

@section('testimonial')
    @include('frontend.includes.testimonial')
@endsection

@section('team')
    @include('frontend.includes.team')
@endsection

@section('contact')
 <section id="tw-contact-us" class="tw-contact-us bg-offwhite mb-5">
        <div class="container">
           <div class="row">
              <div class="col">
                 <div class="section-heading text-center">
                    <h2>
                       <small>إبقى على تواصل</small>
                       <span>سجل</span> معنا
                    </h2>
                    <span class="animate-border border-ash ml-auto mr-auto tw-mt-20 tw-mb-40"></span>
                 </div>
              </div>
              <!-- Col End -->
           </div>
           <!-- Row End -->
           <div class="contact-us-form">
              <form  class="contact-form" action="{{route('contact.send')}}" method="POST">
                @csrf
                 <div class="error-container"></div>
                 <div class="row">
                    <div class="col-lg-6">
                       <div class="form-group">
                          <input class="form-control form-name" name="name" id="name" placeholder="اﻹسم" value="{{old('name')}}" type="text" required="">
                          @if ($errors->has('name'))
                          <strong style="color:red">{{ $errors->first('name') }}</strong>
                           @endif
                       </div>
                    </div>
                    <!-- Col end -->
                    <div class="col-lg-6">
                       <div class="form-group">
                          <input class="form-control form-phone" name="mobile" value="{{old('mobile')}}" id="mobile" placeholder="رقم الهاتف" type="text">
                          @if ($errors->has('mobile'))
                          <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                           @endif
                       </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="form-group">
                          <input class="form-control form-email" name="email" value="{{old('email')}}" id="email" placeholder="البريد اﻹلكتروني" type="email" required="">
                          @if ($errors->has('email'))
                          <strong style="color:red">{{ $errors->first('email') }}</strong>
                           @endif
                       </div>
                    </div>
                    <div class="col-lg-12">
                       <div class="form-group">
                          <textarea class="form-control form-message required-field" required name="message" id="message" placeholder="رسالتك" rows="5">{{old('message')}}</textarea>
                          @if ($errors->has('message'))
                          <strong style="color:red">{{ $errors->first('message') }}</strong>
                           @endif
                       </div>
                    </div>
                    <!-- Col 12 end -->
                 </div>
                 <!-- Form row end -->
                 <div class="text-center">
                    <button class="btn btn-primary tw-mt-30" type="submit">إرسال</button>
                 </div>
              </form>
              <!-- Form end -->
           </div>
           <!-- Contact us form end -->
        </div>
        <!-- Container End -->
     </section>
     <!-- Contact End -->
@endsection