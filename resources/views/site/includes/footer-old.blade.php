<footer id="tw-footer" class="tw-footer">
        <div class="container">
           <div class="row">
              <div class="col-md-12 col-lg-4">
                 <div class="tw-footer-info-box">
                    <a href="index.html" class="footer-logo">
                       <img src="images/footer_logo.png" alt="footer_logo" class="img-fluid">
                    </a>
                    <p class="footer-info-text">
                          مركز الراتب للتفوق والإبداع هو عبارة عن مؤسسة تعليمية مساندة تقدم الخدمات التعليمية للطلبة في المرحلة الثانوية والجامعية , في مادة الرياضيات وقريبا في مواد أخرى عن طريق التعليم الإلكتروني.
                    </p>
                    <div class="footer-social-link">
                       <h3>تابعنا على</h3>
                       <ul>
                          <li><a href="{{settings()->facebook_url ?? ''}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="{{settings()->youtube_url ?? ''}}" target="_blank"><i class="fa fa-youtube" style="color:#fff; background-color: #ff0000"></i></a></li>
                       </ul>
                    </div>
                    <!-- End Social link -->
                 </div>
                 <!-- End Footer info -->
                 <div class="footer-awarad">
                    <img src="{{asset('front/images/icon/best.png')}}" alt="">
                    <p>أفضل منصة عربية للتعليم اﻹلكتروني</p>
                 </div>
              </div>
              <!-- End Col -->
              <div class="col-md-12 col-lg-8">
                 <div class="row">
                    <div class="col-md-8">
                       <div class="contact-us">
                          <div class="contact-icon">
                             <i class="icon icon-map2"></i>
                          </div>
                          <!-- End contact Icon -->
                          <div class="contact-info">
                             <h3>{{settings()->location ?? ''}}</h3>
                             <p>عنوانا</p>
                          </div>
                          <!-- End Contact Info -->
                       </div>
                       <!-- End Contact Us -->
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                       <div class="contact-us contact-us-last">
                          <div class="contact-icon">
                             <i class="icon icon-phone3"></i>
                          </div>
                          <!-- End contact Icon -->
                          <div class="contact-info">
                             <h3>{{settings()->phone ?? ''}}</h3>
                             <p>إتصل بنا</p>
                          </div>
                          <!-- End Contact Info -->
                       </div>
                       <!-- End Contact Us -->
                    </div>
                    <!-- End Col -->
                 </div>
                 <!-- End Contact Row -->
                 <div class="row">
                    <div class="col-md-12 col-lg-6">
                       <div class="footer-widget footer-left-widget">
                          <div class="section-heading">
                             <h3>روابط سريعة</h3>
                             <span class="animate-border border-black"></span>
                          </div>
                          <ul>
                             <li><a href="{{route('news.all')}}">أخر الأخبار</a></li>
                             <li><a href="#">النشاطات</a></li>
                             <li><a href="{{route('front.about')}}">من نحن</a></li>
                             <li><a href="{{route('front.contact')}}">إتصل بنا</a></li>
                          </ul>
                          <ul>
                             <li><a href="{{route('front.gallery.categories')}}">معرض الصور</a></li>
                             <li><a href="#">قالو عنا</a></li>
                             <li><a href="{{route('front.honoraryboard')}}">لوحة الشرف</a></li>
                             <li><a href="{{route('front.teachers')}}">فريقنا</a></li>
                          </ul>
                       </div>
                       <!-- End Footer Widget -->
                    </div>
                    <!-- End col -->
                    <div class="col-md-12 col-lg-6">
                       <div class="footer-widget">
                          <div class="section-heading">
                             <h3>موقعنا</h3>
                             <span class="animate-border border-black"></span>
                          </div>
                          <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13521.656244649694!2d35.172077223357654!3d32.085093198980594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d27b7e69fecff%3A0x37b8a0567622a0eb!2z2LPZhNmB2YrYqg!5e0!3m2!1sen!2sjo!4v1543964299503" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                          <!-- End form -->
                       </div>
                       <!-- End footer widget -->
                    </div>
                    <!-- End Col -->
                 </div>
                 <!-- End Row -->
              </div>
              <!-- End Col -->
           </div>
           <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->


        <div class="copyright">
           <div class="container">
              <div class="row">
                 <div class="col-md-4">
                    <span>جميع الحقوق محفوظة &copy; مركز الراتب للتفوق واﻹبداع</span>
                 </div>
                 <!-- End Col -->
                 <div class="col-md-4 text-center">
                       {{today()->format('Y')}}-2017
                 </div>
                 <div class="col-md-4 text-lg-right text-center">
                    <a href="http://wisetouch.tech/" target="_blank">برمجة وتطوير Wisetouch</a>
                 </div>
                 <!-- End col -->
              </div>
              <!-- End Row -->
           </div>
           <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
           <button class="btn btn-dark" title="Back to Top">
              <i class="fa fa-angle-up"></i>
           </button>
        </div>
        <!-- End Back to top -->
     </footer>
     <!-- End Footer -->
