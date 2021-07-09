<!DOCTYPE HTML>
<html lang="ar" dir="rtl">
    <head>
<title>أكاديمية الاتحاد الوطني </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="أكاديمية الاتحاد الوطني " />
<!-- fonts -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous">-->
{{--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

<link href="{{asset('site/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{asset('site/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('site/css/footer-pic.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('site/css/jQuery.lightninBox.css')}}" rel="stylesheet" type="text/css" media="all" />
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionic/1.3.2/css/ionic.css">--}}
        <!-- carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link href="{{asset('site/css/staff.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('site/css/aos.css')}}" rel='stylesheet prefetch' type="text/css" media="all" />
<link href="{{asset('site/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
{{--<link href="{{asset('site/css/pages.css')}}" rel="stylesheet" type="text/css" media="all"/>--}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">
<!-- /css files -->
</head>

<body>
	<!-- header -->

    <div class="top-bar">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 d-md-block d-none">
                    <p> dkstudioin@gmail.com</p>
                </div>
                <div class="col-md-4 d-md-block d-none">
                    <p>أكاديمية الاتحاد الوطني</p>
                </div>
                <div class="col-md-5">
                    <div class="d-flex justify-content-md-end justify-content-between">

                        <div class="login">

                            <a href="{{route('login')}}"  class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">تسجيل </span></a>
                            <a href="{{route('register')}}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">تسجيل دخول</span></a></div>
                        <ul class="social-custom list-inline">

                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-wrapper navbar-me">
        <div class="kkkkkk ">
                        <nav class="navbar navbar-inverse navbar-static-top">
            <header>
                <div class="nav-brand">
                    <a class="navbar-brand" href="{{url('/')}}">
                                        <img src="{{asset('site/images/logo.png')}}" class="logo">
                                        </a>
                </div>

                <div class="nav-collapse">
                    <nav role="navigation">
                        <ul class="nav-list" id="collapse" >
                            <li class="nav-list__item active"><a class='nav-link' href="/">الرئيسية</a></li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">أدارة الاكاديمية </a>
                                <ul class="dropdown-menu ">


                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.academypresid')}}">رئيس الاكاديمية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.Vismisvalues')}}">الرؤية والرساله والقيم</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.graduateStudies')}}">وكيل الاكاديمية للدراسات العليا والبحوث</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.Securityeducation')}}">وكيل الاكاديمية لتعليم الامني</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.qualityassurance')}}">وكيل الاكاديمية لضمان الجوده</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.Specildeducation')}}">وكيل الاكاديمية لتعليم المتخصص</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.internatRelation')}}">العلاقة الدولية والتعاون الاكاديميه</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.organizStructure')}}">الهيكل التنظيمي للاكاديمية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.academydis')}}">قرارات مجلس ادارة الاكاديمية</a></li>

                                </ul>
                            </li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"> برامج الاكاديمية </a>
                                <ul class="dropdown-menu ">
                            <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.profesMaster')}}">ماجستير مهني</a> </li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.profesdoctor')}}">دكتوراه مهنية</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.qualifigraduates')}}">تأهيل الخرجين</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.professcience')}}">العلوم المهنية</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.electscience')}}">العلوم الالكترونية</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.leadPreparation')}}">أعداد القادة</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.prepartechnicians')}}">أعداد الفنين</a></li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.professoftware')}}">البرامج المهنية</a></li>

                                </ul>
                            </li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.securityconsulting')}}">أستشارات وخدمات امنيه</a></li>

                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.distancelearning')}}">التعليم عن بعد</a></li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">  شؤن الطلاب </a>
                                <ul class="dropdown-menu ">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.stelecticgate')}}">البوابة الالكترونية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.activservices')}}"> الانشطة الطلابية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.studenthanbook')}}">دليل الطلاب</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.healthycare')}}">الرعايه الصحية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.stelectrservices')}}">الخدمات الالكترونيه</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.alumniAssociation')}}">رابطة الخرجين</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.expatrservice')}}">خدمات الوافدين</a></li>

                                </ul>
                            </li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">   هئية التدريس </a>
                                <ul class="dropdown-menu ">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.techlectic')}}">البوابة الالكترونية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.teachguids')}}">دليل أعضاء هيئة التدريس</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.treandeveop')}}">التدريب والتطوير</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.techeraciveservice')}}">الخدمات الالكترونية</a></li>


                                </ul>
                            </li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">  المركز الاعلامي </a>
                                <ul class="dropdown-menu ">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.newsletters')}}">النشرات الدورية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.Juvenile')}}">الاحداث</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.presreleases')}}">البيانات الصحفية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.photogaphy')}}">معرض الصور</a></li>


                                </ul>
                            </li>
                            <li class=" nav-list__item dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">  الجوده</a>
                                <ul class="dropdown-menu ">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('frontend.Qualityassura')}}">أهداف وحده ضمان الجوده</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.questionnaire')}}">أستبيان</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.complaint')}}">تقديم شكوي</a></li>
                                </ul>
                            </li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('frontend.contact')}}">تواصل معنا</a></li>

                        </ul>
                    </nav>
                </div>



                <div class="nav-toggle">
                    <a class="btn--toggle nav-link" href="#" data-target="#collapse">
                        <i class="fa fa-bars fa-fw"></i>
                    </a>
                </div>

            </header>

                        </nav>
        </div>

    </div>



    @yield('content')

    @include('frontend.includes.footer')
