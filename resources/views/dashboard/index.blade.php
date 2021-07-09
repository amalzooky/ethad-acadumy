@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.dashboard_title') @endsection

@if (auth()->user()->hasRole("student"))
  @section('css')
  <link rel="stylesheet" href="{{asset('dashboard/assets/css/students_news.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/assets/css/calculator.css')}}">
  @stop
@endif

@section('content')
    <div class="page-header">
        @if(!auth()->user()->hasRole("student"))
        <h1 class="page-title">
            @lang('dashboard.dashboard_title')
        </h1>
        @else
        <h1 class="page-title">
            الصفحة الرئيسية
        </h1>
        @endif
    </div>

    @if (auth()->user()->hasRole("student"))
        <div class="row">
          <div class="col">
            <h1 class="page-title mb-3">أخر الأخبار</h1>
            <div class='ticker-wrap' data-domain='gvusiondua.blogspot.com' data-news="{{$allNews}}">
                <div id='ticker'>
                </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-status bg-blue"></div>
              <div class="card-header">
                <h3 class="card-title">ألة حاسبة</h3>
              </div>
              <div class="card-body">
                <div class="calculator">
                  <input type="text" id="screen">
                  <div class="calc-buttons">



          <div class="functions-one">
                  <button class="button triggers">C</button>
                  <button class="button basic-stuff">(</button>
                  <button class="button basic-stuff">)</button>
                  <button class="button numbers">7</button>
                  <button class="button numbers">8</button>
                  <button class="button numbers">9</button>
                  <button class="button numbers">4</button>
                  <button class="button numbers">5</button>
                  <button class="button numbers">6</button>
                  <button class="button numbers">1</button>
                  <button class="button numbers">2</button>
                  <button class="button numbers">3</button>
                  <button class="button basic-stuff">±</button>
                  <button class="button numbers">0</button>
                  <button class="button basic-stuff">.</button>
          </div>




                  <div class="functions-two">
                      <button class="button triggers">&#60;=</button>
                      <button class="button complex-stuff">%</button>
                      <button class="button complex-stuff">x !</button>
                      <button class="button complex-stuff">x^</button>
                      <button class="button basic-stuff">*</button>
                      <button class="button basic-stuff">/</button>
                      <button class="button complex-stuff">ln</button>
                      <button class="button complex-stuff">e</button>
                      <button class="button basic-stuff">+</button>
                      <button class="button complex-stuff">x ²</button>
                      <button class="button complex-stuff">log</button>
                      <button class="button complex-stuff">cos</button>
                      <button class="button basic-stuff">-</button>
                      <button class="button complex-stuff">√</button>
                      <button class="button complex-stuff">sin</button>
                      <button class="button complex-stuff">tan</button>
                      <button class="button triggers">=</button>
                      <button class="button complex-stuff">&#x003C0;</button>
                      <button class="button complex-stuff">∘</button>
                      <button class="button complex-stuff">rad</button>
                  </div>

                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    @endif
    <div class="row row-cards justify-content-center">
        @can("managment_virtual_classroom")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">{{$topBoxs['virtual_classroom']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.virtual_classroom')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("virtual-classroom.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.header.virtual_classroom_create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_lectures")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">{{$topBoxs['lectures']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.lectures')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("lectures.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.header.lecture_create')
                    </a>
               </div>
          </div>

        </div>
        @endcan
        @can("managment_students")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">
              <div class="h1 m-0">{{$topBoxs['studnets']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.studnets')</div>
            </div>
           <div class="card-footer">
                <a href="{{route("students.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                    <i class="fe fe-plus"></i>
                    @lang('dashboard.header.students_create')
                </a>
           </div>
          </div>
        </div>
        @endcan
        @can("managment_subject")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">{{$topBoxs['subjects']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.subjects')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("subjects.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.header.subject_create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_teachers")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">
              <div class="h1 m-0">{{$topBoxs['teachers']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.teachers')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("teachers.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.header.teacher_create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_staff")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">{{$topBoxs['staffs']}}</div>
              <div class="text-muted mb-4">@lang('dashboard.header.staffs')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("staff.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.header.staff_create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_latestnews")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">
                @if($topBoxs['latestnews'] > 1000000)
                1000000+
                @endif
                {{$topBoxs['latestnews']}}
              </div>
              <div class="text-muted mb-4">@lang('dashboard.header.latestnews')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("latestnews.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.latestnews.create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_honoraryboard")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">
                @if($topBoxs['honoraryboard'] > 1000000)
                1000000+
                @endif
                {{$topBoxs['honoraryboard']}}
              </div>
              <div class="text-muted mb-4">@lang('dashboard.header.honoraryboard')</div>
            </div>
            <div class="card-footer">
                    <a href="{{route("honoraryboards.create")}}" class="btn btn-sm btn-outline-primary btn-block">
                        <i class="fe fe-plus"></i>
                        @lang('dashboard.honoraryboards.create')
                    </a>
               </div>
          </div>
        </div>
        @endcan
        @can("managment_analytics")
        <div class="col col-sm-4 col-lg-2">
          <div class="card">
            <div class="card-body p-3 text-center">

              <div class="h1 m-0">
                {{$onlineUsers}}
              </div>
              <div class="text-muted mb-4">المستخدمين النشطين</div>
            </div>
            <div class="card-footer">
                  <a href="{{route("analytics.onlineusers")}}" class="btn btn-sm btn-outline-primary btn-block">
                      <i class="fe fe-eye"></i>
                      عرض الكل
                  </a>
              </div>
          </div>
        </div>
        @endcan
    </div>
    <div class="row row-cards">
        @can("managment_students")
        <div class="col-sm-6 col-lg-4">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-blue mr-3">
                <i class="fe fe-users"></i>
              </span>
              <div>
                <h4 class="m-0"><a href="{{route('students.index')}}">{{$studensCount['students']}} <small>@lang('dashboard.header.studnets')</small></a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-green mr-3">
                <i class="fe fe-users"></i>
              </span>
              <div>
                <h4 class="m-0"><a href="{{route('students.index','active')}}">{{$studensCount['active']}} <small>@lang('dashboard.header.active_studnets')</small></a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-red mr-3">
                <i class="fe fe-users"></i>
              </span>
              <div>
                <h4 class="m-0"><a href="{{route('students.index','-inactive')}}">{{$studensCount['inactive']}} <small>@lang('dashboard.header.inactive_studnets')</small></a></h4>
              </div>
            </div>
          </div>
        </div>
        @endcan

      </div>
      <div class="row">
        @can('managment_students')
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">أخر 10 عمليات تسجيل</h3>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-striped table-vcenter">
                    <thead>
                      <tr>
                        <th>إسم المستخدم</th>
                        <th>رقم الجوال</th>
                        <th>التخصص</th>
                        <th>تاريخ التسجيل</th>
                        <th>عرض</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($lastTenStudents as $student)
                      <tr>
                          <td>{{$student->user->username ?? ""}}</td>
                          <td>{{$student->user->mobile_number ?? ""}}</td>
                          <td>{{$student->major->name ?? ''}}</td>
                          <td class="text-nowrap">{{($student->created_at)}}</td>
                          <td class="w-1"><a href="{{route('students.edit', $student->id)}}" data-toggle="tooltip" data-placement="top" title="عرض" class="icon"><i class="fe fe-eye text-primary"></i></a></td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        @endcan
        @can('managment_site_messages')
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">أخر 10 رسائل</h3>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-striped table-vcenter">
                    <thead>
                      <tr>
                        <th>الأسم</th>
                        <th>البريد اﻹلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>تاريخ اﻹرسال</th>
                        <th>عرض</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($lastTenMessages as $message)
                      <tr>
                          <td>{{$message->name}}</td>
                          <td>
                              <a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="إرسل رسالة الي {{$message->name}}" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$message->email}}">
                                  الرد على الرسالة
                              </a>
                          </td>
                          <td>{{$message->mobile}}</td>
                          <td class="text-nowrap">{{($message->created_at)}}</td>
                          <td class="w-1"><a href="javascript:void(0)"  data-toggle="modal" id="message" data-message="{{$message->message}}" data-target="#messageModal" class="icon message-contact-us"><i class="fe fe-eye text-primary"></i></a></td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">الرسالة</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          </div>
                      </div>
                      </div>
                </div>
                </div>
              </div>
        </div>
        @endcan
      </div>

@endsection


@if (auth()->user()->hasRole("student"))
  @section('js')
      <script src="{{asset('dashboard/assets/js/students_news.js')}}"></script>
      <script src="{{asset('dashboard/assets/js/calculator.js')}}"></script>
      <script>
        function initFreshChat() {
          window.fcWidget.init({
            token: "75261ef0-d477-4a06-b43a-941f17b50db1",
      host: "https://wchat.freshchat.com"
          });

          // Copy the below lines under window.fcWidget.init inside initFreshChat function in the above snippet

// To set unique user id in your system when it is available
window.fcWidget.setExternalId("{{auth()->user()->username}}");

// To set user name
window.fcWidget.user.setFirstName('{{auth()->user()->full_name}}');

// To set user email
window.fcWidget.user.setEmail("{{auth()->user()->email}}");

// To set user properties
window.fcWidget.user.setProperties({
  plan: "Estate",                 // meta property 1
  status: "Active"                // meta property 2
});
        }
        function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
      </script>
  @stop
@endif


