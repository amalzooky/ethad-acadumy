@extends('frontend.layouts.base')

@section('title') معرض الصور @stop


@section('content')

 <section id="tw-case" class="tw-case">
    <div class="container">
       <div class="row text-center">
          <div class="col section-heading wow fadeInDown" data-wow-deuration="1s" data-wow-delay=".2s">
             <h2>
                <small>معرض صور اﻷكاديمية</small>
                <span>مناسبات</span>
                نفتخر بها
             </h2>
             <!-- End Section Title -->
             <span class="animate-border border-offwhite ml-auto mr-auto tw-mt-20"></span>
          </div>
          <!-- End Col -->
       </div>
       <!-- End Row -->
       <div class="row">
           @foreach ($categories as $category)
          <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
             <div class="tw-case-study-box">
                <div class="case-img study-bg-1">
                   <img src="{{$category->cover}}" alt="" class="img-fluid">
                </div>
                <!-- End case img -->
                <div class="casestudy-content">
                   <a href="{{route('front.gallery.categories.show', $category->id)}}">
                      <h4>{{$category->name}}</h4>
                   </a>
                   <p>{{$category->description}}</p>
                   <hr>
                   <p class="text-dark">تاريخ المناسبة: {{$category->date}}</p>
                   <p class="text-dark">مكان المناسبة: {{$category->location}}</p>
                </div>
                <!-- End case study content -->
             </div>
             <!-- End case study box -->
          </div>
          @endforeach


       </div>
       <!-- End Row -->
       <div class="row">
           <div class="col-12">
               {{$categories->links()}}
           </div>
       </div>
    </div>
    <!-- Container End -->
 </section>
 <!-- TW case end -->
@stop


