@extends('frontend.layouts.base')

@section('content')
<!-- about -->
<div class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">مرحبا بك في
            <span class="font-weight-bold">الاكاديمية</span>
        </h3>
        <div class="row pt-md-4">
            <div class="col-lg-6 about_right">
                <h3 class="text-capitalize text-right font-weight-light font-italic">واجهة سهلة التعلم في
                    <span class="font-weight-bold">الاكاديمية</span>
                </h3>
                <p class="text-right my-4 pr-4 border-right">{{settings()->about_us}}</p>
                <div class="about_left-list">
                    <h6 class="mb-lg-3 mb-2 font-weight-bold text-dark">ميزاتنا</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>دروس أون لاين</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>أسعار مميزة</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>جودة عالية</li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-6 left-img-agikes mt-lg-0 mt-sm-4 mt-3 text-right">
                <img src="{{asset('site/images/ab.jpg')}}" alt="" class="img-fluid" />

                <div class="about-bottom text-center p-sm-5 p-4">
                    <ul>
                        <li>
                            <h5>60+</h5>
                            <p class="text-dark font-weight-bold">مدرس</p>
                        </li>
                        <li>
                            <h5>2000+</h5>
                            <p class="text-dark font-weight-bold">طالب</p>
                        </li>
                        <li>
                            <h5>80+</h5>
                            <p class="text-dark font-weight-bold">كورس</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //about -->


<!-- Stats-->
<div class="stats-w3layouts py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="stats-info">
            <div class="row">
                <div class="col-md-3 col-6 stats-grid-w3-agile text-center px-xl-5 px-3">
                    <div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='1280' data-delay='.5' data-increment="1">1280</div>
                    <p class="text-uppercase text-white border-top pt-4 mt-3">الطلاب</p>
                </div>
                <div class="col-md-3 col-6 stats-grid-w3-agile text-center  px-xl-5 px-3">
                    <div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='920' data-delay='.5' data-increment="1">920</div>
                    <p class="text-uppercase text-white border-top pt-4 mt-3">كورسات معتمدة</p>
                </div>
                <div class="col-md-3 col-6 stats-grid-w3-agile text-center mt-md-0 mt-5  px-xl-5 px-3">
                    <div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='1200' data-delay='.5' data-increment="1">1200</div>
                    <p class="text-uppercase text-white border-top pt-4 mt-3">مدرسين معتمدين</p>
                </div>
                <div class="col-md-3 col-6 stats-grid-w3-agile text-center mt-md-0 mt-5  px-xl-5 px-3">
                    <div class='numscroller font-weight-bold my-2' data-slno='1' data-min='0' data-max='1200' data-delay='.5' data-increment="1">1200</div>
                    <p class="text-uppercase text-white border-top pt-4 mt-3">خريجين</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Stats -->

<!-- course-->
{{-- <div class="classes py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">choose your
            <span class="font-weight-bold">course</span>
        </h3>
        <div class="row pt-4">
            <div class="col-lg-4 col-news-top text-center">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="language.html">
                        <div class="img">
                            <img src="images/c1.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">language</h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="language.html" class="text-dark">language
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
            <div class="col-lg-4 col-news-top text-center my-lg-0 my-sm-5 my-4">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="communication.html">
                        <div class="img">
                            <img src="images/c2.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">communication</h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="communication.html" class="text-dark">communication
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
            <div class="col-lg-4 col-news-top text-center">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="business.html">
                        <div class="img">
                            <img src="images/c3.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">business</h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="business.html" class="text-dark">business
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-news-top text-center">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="software.html">
                        <div class="img">
                            <img src="images/c4.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">software</h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="software.html" class="text-dark">software
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
            <div class="col-lg-4 col-news-top text-center  my-lg-0 my-sm-5 my-4">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="social_media.html">
                        <div class="img">
                            <img src="images/c6.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">social media </h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="social_media.html" class="text-dark">social media
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
            <div class="col-lg-4 col-news-top text-center">
                <!-- Left to right -->
                <!-- normal -->
                <div class="ih-item circle effect16 left_to_right mx-auto">
                    <a href="photography.html">
                        <div class="img">
                            <img src="images/c5.jpg" alt="img" class="img-fluid rounded-circle">
                        </div>
                        <div class="info">
                            <h3 class="text-capitalize text-white">photography </h3>
                            <p>Description goes here</p>
                        </div>
                    </a>
                </div>
                <h6 class="small-heading text-capitalize text-center mt-4">
                    <a href="photography.html" class="text-dark">photography
                        <i class="fas fa-long-arrow-alt-right ml-1"></i>
                    </a>
                </h6>
                <!-- end normal -->
                <!-- end Left to right -->
            </div>
        </div>
    </div>
</div> --}}
<!-- //course -->

@include('frontend.includes.working_process')

	<!-- what we do -->
	<div class="why-choose-agile py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-white text-center mb-5">ماذا
				<span class="font-weight-bold">نقدم</span>
			</h3>
			<div class="row agileits-w3layouts-grid pt-md-4">
				<div class="col-lg-4 services-agile-1">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="fab fa-accusoft"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">التعليم الخاص</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 services-agile-1 my-lg-0 my-5">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="fas fa-book"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">محاضرات طوال اليوم</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 services-agile-1">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">محاضرين مؤهلين</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row agileits-w3layouts-grid mt-5">
				<div class="col-lg-4 services-agile-1">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="far fa-calendar-alt"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">احداث</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 services-agile-1  my-lg-0 my-5">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="fas fa-graduation-cap"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">فصول تحضيرية</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 services-agile-1">
					<div class="row wthree_agile_us">
						<div class="col-lg-3 col-md-2 col-3  agile-why-text">
							<div class="wthree_features_grid text-center p-3 border rounded">
								<i class="far fa-clock"></i>
							</div>
						</div>
						<div class="col-9 agile-why-text-2">
							<h4 class="text-capitalize text-white font-weight-bold mb-3">دعم 24 ساعة</h4>
							<p></p>
							<a class="btn mt-3 service-button p-0" href="#" role="button">المزيد
								<i class="fas fa-long-arrow-alt-right ml-1"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- //what we do -->

	<!-- video and events -->
	<div class="video-choose-agile py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="row">
				<div class="col-lg-7 video">
					<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">
						<span class="font-weight-bold">فيديو توضيحي</span>
					</h3>
					<iframe src="https://player.vimeo.com/video/58123228"></iframe>
				</div>
				<div class="col-lg-5 events">
					<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5"> الاحداث
						<span class="font-weight-bold">القادمة</span>
					</h3>
					<div class="events-w3ls">
						<div class="d-flex">
							<div class="col-sm-2 col-3 events-up p-3 text-center">
								<h5 class="text-white font-weight-bold">28
									<span class="border-top font-weight-light pt-2 mt-2">مايو</span>
								</h5>
							</div>
							<div class="col-sm-10 col-9 events-right">
								<h4 class="text-dark">معرض القبول  </h4>
								<ul class="list-unstyled">
									<li class="my-2">
										<i class="far fa-clock mr-2"></i>5.00 مساءا - 7.30 مساءا</li>
									<li>
										<i class="fas fa-map-marker mr-2"></i>25 مدينة نصر</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-10 col-9 events-right">
                        <h4 class="text-dark">معرض القبول  </h4>
                        <ul class="list-unstyled">
                            <li class="my-2">
                                <i class="far fa-clock mr-2"></i>5.00 مساءا - 7.30 مساءا</li>
                            <li>
                                <i class="fas fa-map-marker mr-2"></i>25 مدينة نصر</li>
                        </ul>
                    </div>
					<div class="col-sm-10 col-9 events-right">
                        <h4 class="text-dark">معرض القبول  </h4>
                        <ul class="list-unstyled">
                            <li class="my-2">
                                <i class="far fa-clock mr-2"></i>5.00 مساءا - 7.30 مساءا</li>
                            <li>
                                <i class="fas fa-map-marker mr-2"></i>25 مدينة نصر</li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- //video and events -->


    <!-- testimonials -->
	<div class="testimonials py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-white text-center mb-5">أراء طلابنا
				{{-- <span class="font-weight-bold">people says</span> --}}
			</h3>
			<div class="mis-stage">
				<!-- The element to select and apply miSlider to - the class is optional -->
				<ol class="mis-slider">
					<!-- The slider element - the class is optional -->
                    @foreach ($testimonials as $testimonial)
                    <li class="mis-slide">
						<!-- A slide element - the class is optional -->
						<a href="#" class="mis-container">
							<!-- A slide container - this element is optional, if absent the plugin adds it automatically -->
							<figure>
								<!-- Slide content - whatever you want -->
								<img src="images/t1.jpg" alt=" " class="img-fluid" />
								<figcaption>{{$testimonial->name}}
									<span>{{$testimonial->view}}</span>
								</figcaption>
							</figure>
						</a>
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
	<!-- //testimonials -->

    	<!-- news -->
	<div class="news-section py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">اخر
				<span class="font-weight-bold">اخبارنا</span>
			</h3>
			<div class="row news-grids-w3l pt-md-4">
				<div class="col-md-4 news-grid">
					<a href="blog.html">
						<img src="images/n1.jpg" class="img-fluid" alt="" />
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo1 py-2 px-3">
							<h5 class="float-left">
								<a href="blog.html" class="text-white">07 مايو</a>
							</h5>
							<div class="post-img float-right">
								<ul>
									<li>
										<a href="#">
											<i class="far fa-comments text-white"></i>
										</a>
									</li>
									<li class="mx-3">
										<a href="#">
											<i class="far fa-heart text-white"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fas fa-share text-white"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="detail-bottom">
							<h6 class="my-3">
								<a href="#" class="text-dark">
									عنوان الخبر
								</a>
							</h6>
							<p>خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة </p>
						</div>
					</div>
				</div>
				<div class="col-md-4 news-grid my-md-0 my-sm-5 my-4">
					<a href="#">
						<img src="images/n2.jpg" class="img-fluid" alt="" />
					</a>
					<div class="news-text">
						<div class="news-events-agile py-2 px-3">
							<h5 class="float-left">
								<a href="blog.html" class="text-white">07 مايو</a>
							</h5>
							<div class="post-img float-right">
								<ul>
									<li>
										<a href="#">
											<i class="far fa-comments text-white"></i>
										</a>
									</li>
									<li class="mx-3">
										<a href="#">
											<i class="far fa-heart text-white"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fas fa-share text-white"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="detail-bottom">
							<h6 class="my-3">
								<a href="blog.html" class="text-dark">
                                    عنوان الخبر
								</a>
							</h6>
							<p>خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 news-grid">
					<a href="blog.html">
						<img src="images/n3.jpg" class="img-fluid" alt="" />
					</a>
					<div class="news-text">
						<div class="news-events-agile event-colo3 py-2 px-3">
							<h5 class="float-left">
								<a href="blog.html" class="text-white">07 مايو</a>
							</h5>
							<div class="post-img float-right">
								<ul>
									<li>
										<a href="#">
											<i class="far fa-comments text-white"></i>
										</a>
									</li>
									<li class="mx-3">
										<a href="#">
											<i class="far fa-heart text-white"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fas fa-share text-white"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="detail-bottom">
							<h6 class="my-3">
								<a href="blog.html" class="text-dark">
									عنوان الخبر
								</a>
							</h6>
							<p>خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //news -->


@endsection
