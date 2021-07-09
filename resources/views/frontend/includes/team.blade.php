<section id="tw-team" class="tw-team">
        <div class="container">
           <div class="row">
              <div class="col text-center">
                 <div class="section-heading tw-mb-80">
                    <h2>
                       <small>فريقنا</small>
                       <span>أفضل</span> المدرسين
                    </h2>
                    <span class="animate-border tw-mt-20 ml-auto mr-auto"></span>
                 </div>
              </div>
              <!-- Title Col end -->
           </div>
           <!-- Title row End -->
           <div class="row">
              <div class="col-md-3">
                 <div class="tw-team-box">
                    <div class="team-img">
                       <img src="images/team/expert1.png" alt="" class="img-fluid bg-orange">
                    </div>
                    <div class="team-info">
                       <h3 class="team-name">أ.عبد الرحمن شقير</h3>
                       <p class="team-designation">رئيس مجلس اﻹدارة</p>
                       <div class="team-social-links">
                          <a href="#"><i class="fa fa-facebook"></i></a>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                          <a href="#"><i class="fa fa-linkedin"></i></a>
                       </div>
                    </div>
                    <!-- Team Info end -->
                 </div>
                 <!-- Team Box End -->
              </div>
              <!-- Col End -->
              @foreach ($teachers as $teacher)
              <div class="col-md-3">
                 <div class="tw-team-box">
                    <div class="team-img">
                       <img src="{{asset($teacher->user->avatar)}}" alt="" class="img-fluid bg-green">
                    </div>
                    <div class="team-info">
                       <h3 class="team-name">{{$teacher->user->full_name}}</h3>
                       <p class="team-designation">{{$teacher->job_title}}</p>
                       <div class="team-social-links">
                          <a href="{{$teacher->user->facebook_url}}" target="_blank"><i class="fa fa-facebook"></i></a>
                       </div>
                    </div>
                    <!-- Team Info end -->
                 </div>
                 <!-- Team Box End -->
              </div>
              @endforeach
           </div>
           <div class="row">
              <div class="col-12">
               <div class="text-center">
                  <a href="{{route('frontend.teachers')}}" class="btn btn-primary tw-mt-30">جميع المدرسين</a>
               </div>
              </div>
           </div>
           <!-- Content Row End -->
        </div>
        <!-- Container end -->
     </section>
     <!-- Team Section End -->