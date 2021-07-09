@extends('frontend.layouts.base')

@section('title') أخر اﻷخبار @stop


@section('content')



 <section id="main-container" class="main-container">
    <div class="container">
         <div class="row text-center">
               <div class="col section-heading wow fadeInDown" data-wow-deuration="1s" data-wow-delay=".2s">
                  <h2>
                     <small>أخبار اﻷكاديمية</small>
                     أخر 
                     <span>أخبارنا</span>
                  </h2>
                  <!-- End Section Title -->
                  <span class="animate-border border-offwhite ml-auto mr-auto tw-mt-20"></span>
               </div>
               <!-- End Col -->
            </div>
       <div class="row">
         @foreach ($allNews as $item)
          <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
              
              <article class="post tw-news-post">
                    <div class="post-media post-image">
                       <img src="{{$item->image}}" class="img-fluid" alt="">
                    </div>
                    <!-- End Post Media -->
                    <div class="post-body">
                       <div class="post-item-date">
                          <div class="post-date">
                             <span class="date">{{$item->created_at->format('d')}}</span>
                             <span class="month"><b>{{$item->created_at->format('M')}}</b></span>
                          </div>
                       </div>
                       <!-- End Post Item Date -->
                       <div class="entry-header">
                          <div class="post-meta">
                             <span class="post-author">
                              تم إنشاء الخبر بواسطة:<a href="#"> {{$item->user->username}}</a>
                             </span>
                          </div>
                          <h2 class="entry-title ">
                             <a href="{{route('news.show', $item->slug)}}" class="post-title">{{$item->title}}</a>
                          </h2>
                          <!-- End Post Meta -->
                       </div>
                       <!-- header end -->
                       <div class="entry-content">
                            <p>{{str_limit(strip_tags($item->description), 200) }}</p>
                       </div>
                       <!-- End Entry Content -->
                       <div class="post-footer">
                          <a href="{{route('news.show', $item->slug)}}" class="btn btn-dark"> المزيد &nbsp;<i class="icon icon-arrow-left"></i></a>
                       </div>
                       <!-- End Post Footer -->
                    </div>
                    <!-- End Post Body -->
                 </article>
              
          </div>
          @endforeach
          <!-- Content Col end -->

       </div>
       <!-- Main row end -->

       <div class="row">
          <div class="col-12">
             {{$allNews->links()}}
          </div>
       </div>
    </div>
    <!-- Container end -->
 </section>
 <!-- Main container end -->
@stop