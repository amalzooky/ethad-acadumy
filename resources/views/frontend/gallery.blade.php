@extends('frontend.layouts.base')

@section('title') معرض الصور @stop

@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/nanogallery2.woff.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/nanogallery2.min.css')}}">
@endsection

@section('content')

 <section id="tw-case" class="tw-case">
    <div class="container">
       <div class="row text-center">
          <div class="col section-heading wow fadeInDown" data-wow-deuration="1s" data-wow-delay=".2s">
             <h2>
                <small>معرض صور اﻷكاديمية</small>
                <span>{{$category->name}}</span>
                
             </h2>
             <!-- End Section Title -->
             <span class="animate-border border-offwhite ml-auto mr-auto tw-mt-20"></span>
          </div>
          <!-- End Col -->
       </div>
       <!-- End Row -->
       <div class="row">
    
        <div class="col-12">
                <div id="nanogallery2" class="">
                        @foreach ($galleries as $item)
                        <a href = "{{$item->media}}"   data-ngThumb = "{{$item->media}}" ></a>  
                        @endforeach
                    
                    </div>
        </div>
         
       </div>
       <!-- End Row -->
       <div class="row">
           <div class="col-12">
               {{$galleries->links()}}
           </div>
       </div>
    </div>
    <!-- Container End -->
 </section>
 <!-- TW case end -->
@stop

@section('js')
<script src="{{asset('frontend/js/jquery.nanogallery2.min.js')}}"></script>
<script>
                 jQuery(document).ready(function () {

jQuery("#nanogallery2").nanogallery2( {
    // ### gallery settings ### 
    thumbnailHeight:  150,
    thumbnailWidth:   150,
  });
});
</script>
@stop


