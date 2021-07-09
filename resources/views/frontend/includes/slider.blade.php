   <!-- Start hero slider/ Owl Carousel Slider -->
   <div class="tw-hero-slider owl-carousel">

         @foreach ($sliders as $slide)
          
      
         <div class="slider-1">
            <!-- Slider arrow end -->
            <div class="slider-wrapper d-table">
               <div class="slider-inner d-table-cell">
                  <div class="container">
                     <div class="row justify-content-center">
                        <div class="col-md-6">
                           <img src="{{$slide->image}}" alt="" class="img-fluid slider-img">
                        </div>
                        <!-- Col end -->
                        <div class="col-md-6">
                           <div class="slider-content">
                              <h1>{{$slide->title}}</h1>
                              <p>{{$slide->desc}}</p>
                           </div>
                           <!-- End Slider Content -->
                        </div>
                        <!-- col end -->
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- COntainer End -->
               </div>
               <!-- Slider Inner End -->
            </div>
            <!-- Slider Wrapper End -->
         </div>
         @endforeach
         <!-- Slider 1 end -->
 </div>
 <!-- End Carousel -->