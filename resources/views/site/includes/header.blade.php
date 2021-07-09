<body class="">
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-top bg-theme-color-2 sm-text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget no-border m-0">
                            <ul class="list-inline">
                                <li class="m-0 pl-10 pr-10"> <i class="fas fa-phone text-white"></i> <a class="text-white" href="#">+20 1095925125</a> </li>
                                <li class="text-white m-0 pl-10 pr-10"> <i class="fas fa-history"></i> 24 Hours </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fas fa-envelope-open-text text-white"></i>  <a class="text-white" href="#">info@nuctc-academy.com</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 d-md-block d-none">
<p class="text-white" style="padding-top: 12px;">اكاديمية الاتحاد الوطني لاعداد القادة هي مركز للتدريب والتأهيل والتثقيف للوطن العربي</p>
                    </div>
                    <div class="col-md-3">
                        <div class="widget no-border m-0">
                            <ul class="list-inline text-right sm-text-center">

                                <li class="list-inline-item"><a href="https://www.facebook.com/%D8%A3%D9%83%D8%A7%D8%AF%D9%8A%D9%85%D9%8A%D8%A9-%D8%A7%D9%84%D8%A5%D8%AA%D8%AD%D8%A7%D8%AF-%D8%A7%D9%84%D9%88%D8%B7%D9%86%D9%8A-%D9%84%D8%A5%D8%B9%D8%AF%D8%A7%D8%AF-%D8%A7%D9%84%D9%82%D8%A7%D8%AF%D8%A9-108276178122132"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-google"></i></a></li>
{{--                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>--}}
                                <li>

                                    <a href="{{route('login')}}" class="text-white"> <i class="fas fa-sign-in-alt"></i>دخول</a>
                                </li>
{{--                                <li class="text-white">|</li>--}}
                                <li>
                                    <a href="{{route('register')}}" class="text-white"> <i class="fas fa-user-lock"></i>سجل الان</a>
                                </li>
                                <li>
                                    <a href="{{route('front.conference')}}" class="text-white"> تسجيل المؤتمر</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                <div class="container-fluid">
                    <nav id="menuzord-right" class="menuzord default">
                        <a class="menuzord-brand pull-left flip" href="/">
                                <img src="{{asset('site/images/logo.png')}}" class="logo">

</a>
                        <ul class="menuzord-menu">
                            <li class="active"><a href="/">الرئيسية</a>
                            </li>

                            <li><a href="#">إدارة الاكاديمية </a>
                                <ul class="dropdown">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('front.academypresid')}}">رئيس الاكاديمية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.Vismisvalues')}}">الرؤية والرساله والقيم</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.graduateStudies')}}">وكيل الاكاديمية للدراسات العليا والبحوث</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.Securityeducation')}}">وكيل الاكاديمية لتعليم الامني</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.qualityassurance')}}">وكيل الاكاديمية لضمان الجوده</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.Specildeducation')}}">وكيل الاكاديمية لتعليم المتخصص</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.internatRelation')}}">العلاقة الدولية والتعاون الاكاديميه</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.organizStructure')}}">الهيكل التنظيمي للاكاديمية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.academydis')}}">قرارات مجلس ادارة الاكاديمية</a></li>

                                </ul>
                            </li>
                               <li><a href="#">برامج الاكاديمية</a>
                                <ul class="dropdown">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('front.profesMaster')}}">ماجستير مهني</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.profesdoctor')}}">دكتوراه مهنية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.qualifigraduates')}}">تأهيل الخرجين</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.professcience')}}">العلوم المهنية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.electscience')}}">العلوم الالكترونية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.leadPreparation')}}">أعداد القادة</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.prepartechnicians')}}">أعداد الفنين</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.professoftware')}}">البرامج المهنية</a></li>

                                </ul>
                            </li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('front.securityconsulting')}}">أستشارات وخدمات امنيه</a></li>

                            <li class="nav-list__item"><a class='nav-link' href="{{route('front.distancelearning')}}">التعليم عن بعد</a></li>

                            <li><a href="#">شئون الطلاب </a>
                                <ul class="dropdown">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('front.stelecticgate')}}">البوابة الالكترونية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.activservices')}}"> الانشطة الطلابية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.studenthanbook')}}">دليل الطلاب</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.healthycare')}}">الرعايه الصحية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.stelectrservices')}}">الخدمات الالكترونيه</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.alumniAssociation')}}">رابطة الخرجين</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.expatrservice')}}">خدمات الوافدين</a></li>

                                </ul>
                            </li>
                               <li><a href="#">هيئة التدريس</a>
                                <ul class="dropdown">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('front.techlectic')}}">البوابة الالكترونية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.teachguids')}}">دليل أعضاء هيئة التدريس</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.treandeveop')}}">التدريب والتطوير</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.techeraciveservice')}}">الخدمات الالكترونية</a></li>

                                </ul>
                            </li>
                               <li><a href="#">المركز الاعلامي</a>
                                <ul class="dropdown">
                                    <li class="nav-list__item"><a class='nav-link'  href="{{route('front.newsletters')}}">النشرات الدورية</a> </li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.Juvenile')}}">الاحداث</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.presreleases')}}">البيانات الصحفية</a></li>
                                    <li class="nav-list__item"><a class='nav-link' href="{{route('front.photogaphy')}}">معرض الصور</a></li>

                                </ul>
                            </li>
                            <li><a href="#">الجوده</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('front.Qualityassura')}}">أهداف وحده ضمان الجوده</a></li>
                                    <li><a href="{{route('front.questionnaire')}}">أستبيان </a></li>
                                    <li><a href="{{route('front.complaint')}}">تقديم شكوي</a></li>
                                </ul>
                            </li>
                            <li class="nav-list__item"><a class='nav-link' href="{{route('front.contact')}}">تواصل معنا</a></li>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Start main-content -->
