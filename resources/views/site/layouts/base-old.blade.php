<!doctype html>
<html lang="en" dir="rtl">

<head>
   <!-- Basic Page Needs =====================================-->
   <meta charset="utf-8">

   <!-- Mobile Specific Metas ================================-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Site Title- -->
   <title>@yield('title')</title>

   <!-- CSS
   ==================================================== -->
   <!--Font Awesome -->
   <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}" />

   <!--Font Awesome -->
   <link rel="stylesheet" href="{{asset('front/css/animate.css')}}" />

   <!-- Iconic Fonts -->
   <link rel="stylesheet" href="{{asset('front/css/icofonts.css')}}" />

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">

   <!-- Owl Carousel -->
   <link rel="stylesheet" href="{{asset('front/css/owlcarousel.min.css')}}" />

   <!-- Video Popup -->
   <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}" />

   <!--Style CSS -->
   <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

   <!--Responsive CSS -->
   <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">

   @yield('css')


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->


</head>

<body>
   @if (session('success'))
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 px-0 text-center">
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
               <b>{{session('success')}}</b>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
            </div>
         </div>
      </div>
   </div>
   @endif
   <div class="offcanvas-menu">
      <div class="offcanvas-menu-overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="offcanvas-wrapper">
                  <div class="offcanvas-inner">
                     <a href="index.html" class="logo">
                        <img src="{{asset('front/images/logo/156725809563154226.png')}}" width="50%" alt="">
                     </a>
                     <p>
                            مركز الراتب للتفوق والإبداع هو عبارة عن مؤسسة تعليمية مساندة تقدم الخدمات التعليمية للطلبة في المرحلة الثانوية والجامعية , في مادة الرياضيات وقريبا في مواد أخرى عن طريق التعليم الإلكتروني ,حيث يتمكن الطلبة من المشاركة الفاعلة مع المدرسين في بث حي ومباشر يوميا.
                     </p>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="contact-us">
                              <div class="contact-icon">
                                 <i class="icon icon-map2"></i>
                              </div>
                              <!-- End contact Icon -->
                              <div class="contact-info">
                                 <h3>{{settings()->location ?? ''}}</h3>
                                 <p>عنواننا</p>
                              </div>
                              <!-- End Contact Info -->
                           </div>
                           <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-12">
                           <div class="contact-us">
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
                        <div class="col-md-12">
                           <div class="contact-us">
                              <div class="contact-icon">
                                 <i class="icon icon-envelope3"></i>
                              </div>
                              <!-- End contact Icon -->
                              <div class="contact-info">
                                 <h3>{{settings()->email ?? ''}}</h3>
                                 <p>إرسل لنا</p>
                              </div>
                              <!-- End Contact Info -->
                           </div>
                           <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                     </div>
                     <!-- End Contact Row -->
                     <div class="footer-social-link text-center">
                        <ul>
                           <li><a href="{{settings()->facebook_url ?? ''}}"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="{{settings()->youtube_url ?? ''}}"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- Offcanvas inner end -->
                  <button class="menu-close-btn"><i class="fa fa-close"></i></button>
               </div>
               <!-- Offcanvas wrapper end -->
            </div>
            <!-- Col End -->
         </div>
         <!-- Row End -->
      </div>
      <!-- Container End -->
   </div>
   <!-- Off canvas menu End -->
   <div class="tw-top-bar tw-top-bar-angle bg-offwhite">
      <div class="container">
         <div class="row">
            <div class="col-md-8 text-left">
               <div class="top-contact-info">
                    <span>{{settings()->email ?? ''}}<i class="icon icon-envelope"></i></span>
                    <span>{{settings()->phone ?? ''}}<i class="icon icon-phone3"></i></span>
                    @auth
                    <a href="{{route('dashboard.home')}}">حسابي</a>
                    @else
                    <a href="{{route('login')}}"><span>تسجيل الدخول</span></a>
                    @endauth

               </div>
            </div>
            <!-- Col End -->
            <div class="col-md-4 ml-auto text-right">
               <div class="top-social-links">
                  <span>تابعنا على&nbsp;:</span>
                  <a href="{{settings()->facebook_url ?? ''}}" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="{{settings()->youtube_url ?? ''}}" target="_blank"><i class="fa fa-youtube"></i></a>
               </div>
            </div>
            <!-- Col End -->
         </div>
         <!-- Row End -->
      </div>
      <!-- Container End -->
   </div>
   <!-- Top Bar end -->

   @include('frontend.includes.header')

   @yield('slider')
   @yield('features')
   @yield('banner')
   @yield('working_process')
   @yield('testimonial')
   @yield('team')
   @yield('content')
   @yield('contact')
   @include('frontend.includes.footer')

   <!-- Javascripts File
      =============================================================================-->

   <!-- initialize jQuery Library -->
   <script src="{{asset('front/js/jquery-2.0.0.min.js')}}"></script>
   <!-- Popper JS -->
   <script src="{{asset('front/js/popper.min.js')}}"></script>
   <!-- Bootstrap jQuery -->
   <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
   <!-- Owl Carousel -->
   <script src="{{asset('front/js/owl-carousel.2.3.0.min.js')}}"></script>
   <!-- Waypoint -->
   <script src="{{asset('front/js/waypoints.min.js')}}"></script>
   <!-- Counter Up -->
   <script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
   <!-- Video Popup -->
   <script src="{{asset('front/js/jquery.magnific.popup.js')}}"></script>
   <!-- WOW JS -->
   <script src="{{asset('front/js/wow.min.js')}}"></script>
   <!-- SmoothScroll JS -->
   <script src="{{asset('front/js/smoothscroll.js')}}"></script>
   <!-- Template Custom -->
   <script src="{{asset('front/js/main.js')}}"></script>

   @yield('js')

   <script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "75261ef0-d477-4a06-b43a-941f17b50db1",
      host: "https://wchat.freshchat.com"
    });
    // Copy the below lines under window.fcWidget.init inside initFreshChat function in the above snippet

// To set unique user id in your system when it is available
window.fcWidget.setExternalId("زائر");

// To set user name
window.fcWidget.user.setFirstName("زائر");



// To set user properties
window.fcWidget.user.setProperties({
  plan: "Estate",                 // meta property 1
  status: "Active"                // meta property 2
});

  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>

</body>

</html>
