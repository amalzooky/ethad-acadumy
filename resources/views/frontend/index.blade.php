{{--@extends('frontend.layouts.base')--}}

@section('content')
    {{ dd($sliders) }}

    <div class="container-fluid">
        <div class="row">
            <div id="sg-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1" class=""></li>
                    <li data-target="#carousel" data-slide-to="2" class=""></li>
                    <li data-target="#carousel" data-slide-to="3" class=""></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner carousel-zoom">
{{--                    @foreach ($sliders as $key => $slide)--}}

                    <div class="item {{$key == 0 ? 'active' : '' }}"><img class="img-responsive" src="{{asset('dashboard')}}/{{$slide->image}}" alt="">
                        <div class="carousel-caption">
                            <h1  data-animation="animated zoomInLeft" class="cap-txt ">{{$slide->title}}</h1>
                            <p data-animation="animated bounceInDown" style="color: #000000;">{{$slide->desc}}</p>
                            <button data-animation="animated bounceInUp" class="button button--tamaya button--border-thick" data-text="Send"><span>Send</span></button>
                        </div>
                    </div>
                    @endforeach

                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#sg-carousel" data-slide="prev">‹</a>
                    <a class="carousel-control right" href="#sg-carousel" data-slide="next">›</a>
                </div>
            </div>
        </div>
<!-- banner section -->

<!-- /banner section -->


<!-- info section -->
<section class="info-w3l" id="info" data-aos="zoom-in">

	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree1">

		<div class="col-xs-2">
			<i class="fa fa-university" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>ميثاق الشرف</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra. Nullam gravida est et leo malesuada, at mattis nibh placerat.</p>
			</div>
		</div>

		<div class="clearfix"></div>
		<hr>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree2">

		<div class="col-xs-2">
			<i class="fa fa-certificate" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>الرساله 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra. Nullam gravida est et leo malesuada, at mattis nibh placerat.</p>
			</div>
		</div>

		<div class="clearfix"></div>
		<hr>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 info-wthree3">

		<div class="col-xs-2">
			<i class="fa fa-cogs" aria-hidden="true"></i>
		</div>
		<div class="col-xs-10">
			<div class="info-agile">
				<h3>الرؤية</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra. Nullam gravida est et leo malesuada, at mattis nibh placerat.</p>
			</div>
		</div>

		<div class="clearfix"></div>
		<hr>
	</div>

	<div class="clearfix"></div>
</section>
<!-- /info section -->


<!-- services section -->
<section class="service-w3l" id="service">
	<div class="container">
		<div class="row">
		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="col-xs-4 serv-agile1" data-aos="flip-up">
				<i class="fa fa-cog" aria-hidden="true"></i>
				<h4>دروس أون لاين</h4>
				<p class="serv-p2">عن طريق التعليم الإلكتروني ,حيث يتمكن الطلبة من المشاركة الفاعلة مع المدرسين في بث حي ومباشر يوميا , حيث بإمكان الطلبة الاستفسار عن اي معلومة والنقاش مع المدرس ومع بعضهم البعض.</p>
			</div>
			<div class="col-xs-4 serv-agile2" data-aos="flip-up">
				<i class="fa fa-book" aria-hidden="true"></i>
				<h4>جودة عالية</h4>
				<p class="serv-p2">نمتاز بإمتلاكنا تقينات صوتية ومرئية عالية الجودة من خلال إمتلاكنات لأفضل البرمجيات في هذا المجال وبإمكان الطلبة الاستفادة من خبرات الاخرين والالتقاء مع زملاء لهم من كل مكان دون حواجز جغرافية او أي معيقات.</p>
			</div>
			<div class="col-xs-4 serv-agile3" data-aos="flip-up">
				<i class="fa fa-shield" aria-hidden="true"></i>
				<h4>أسعار مميزة</h4>
				<p class="serv-p2">تقدم اكاديمية الاتحاد الوطني الخدمات التعليمية بأسعار مميزه  ليوفر على طلبته عناء التنقل للمراكز والتي يترتب عليها المصاريف الباهضة وهدر الوقت, ويوفر لهم بيئة تعليمية امنة ومريحة حيث يتلقون الدروس من داخل بيوتهم دون عناء يذكر.</p>
			</div>
			{{-- <div class="clearfix"></div>
			<div class="col-xs-4 serv-agile4" data-aos="flip-up">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
				<h4>Tortor Feugiat</h4>
				<p class="serv-p2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra.</p>
			</div>
			<div class="col-xs-4 serv-agile5" data-aos="flip-up">
				<i class="fa fa-flask" aria-hidden="true"></i>
				<h4>Luctus Pharetra</h4>
				<p class="serv-p2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra.</p>
			</div>
			<div class="col-xs-4 serv-agile6" data-aos="flip-up">
				<i class="fa fa-database" aria-hidden="true"></i>
				<h4>Nullam Gravida</h4>
				<p class="serv-p2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed tortor feugiat nisl luctus pharetra.</p>
			</div>
			 <div class="clearfix"></div> --}}
		</div>
        <div class="col-lg-4 col-md-12 col-sm-12" data-aos="flip-up">
			<h3>خدمات تعليمية وبحثية</h3>
            <span class="title-line">
            </span>
			<p class="serv-p1"></p>
		</div>
            {{-- </div>
		<div class="clearfix"></div>
	</div> --}}
</section>
<!-- /services section -->


<!-- about section -->
<section class="about-agileits" id="about">
	<div class="container">
            		<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-12 about-w3ls1" data-aos="zoom-in">
			<div class="hover01 column">
				<div>
					<figure>
						<img src="{{asset('site/images/about-img.jpg')}}" alt="" class="img-responsive">
					</figure>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 about-w3ls2" data-aos="zoom-in">
			<div class="about-w3l">
				<h3><span class="fa fa-diamond" aria-hidden="true"></span> أكاديمية الاتحاد الوطني</h3>
                 <span class="title-line">
            </span>
				<p> أكاديمية الاتحاد الوطني هي اكاديمية مصريه خاصه بلاتحاد الوطني لكافحة الارهاب والفساد ودعم مؤسسات الدوله</p>
				<p> أكاديمية الاتحاد الوطني هي اكاديمية مصريه خاصه بلاتحاد الوطني لكافحة الارهاب والفساد ودعم مؤسسات الدوله</p>
				<p> أكاديمية الاتحاد الوطني هي اكاديمية مصريه خاصه بلاتحاد الوطني لكافحة الارهاب والفساد ودعم مؤسسات الدوله</p>
				<ul class="about-links">
					<li><a href="#" class="about-link1" data-toggle="modal" data-target="#largeModal">Read More</a></li>
					<li><a href="#" class="about-link2">Download</a></li>
				</ul>
			</div>
		</div>
        </div>
		<div class="clearfix"></div>
	</div>
	<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title w3-agileits agileits-w3layouts w3layouts">من نحن</h4>
				</div>
				<div class="modal-body">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<img src="{{asset('site/images/about-img.jpg')}}" alt="" class="img-responsive">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<p class="news-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pharetra laoreet aliquet. Sed tristique ex lectus, ut maximus ipsum tempus a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porttitor eros quis leo bibendum, eu bibendum ligula malesuada.</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /about section -->
        <section class="staff-agileinfo" id="team">
            <div class="container">
                <h3 class="text-center">أعضاء هيئة التدريس</h3>
                <span class="title-line">
            </span>

        <div class="container">
            <div class="row blog">
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">


                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 team-agile1" data-aos="flip-up">
                                        <div class="view view-eighth">
                                            <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                                            <div class="mask">
                                                <h4>Elizabeth</h4>
                                                <ul class="team-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                                <p class="info">Chairman</p>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
        </div>
            </div>
        </section>
<!-- Staff section  -->
<section class="staff-agileinfo" id="team">
	<div class="container">
		<h3 class="text-center">أعضاء هيئة التدريس</h3>
         <span class="title-line">
            </span>
        <div class="container">
            <div class="row blog">
                <h1>
                    <div class="animated fadeInLeft">NOS EXPERTS</div><div class="animated fadeInRight">SCIENTIFIQUES</div>
                </h1>
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dana ROBINSON</h3>
                                                <span class="post">Marketing Consultant</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dr. Bernard COVA</h3>
                                                <span class="post">Marketing - Auteur</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dr. Francis Guilbert</h3>
                                                <span class="post">Docteur - Chercheur</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dr. Georges WANET</h3>
                                                <span class="post">Docteur</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Ted SICHELMAN</h3>
                                                <span class="post">Law expert</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dr. Noël ALBERT</h3>
                                                <span class="post">Marketing Consultant</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Dr. Saverio TOMASELLA</h3>
                                                <span class="post">Auteur et Chercheur - Brand Psychoanalysis</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="our-team">
                                            <div class="pic">
                                                <img src="https://i.ibb.co/L8Pj1mg/o6EuTCT6.jpg">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">Ray BENEDICKTUS</h3>
                                                <span class="post">Experienced Marketing Consultant</span>
                                            </div>
                                            <ul class="social">
                                                <li>
                                                    <a href="#" class="fa fa-envelope"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
        </div>
            		<div class="row">

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 team-agile1" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="{{asset('site/images/team-img1.jpg')}}" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Elizabeth</h4>
					<ul class="team-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
                    <p class="info">Chairman</p>
                </div>
            </div>
		</div>



		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 team-agile2" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="{{asset('site/images/team-img2.jpg')}}" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>James Cameron</h4>
					<ul class="team-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
                    <p class="info">Director</p>
                </div>
            </div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 team-agile3" data-aos="flip-up">
			<div class="view view-eighth">
                <img src="{{asset('site/images/team-img3.jpg')}}" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Max Payne</h4>
                    <ul class="team-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
                    <p class="info">Manager</p>
                </div>
            </div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 team-agile4" data-aos="flip-up">

			<div class="view view-eighth">
                <img src="{{asset('site/images/team-img4.jpg')}}" alt="" class="img-responsive"/>
                <div class="mask">
                    <h4>Stephen John</h4>
                    <ul class="team-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
                    <p class="info">Secretary</p>
                </div>
            </div>
		</div>
        </div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /Staff section -->


<!-- subscribe section -->

<section class="subs jarallax">
	<div class="container">
            		<div class="row">

		<div class="col-lg-12 col-md-6 subs-w3ls1" data-aos="zoom-in">
			<h3>أخر الاخبار</h3>
             <span class="title-line">
            </span>

		</div>
		<div class="col-lg-12 col-md-6 subs-w3ls1" data-aos="zoom-in">
			<div class="container content">
   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
         <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          @foreach ($allNews as $key => $all)

          <div class="item {{$key == 0 ? 'active' : '' }}">

            <div class="row">
               <div class="col-xs-12">
                  <div class="thumbnail adjust1">

                     <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="caption">
                           <p class="text-info lead adjust2">{{$all->title}}</p>
                           <p><span class="glyphicon glyphicon-thumbs-up"></span>{!!$all->description  !!}</p>
                           <blockquote class="adjust2">
{{--                              <p>{{$all->name}}</p>--}}

                           </blockquote>
                        </div>
                     </div><div class="col-md-2 col-sm-2 col-xs-12"> <img class="media-object img-rounded img-responsive" src="{{$all->image}}"> </div>
                  </div>
               </div>
            </div>
         </div>
          @endforeach
{{--         <div class="item">--}}
{{--            <div class="row">--}}
{{--               <div class="col-xs-12">--}}
{{--                  <div class="thumbnail adjust1">--}}

{{--                     <div class="col-md-10 col-sm-10 col-xs-12">--}}
{{--                        <div class="caption">--}}
{{--                           <p class="text-info lead adjust2">تكريم الامين العام</p>--}}
{{--                           <p><span class="glyphicon glyphicon-thumbs-up"></span> ثناء تكريم أمين محافظة الدقهلية المهندس عبد الحميد حسن للأمين العام للاتحاد الوطني العقيد اركان حرب رامي الشماخ أثناء زيارة سيادته لمحافظة الدقهلية وذلك نظر ا لدعمه المستمر لأبناء المحافظة كل التحية والتقدير للقائد الخلوق العقيد رامي الشماخ الذي طالما ساند المحافظة بالدعم والمشوري--}}
{{--وكان ذلك بحضور سيادة المستشار محمد الانصاري مستشار قطاعات حقوق  الإنسان للاتحاد الوطني</p>--}}
{{--                           <blockquote class="adjust2">--}}
{{--                              <p>الامين العام لاتحاد</p>--}}

{{--                           </blockquote>--}}
{{--                        </div>--}}
{{--                     </div>--}}
{{--                       <div class="col-md-2 col-sm-2 col-xs-12">--}}
{{--                         <img class="media-object img-rounded img-responsive" src="{{asset('site/images/tk.jpg')}}"> </div>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </div>--}}
{{--         <div class="item">--}}
{{--            <div class="row">--}}
{{--               <div class="col-xs-12">--}}
{{--                  <div class="thumbnail adjust1">--}}

{{--                     <div class="col-md-10 col-sm-10 col-xs-12">--}}
{{--                        <div class="caption">--}}
{{--                           <p class="text-info lead adjust2">كلمة الرئيس عبدالفتاح</p>--}}
{{--                           <p><span class="glyphicon glyphicon-thumbs-up"></span> ثناء تكريم أمين محافظة الدقهلية المهندس عبد الحميد حسن للأمين العام للاتحاد الوطني العقيد اركان حرب رامي الشماخ أثناء زيارة سيادته لمحافظة الدقهلية وذلك نظر ا لدعمه المستمر لأبناء المحافظة كل التحية والتقدير للقائد الخلوق العقيد رامي الشماخ الذي طالما ساند المحافظة بالدعم والمشوري--}}
{{--وكان ذلك بحضور سيادة المستشار محمد الانصاري مستشار قطاعات حقوق  الإنسان للاتحاد الوطني</p>--}}
{{--                           <blockquote class="adjust2">--}}
{{--                              <p>الامين العام</p>--}}

{{--                           </blockquote>--}}
{{--                        </div>--}}
{{--                     </div>--}}
{{--                                           <div class="col-md-2 col-sm-2 col-xs-12"> <img class="media-object img-rounded img-responsive" src="{{asset('site/images/sis.jpg')}}"> </div>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--            </div>--}}
{{--         </div>--}}

      </div>
      <!-- Controls --> <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
   </div>
</div>
		<div class="clearfix"></div>
	</div>
        </div>
    </div>
    </section>
<!-- /subscribe section -->



<!-- Portfolio section -->
<section class="portfolio-agileinfo" id="portfolio">
	<h3 class="text-center">المعرض</h3>
     <span class="title-line">
            </span>

</section>
<!-- /Portfolio section -->



<!-- contact section -->
<section class="contact-wthree jarallax" id="contact">
	<div class="container">
		<h3 class="text-center">أرسل أستفسارك</h3>
            		<div class="row">

		<div class="col-lg-2 col-md-2 col-sm-2" data-aos="zoom-in">
			<img src="{{asset('site/images/contact-img1.jpg')}}" alt="" class="img-circle img-responsive">
		</div>
        </div>
<!--
		<div class="col-lg-10 col-md-10 col-sm-10" data-aos="zoom-in">
			<h4>Be In Touch With Us</h4>
			<p class="contact-agile">We are always available</p>
		</div>
-->
<!--
		<div class="col-lg-12" data-aos="zoom-in">
			<ul class="contact-info">
				<li>
					<i class="fa fa-phone-square" aria-hidden="true"></i>
					<p class="contact-p1">321 7654 000098</p>
					<p class="contact-p2">123 4567 890000</p>
				</li>
				<li>
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<p class="contact-p1"><a href="mailto:mail1@example.com">mail1@example.com</a></p>
					<p class="contact-p2"><a href="mailto:mail2@example.com">mail2@example.com</a></p>
				</li>
				<li>
					<i class="fa fa-address-book" aria-hidden="true"></i>
					<p class="contact-p1">77 Jack Street,</p>
					<p class="contact-p2">Chicago, USA.</p>
				</li>
			</ul>
		</div>
-->
		<div class="clearfix"></div>
		<form action="#" method="post" name="sentMessage" id="contactForm" novalidate>

			    		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>البريد الالكتروني:</label>
                        <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                    </div>
                </div>
			</div>
            <div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">
                <div class="control-group form-group">
					<div class="controls">
                        <label>رقم التليفون:</label>
						<input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                </div>
			</div>
              <div class="col-lg-4 col-md-4 col-sm-4" data-aos="zoom-in">
				<div class="control-group form-group">
                    <div class="controls">
                        <label>الاسم</label>
                        <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                    </div>
				</div>
			</div>
            </div>
			<div class="clearfix"></div>
                		<div class="row">

			<div class="col-lg-12" data-aos="zoom-in">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>الرساله:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
					</div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
			</div>
            </div>
                		<div class="row">

			<div class="col-lg-12" data-aos="zoom-in">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
            </div>
			<div class="clearfix"></div>
		</form>
	</div>
</section>
<!-- /contact section -->
<!-- map section -->
<div class="map" data-aos="zoom-in">
	<iframe class="googlemaps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d380510.6741687111!2d-88.01234121699822!3d41.83390417061058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1455598377120" style="border:0" allowfullscreen></iframe>
</div>
<!-- /map section -->


@endsection
