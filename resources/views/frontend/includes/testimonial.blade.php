<section id="tw-testimonial" class="tw-testimonial">
        <div class="container">
           <div class="row align-items-center justify-content-center">
              <div class="col-md-6 wow fadeInLeft" data-wow-duration="1s">
                 <div class="tw-testimonial-content text-center">
                    <h2 class="section-title">أراء طلابنا</h2>
                    <span class="animate-border border-green tw-mt-20 tw-mb-40 ml-auto mr-auto"></span>
                 </div>
                 <div class="tw-testimonial-carousel owl-carousel">
                     @foreach ($testimonials as $testimonial)
                    <div class="tw-testimonial-wrapper">
                       <div class="testimonial-bg" style="background-color: #362f2d">

                       </div>
                       <!-- End Testimonial bg -->
                       <div class="testimonial-text">
                          <p>{{$testimonial->view}}</p>
                          <div class="testimonial-meta">
                             <h4>
                                {{$testimonial->name}}
                                
                             </h4>
                             
                          </div>
                          <!-- End Testimonial Meta -->
                       </div>
                       <!-- End testimonial text -->
                    </div>
                    @endforeach
                    <!-- End tw testimonial wrapper -->
                 </div>
                 <!-- End Tw testimonial carousel -->
              </div>
              <!-- End Col -->
           </div>
           <!-- End Row -->
        </div>
        <!-- End Container -->
     </section>
     <!-- End TW testimonial -->