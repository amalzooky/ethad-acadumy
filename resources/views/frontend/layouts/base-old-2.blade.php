<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Edulearn Education Category Bootstrap Responsive Website Template | Home :: W3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}">
	<!-- Testimonials-Css -->
	<link href="{{asset('site/css/mislider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('site/css/mislider-custom.css')}}" rel="stylesheet" type="text/css" />

      <!-- oldStyle CSS -->
   <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
	<!-- Style-Css -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}" type="text/css" media="all" />

	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="{{asset('site/css/fontawesome-all.css')}}">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<!-- header -->
	<header>
		<!-- top header -->
		<div class="top-head-w3ls py-2 bg-dark">
			<div class="container">
				<div class="row">
					<h1 class="text-capitalize text-white col-7">
						<i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>مرحبا بك في الاكاديمية</h1>
					<!-- social icons -->
					<div class="social-icons text-right col-5">
						<ul class="list-unstyled">
							<li>
								<a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="#" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
		<!-- //top header -->
		<!-- middle header -->
		<div class="middle-w3ls-nav py-2">
			<div class="container">
				<div class="row">
					<a class="logo font-italic font-weight-bold col-lg-4 text-lg-left text-center" href="index.html">الاكاديمية</a>
					<div class="col-lg-8 right-info-agiles mt-lg-0 mt-sm-3 mt-1">
						<div class="row">
							<div class="col-sm-4 nav-middle">
								<i class="far fa-envelope-open text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">البريد الاكتروني</span>
										<a href="mailto:mail@example.com">{{settings()->email ?? ''}}</a>
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 nav-middle mt-sm-0 mt-2">
								<i class="fas fa-phone-volume text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">اتصل بنا</span>
										{{settings()->phone ?? ''}}
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 top-login-butt text-right mt-sm-2">
								<a href="{{route('login')}}" class="button-head-mow3 text-white">تسجيل الدخول</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //middle header -->
	</header>
    <!-- //header -->

    	<!-- banner -->
	<div class="banner-agile">
		<ul class="slider">
			<li class="active">
				<div class="banner-w3ls-1">
				</div>
			</li>
			<li>
				<div class="banner-w3ls-2">
				</div>
			</li>
			<li>
				<div class="banner-w3ls-3">
				</div>
			</li>
			<li>
				<div class="banner-w3ls-4">
				</div>
			</li>
			<li class="prev">
				<div class="banner-w3ls-5">
				</div>
			</li>
		</ul>
		<ul class="pager">
			<li data-index="0" class="active"></li>
			<li data-index="1"></li>
			<li data-index="2"></li>
			<li data-index="3"></li>
			<li data-index="4"></li>
		</ul>
		<div class="banner-text-posi-w3ls">
			<div class="banner-text-whtree">
				<h3 class="text-capitalize text-white p-4">مستقبلك المشرق

					<b> !هي مهمتنا</b>
				</h3>
				<p class="px-4 py-3 text-dark">كن متخصصًا على أعلى مستوى بعد التخرج</p>
				<a href="{{route('frontend.about')}}" class="button-agiles text-capitalize text-white mt-sm-5 mt-4">المزيد</a>
			</div>
		</div>

		<!-- navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center" style='direction: rtl;'>
						<li class="nav-item active">
							<a class="nav-link text-white" href="{{route('frontend.index')}}">الرئيسية
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{route('frontend.about')}}">عنا</a>
						</li>
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Courses
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="language.html">Language</a>
								<a class="dropdown-item" href="communication.html">Communication</a>
								<a class="dropdown-item" href="business.html">Business</a>
								<a class="dropdown-item" href="software.html">Software</a>
								<a class="dropdown-item" href="social_media.html">Social Media</a>
								<a class="dropdown-item" href="photography.html">Photography</a>
								<a class="dropdown-item" href="course_details.html">Course Details</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="form.html">Apply Now</a>
							</div>
						</li> --}}
						{{-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="about.html">Instructors</a>
								<a class="dropdown-item" href="index.html">What We Do</a>
								<a class="dropdown-item" href="login.html">Login</a>
								<a class="dropdown-item" href="register.html">Register</a>
								<a class="dropdown-item" href="404.html">404 Page</a>
								<a class="dropdown-item" href="coming_soon.html">Coming Soon</a>
								<a class="dropdown-item" href="form.html">Admission Form</a>
								<a class="dropdown-item" href="faq.html">Faq</a>
							</div>
						</li> --}}
						<li class="nav-item">
							<a class="nav-link text-white" href="{{route('news.all')}}">المدونات</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link text-white" href="{{route('frontend.views')}}">قالوا عنا</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{route('frontend.gallery.categories')}}">معرض الصور</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="{{route('frontend.honoraryboard')}}">لوحة الشرف</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link text-white" href="{{route('frontend.contact')}}">تواصل معنا</a>
                        </li>

					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation -->
	</div>
    <!-- //banner -->

    @yield('content')

    @include('frontend.includes.footer')
