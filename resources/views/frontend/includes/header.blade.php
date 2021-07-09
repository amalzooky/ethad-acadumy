   <!-- header======================-->
   <header>
    <div class="tw-header">
       <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-white">
             <a class="navbar-brand tw-nav-brand" href="/">
                {{-- <img src="{{asset('frontend/images/logo/156725809563154226.png')}}"  alt="seobin"> --}}
                أكاديمية الراتب
             </a>
             <!-- End of Navbar Brand -->
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
             </button>
             <!-- End of Navbar toggler -->
             <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                   <li class="nav-item {{active('frontend.index')}}">
                      <a class="nav-link active" href="{{route('frontend.index')}}">
                         الرئيسية
                      </a>
                   </li>
                   <li class="nav-item {{active('news.all')}}">
                      <a class="nav-link active" href="{{route('news.all')}}">
                         أخبارنا
                      </a>
                   </li>
                   <li class="nav-item {{active('frontend.gallery.categories')}}">
                      <a class="nav-link active" href="{{route('frontend.gallery.categories')}}">
                         معرض الصور
                      </a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link active" href="{{route('news.all')}}">
                         النشاطات
                      </a>
                   </li>
                   <li class="nav-item {{active('frontend.honoraryboard')}}">
                      <a class="nav-link active" href="{{route('frontend.honoraryboard')}}">
                         لوحة الشرف
                      </a>
                   </li>
                   <li class="nav-item {{active('frontend.views')}}">
                      <a class="nav-link" href="{{route('frontend.views')}}">
                         قالو عنا
                      </a>
                   </li>
                   <li class="nav-item {{active('frontend.about')}}">
                      <a class="nav-link" href="{{route('frontend.about')}}">
                         من نحن
                      </a>
                   </li>
                   {{-- <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                         Pages
                         <span class="tw-indicator"><i class="fa fa-angle-down"></i></span>
                      </a>
                      <ul class="dropdown-menu tw-dropdown-menu">
                         <li><a href="about-us-1.html">About us 1</a></li>
                         <li><a href="about-us-2.html">About us 2</a></li>
                         <li><a href="team.html">Our Teams</a></li>
                         <li><a href="testimonial.html">Testimonial</a></li>
                         <li><a href="faq.html">FAQ</a></li>
                         <li><a href="contact.html">Contact</a></li>
                         <li><a href="404.html">404</a></li>
                      </ul>
                      <!-- End of Dropdown menu -->
                   </li>
                   <!-- End Dropdown -->
                   <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                         Services
                         <span class="tw-indicator"><i class="fa fa-angle-down"></i></span>
                      </a>
                      <ul class="dropdown-menu tw-dropdown-menu">
                         <li><a href="service.html">Service All</a></li>
                         <li><a href="single-service.html">Service Single</a></li>
                      </ul>
                      <!-- End of Dropdown menu -->
                   </li>
                   <!-- End Dropdown -->
                   <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                         Projects
                         <span class="tw-indicator"><i class="fa fa-angle-down"></i></span>
                      </a>
                      <ul class="dropdown-menu tw-dropdown-menu">
                         <li><a href="case-studies.html">Projects All</a></li>
                         <li><a href="single-case.html">Project Single</a></li>
                      </ul>
                      <!-- End of Dropdown menu -->
                   </li>
                   <!-- End Dropdown --> --}}

                   {{-- <li class="nav-item dropdown tw-megamenu-wrapper">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                         Features
                         <span class="tw-indicator">
                            <i class="fa fa-angle-down"></i>
                         </span>
                      </a>
                      <div id="tw-megamenu" class="dropdown-menu tw-mega-menu">
                         <div class="row">
                            <div class="col-md-12 col-lg-3 no-padding">
                               <ul>
                                  <li class="tw-megamenu-title">
                                     <h3>Standard Pricing</h3>
                                  </li>
                                  <li><a href="#">SEO Pricing</a></li>
                                  <li><a href="#">Ecommerce SEO</a></li>
                                  <li><a href="#">Enterprise SEO</a></li>
                                  <li><a href="#">Local SEO</a></li>
                                  <li><a href="#">SEO Audits</a></li>
                                  <li><a href="#">PPC Management</a></li>
                                  <li><a href="#">SEO Link Buildings</a></li>
                               </ul>
                               <!-- End UL -->
                            </div>
                            <!-- End Col -->
                            <div class="col-md-12 col-lg-3 no-padding">
                               <ul>
                                  <li class="tw-megamenu-title">
                                     <h3>Elements One</h3>
                                  </li>
                                  <li><a href="#">Addon list 1</a></li>
                                  <li><a href="#">Addon list 2</a></li>
                                  <li><a href="#">Addon list 3</a></li>
                                  <li><a href="#">Addon list 4</a></li>
                                  <li><a href="#">Addon list 5</a></li>
                                  <li><a href="#">Addon list 6</a></li>
                               </ul>
                               <!-- End UL -->
                            </div>
                            <!-- End Col -->
                            <div class="col-md-12 col-lg-3 no-padding">
                               <ul>
                                  <li class="tw-megamenu-title">
                                     <h3>Elements Two</h3>
                                  </li>
                                  <li><a href="#">Addon list 7</a></li>
                                  <li><a href="#">Addon list 8</a></li>
                                  <li><a href="#">Addon list 9</a></li>
                                  <li><a href="#">Addon list 10</a></li>
                               </ul>
                               <!-- End Ul -->
                            </div>
                            <!-- End Col -->
                            <div class="col-md-12 col-lg-3 no-padding">
                               <ul>
                                  <li class="tw-megamenu-title">
                                     <h3>Site review</h3>
                                  </li>
                                  <li>
                                     <p>Start working with the best company that provide you everything you need.</p>
                                  </li>
                               </ul>
                               <!-- End UL -->
                            </div>
                            <!-- End Col -->
                         </div>
                         <!-- End Row -->
                      </div>
                      <!-- End of Mega menu -->
                   </li> --}}
                   <!-- End MegaMenu -->
                   <li class="nav-item {{active('frontend.contact')}}"><a class="nav-link" href="{{route('frontend.contact')}}">تواصل معنا</a></li>
                </ul>
                <!-- End Navbar Nav -->
             </div>
             <!-- End of navbar collapse -->
             <div class="tw-offcanvas-menu d-none d-md-block">
               @auth
               <a href="{{route('dashboard.home')}}" class="text-dark"><i class="fa fa-user"></i> حسابي</a>
               @endauth
                <div class="tw-menu-bar inline-menu">
                   
                   <span></span>
                   <span></span>
                   <span></span>
                </div>
             </div>
             <!-- End of offcanvas -->
          </nav>
          <!-- End of Nav -->
       </div>
       <!-- End of Container -->
    </div>
    <!-- End tw head -->
 </header>
 <!-- End of Header area=-->