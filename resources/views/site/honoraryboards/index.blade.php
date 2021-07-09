@extends('frontend.layouts.base')

@section('title') لوحة الشرف @stop


@section('content')

 <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-heading wow fadeInDown" data-wow-deuration="1s" data-wow-delay=".2s">
                        <h2>
                            <small>لوحة الشرف</small>
                            طلابنا <span>المميزين</span>
                        </h2>
                        <span class="animate-border ml-auto mr-auto tw-mt-20 tw-mb-40"></span>
                    </div>
                </div>
                <!-- COl End -->
            </div>
            <div class="row">
                    @foreach ($honoraryboards as $student)
                   <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                      <div class="tw-case-study-box">
                         <div class="case-img study-bg-1">
                            <img src="{{$student->image}}" alt="" class="img-fluid">
                         </div>
                         <!-- End case img -->
                         <div class="casestudy-content">
                               <h4>{{$student->name}}</h4>
                            <p class="text-dark">{{$student->major}}/{{$student->university}}</p>
                            <p class="text-dark">العلامة:&nbsp;{{$student->marker}}</p>
                            <p class="text-dark">
                                <a target="_blank" href="{{$student->interview_url}}" class="text-primary">مقابلة الطالب</a>
                            </p>
                            <hr>
                         </div>
                         <!-- End case study content -->
                      </div>
                      <!-- End case study box -->
                   </div>
                   @endforeach
         
                  
                </div>

           <div class="row">
               <div class="col-12">
                   {{$honoraryboards->links()}}
               </div>
           </div>

        </div>
        <!-- Container End -->
     </section>
@stop
{{-- @section('content')
<div class="regular">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="regular_content">
                        <div class="regular_title text-center">لوحة الشرف</div>
                        <div class="row mt-5">
                            @foreach ($honoraryboards as $student)
                            <div class="col col-lg-6 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{$student->image}}" alt="Card image cap" width="440px" height="247px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="text-center mb-4">{{$student->name}}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title float-md-left">المدرسة\الجامعة:</h5>
                                                <span class="float-md-right text-dark">{{$student->university}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title float-md-left">الفرع:</h5>
                                                <span class="float-md-right text-dark">{{$student->major}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title float-md-left">العلامة:</h5>
                                                <span class="float-md-right text-dark">{{$student->marker}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title float-md-left">سنة التخرج:</h5>
                                                    <span class="float-md-right text-dark">{{$student->year}}</span>
                                                </div>
                                            </div>
                                        <div class="text-center mt-3">
                                            <a href="{{$student->interview_url}}" target="_blank" class="btn btn-outline-primary btn-block">رابط المقابلة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$honoraryboards->links()}}
                    </div>
				</div>
			</div>
		</div>
	</div>
@stop --}}
