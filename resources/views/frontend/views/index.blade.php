@extends('frontend.layouts.base')
@section('title') قالو عنا @stop


@section('content')

<section id="main-container" class="main-container">
    <div class="container">
       <div class="row">
          <div class="col text-center">
             <div class="section-heading wow fadeInDown" data-wow-deuration="1s" data-wow-delay=".2s">
                <h2>
                   <small>قالو عنا</small>
                   أراء <span>نفتخر</span> بها
                </h2>
                <span class="animate-border ml-auto mr-auto tw-mt-20 tw-mb-40"></span>
             </div>
          </div>
          <!-- COl End -->
       </div>
       <div class="row">
            <div class="col-md-12">
               <div class="testimonial-box-carousel owl-carousel">
                  @foreach ($views as $item)
                  <div class="tw-testimonial-box">
                     <div class="testimonial-bg">
                        <div class="testimonial-icon">
                           <img src="{{Avatar::create($item->name)->setBackground('#467fcf')->setDimension('90')->toBase64()}}" alt="" class="img-fluid">
                        </div>
                     </div>
                     <!-- End Testimonial bg -->
                     <div class="testimonial-meta">
                        <h4>
                           {{$item->name}}
                        </h4>
                     </div>
                     <!-- End Testimonial Meta -->
                     <div class="testimonial-text">
                        <p>{{$item->view}}</p>
                        {{-- <i class="icon icon-quote2"></i> --}}
                     </div>
                     <!-- End testimonial text -->
                  </div>
                  @endforeach
                  <!-- End Tw testimonial wrapper -->
               </div>
               <!-- Col end -->
            </div>
            <!-- Row End -->
         </div>
       <!-- Row End -->
    </div>
    <!-- Container End -->
 </section>
 <!-- Testimonial end -->

 <section id="tw-testimonial-bg" class=" pt-5 text-center">
    <div class="container">
       <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#viewsModal" data-whatever="@mdo">أكتب رأيك</button>
            </div>
       </div>
       
       <!-- Carousel End -->
    </div>
    <!-- Container End -->


 </section>
 
 <div class="modal fade" id="viewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">أكتب رأيك</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('frontend.post.view')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">الأسم</label>
                    <input type="text" class="form-control" id="name" name="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">البريد اﻹلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mobile" class="col-form-label">رقم الجوال</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern= "[0-9]+" required>
                </div>
                <div class="form-group">
                    <label for="view" class="col-form-label">ضع رأيك هنا</label>
                    <textarea class="form-control" id="view" name="view"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">أرسل رأيك</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@stop



