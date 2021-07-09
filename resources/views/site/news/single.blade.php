@extends('site.layouts.base')


@section('title') {{$news->title}} @stop

@section('content')
<section id="main-container" class="main-container">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="post-content post-single">
                <div class="post-media post-image">
                   <img src="{{$news->image}}" class="img-fluid" alt="">
                </div>
                <!-- End Post Media -->

                <div class="post-body">

                   <!-- End Post Item Date -->
                   <div class="custom-ml" >
                      <div class="post-meta">
                         <span class="post-meta-date">
                            <i class="fa fa-clock-o"></i> <span class="day">{{$news->created_at->format('d')}} {{$news->created_at->format('M')}}</span>
                         </span>
                         <span class="post-author">
                            تم إنشاء الخبر بواسطة:<b> {{$news->user->username}}</b>
                        </span>
                      </div>
                      <h3 class="entry-title my-3">
                         <a href="javascript:void(0)" class="text-dark">{{$news->title}}</a>
                      </h3>
                      <!-- End Post Meta -->
                   </div>
                   <!-- header end -->
                   <div class="entry-content">
                      {!! $news->description !!}
                   </div>
                   <!-- End Entry Content -->
                   <div class="post-footer clearfix">
                      <div class="share-items pull-right">
                         <ul class="post-social-icons unstyled">
                            <li><strong>مشاركة: </strong></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                         </ul>
                      </div>
                      <!-- Share items end -->
                   </div>
                   <!-- Post footer end -->
                </div>
                <!-- End Post Body -->
             </div>
             <!-- Post Content End -->
          </div>

       </div>
       <!-- Main row end -->
    </div>
    <!-- Container end -->
 </section>
@stop
