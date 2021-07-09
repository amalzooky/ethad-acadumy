<div class="header2 collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg order-lg-first">
            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
                <a href="{{route('dashboard.home')}}" class="nav-link {{active('dashboard.home')}}"><i class="fe fe-home"></i>@lang('dashboard.header.home')</a>
            </li>
            @can('managment_virtual_classroom')
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['virtual-classroom.create', 'zoom.wiziq.create', 'webinar.create', 'wiziq.create', 'virtual-classroom.index', 'zoom.create', 'getLecturesBySubject', 'getSubjectsByYear', 'getClassRoomsByYear'])}}" data-toggle="dropdown"><i class="fe fe-video"></i>@lang('dashboard.header.virtual_classroom')</a>
                <div class="dropdown-menu dropdown-menu-arrow">
{{--                <a href="{{route('virtual-classroom.create')}}" class="dropdown-item {{active(['virtual-classroom.create'])}}"><i class="fe fe-radio"></i>@lang('dashboard.header.virtual_classroom_create')</a>--}}
{{--                <a href="{{route('wiziq.create')}}" class="dropdown-item {{active(['wiziq.create'])}}"><i class="fe fe-radio"></i>Wiziq</a>--}}
{{--                <a href="{{route('webinar.create')}}" class="dropdown-item {{active(['webinar.create'])}}"><i class="fe fe-radio"></i>Webinar</a>--}}
                <a href="{{route('zoom.create')}}" class="dropdown-item {{active(['zoom.create'])}}"><i class="fe fe-radio"></i>Zoom</a>
{{--                <a href="{{route('zoom.wiziq.create')}}" class="dropdown-item {{active(['zoom.wiziq.create'])}}"><i class="fe fe-radio"></i>Zoom & Wiziq</a>--}}
                @role('owner')
                <a href="{{route('virtual-classroom.index')}}" class="dropdown-item {{active(['virtual-classroom.index', 'getLecturesBySubject', 'getSubjectsByYear', 'getClassRoomsByYear'])}}"><i class="fe fe-film"></i>@lang('dashboard.header.classrooms')</a>
                @endrole

                </div>
            </li>
            @endcan
            @if(auth()->user()->can('managment_students') || auth()->user()->can('managment_teachers') || auth()->user()->can('managment_roles') || auth()->user()->can('managment_staff'))
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['students.*','teachers.*', 'staff.*'])}}" data-toggle="dropdown"><i class="fe fe-users"></i> @lang('dashboard.header.users')</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                @can('managment_students')
                <a href="{{route('students.index')}}" class="dropdown-item {{active([url('/dashboard/students'), 'students.create', 'students.edit'])}}"><i class="fe fe-users"></i>@lang('dashboard.header.studnets')</a>
                <a href="{{route('students.index','-inactive')}}" class="dropdown-item {{active(url('/dashboard/students-inactive'))}}"><i class="fe fe-clock"></i>@lang('dashboard.header.inactive_studnets') </a>
                <a href="{{route('students.index','-active')}}" class="dropdown-item {{active(url('/dashboard/students-active'))}}"><i class="fe fe-check-circle"></i>@lang('dashboard.header.active_studnets') </a>
                @endcan
                <div class="dropdown-divider"></div>
                @can('managment_teachers')
                <a href="{{route('teachers.index')}}" class="dropdown-item {{active(['teachers.*'])}}"><i class="fe fe-users"></i>@lang('dashboard.header.teachers')</a>
                @endcan
                <div class="dropdown-divider"></div>
                @can('managment_staff')
                <a href="{{route('staff.index')}}" class="dropdown-item {{active(['staff.*'])}}"><i class="fe fe-users"></i>@lang('dashboard.header.staffs')</a>
                @endcan
                <div class="dropdown-divider"></div>
                @can('managment_roles')
                    <a href="{{route('roles.index')}}" class="dropdown-item {{active(['roles.*'])}}"><i class="fe fe-zap"></i>@lang('dashboard.header.roles')</a>
                @endcan
                </div>
            </li>
            @endcan
            @can('managment_analytics')
            <li class="nav-item">
                <a href="{{route('analytics.onlineusers')}}" class="nav-link {{active('analytics.onlineusers')}}"><i class="fe fe-users"></i>الاعضاء النشطين</a>
            </li>
            @endcan
            @if(auth()->user()->can('managment_courses') || auth()->user()->can('managment_whyuse') || auth()->user()->can('managment_services'))
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link {{active(['courses.*', 'whyuse.*', 'services.*'])}}" data-toggle="dropdown"><i class="fe fe-paperclip"></i> الاكاديمية </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                        @can('managment_courses')
                            <a href="{{route('courses.index')}}" class="dropdown-item {{active('courses.*')}}"><i class="fe fe-file-text"></i>@lang('dashboard.header.courses')</a>
                        @endcan
                        @can('managment_whyuse')
                            <a href="{{route('whyuse.index')}}" class="dropdown-item {{active('whyuse.*')}}"><i class="fe fe-file-text"></i>@lang('dashboard.header.whyuse')</a>
                        @endcan
                        @can('managment_services')
                            <a href="{{route('services.index')}}" class="dropdown-item {{active('services.*')}}"><i class="fe fe-file-text"></i>@lang('dashboard.header.services')</a>
                        @endcan

                    </div>
                </li>
            @endif



           @can('managment_reports')
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['reports.watching.recorded', 'reports.cities', 'reports.students', 'reports.schools'])}}" data-toggle="dropdown"><i class="fe fe-paperclip"></i> التقارير</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    <a href="{{route('reports.watching.recorded')}}" class="dropdown-item {{active(['reports.watching.recorded'])}}"><i class="fe fe-video"></i>مشاهدة التسجيل</a>
                    <a href="{{route('reports.cities')}}" class="dropdown-item {{active(['reports.cities'])}}"><i class="fe fe-map-pin"></i>المدن</a>
                    <a href="{{route('reports.schools')}}" class="dropdown-item {{active(['reports.schools'])}}"><i class="fe fe-book-open"></i>الاقسام</a>
                    <a href="{{route('reports.students')}}" class="dropdown-item {{active(['reports.students'])}}"><i class="fe fe-users"></i>الطلاب</a>
                </div>
            </li>
            @endcan
            @role('student')
            <li class="nav-item ">
                <a href="{{route("student.getSubjects")}}" class="nav-link {{active(['student.getSubjects'])}}" >
                    <i class="fe fe-video"></i>@lang('dashboard.header.subjects')
                </a>


            </li>
            @endrole
            <li class="nav-item ">
                <a href="{{route("student.lectureDates")}}" class="nav-link {{active([' student.lectureDates'])}}" >
                    <i class="fe fe-calendar"></i>مواعيد الدورات
                </a>
            </li>
            @role('teacher')
            <li class="nav-item">
                <a href="{{route('teacher.get.years')}}" class="nav-link {{active('teacher.get.years')}}"><i class="fe fe-video"></i>المواد</a>
            </li>
        @endrole
            @role('teacher')
            <li class="nav-item">
                <a href="{{route('teacher.all.notes')}}" class="nav-link {{active('teacher.all.notes')}}"><i class="fe fe-edit-2"></i>ملاحظاتي</a>
            </li>
        @endrole
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active('groups.*')}}" data-toggle="dropdown"><i class="fe fe-message-circle"></i>@lang('dashboard.header.groups')</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    <a href="{{route('groups.my')}}" class="dropdown-item {{active(['groups.my', 'groups.members'])}}"><i class="fe fe-heart"></i>@lang('dashboard.header.my_groups')</a>
                    @can('managment_groups')
                    <a href="{{route('groups.index')}}" class="dropdown-item {{active(['groups.index', 'groups.create', 'groups.edit'])}}"><i class="fe fe-message-square"></i>@lang('dashboard.header.groups')</a>
                    @endcan
                </div>
            </li>

            @can('managment_chats')

            <li class="nav-item">
                <a target="_blank" href="{{route('chats.index')}}" class="nav-link {{active('chats.index')}}"><i class="fe fe-message-circle"></i>محادثات</a>
            </li>
@endcan
            @can('managment_analytics')
            <li class="nav-item">
                <a href="{{route('analytics.index')}}" class="nav-link {{active('analytics.*')}}"><i class="fe fe-bar-chart-2"></i>@lang('dashboard.header.analytics')</a>
            </li>
            @endcan
            @can('managment_media')
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['sliders.*', 'gallery-categories.*', 'galleries.*'])}}" data-toggle="dropdown"><i class="fe fe-image"></i>الوسائط</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    <a href="{{route('sliders.index')}}" class="dropdown-item {{active('sliders.index')}}"><i class="fe fe-image"></i>الشرائح</a>
                    <a href="{{route('galleries.index')}}" class="dropdown-item {{active('galleries.index')}}"><i class="fe fe-image"></i>معرض الصور</a>
                    <a href="{{route('gallery-categories.index')}}" class="dropdown-item {{active('gallery-categories.*')}}"><i class="fe fe-image"></i>تصنيفات معرض الصور</a>
{{--                    <a href="{{route('media.index')}}" class="dropdown-item {{active('media.index')}}"><i class="fe fe-image"></i>@lang('dashboard.header.gallery')</a>--}}
                </div>
            </li>
            @endcan
            @can('managment_honoraryboard')
            <li class="nav-item">
                <a href="{{route('honoraryboards.index')}}" class="nav-link {{active('honoraryboards.*')}}"><i class="fe fe-award"></i>@lang('dashboard.header.honoraryboard')</a>
            </li>
        @endcan

           @can('managment_certificate')
            <li class="nav-item">
                <a href="{{route('certificate.index')}}" class="nav-link {{active('certificate.*')}}"><i class="fe fe-award"> </i>الشهادات</a>
            </li>
        @endcan

            @if(auth()->user()->can('managment_conference') || auth()->user()->can('managment_doctconference'))
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['allconference.*', 'alldoctconf.*'])}}" data-toggle="dropdown"><i class="fe fe-mic"></i>المؤتمرات</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    @can('managment_conference')
                    <a href="{{route('allconference.index')}}" class="dropdown-item {{active('allconference.*')}}"><i class="fe fe-file-text"></i>أضافة مؤتمر</a>
                    @endcan
                    @can('managment_doctconference')
                    <a href="{{route('alldoctconf.index')}}" class="dropdown-item {{active('alldoctconf.*')}}"><i class="fe fe-mic"></i>أضافة دكتور</a>
                    @endcan
                </div>
            </li>
            @endif


 @if(auth()->user()->can('managment_latestnews') || auth()->user()->can('managment_views') || auth()->user()->can('managment_students_news'))
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link {{active(['latestnews.*', 'views.*', 'student-news.*'])}}" data-toggle="dropdown"><i class="fe fe-mic"></i>@lang('dashboard.header.views_news')</a>
                <div class="dropdown-menu dropdown-menu-arrow">
                    @can('managment_latestnews')
                    <a href="{{route('latestnews.index')}}" class="dropdown-item {{active('latestnews.*')}}"><i class="fe fe-file-text"></i>@lang('dashboard.header.latestnews')</a>
                    @endcan
                    @can('managment_views')
                    <a href="{{route('views.index')}}" class="dropdown-item {{active('views.*')}}"><i class="fe fe-mic"></i>@lang('dashboard.header.views')</a>
                    @endcan
                    @can('managment_students_news')
                    <a href="{{route('student-news.index')}}" class="dropdown-item {{active('student-news.*')}}"><i class="fe fe-mic"></i>أخبار الطلاب</a>
                    @endcan
                </div>
            </li>
            @endif





            @role('student')
            <li class="nav-item">
                <a href="{{route('student.all.news')}}" class="nav-link {{active(['student.all.news', 'student.show.news'])}}" >
                    <i class="fe fe-mic"></i>أخر الأخبار
                </a>
            </li>
            @endrole

            @role('student')
            <li class="nav-item">
                    <a href="{{route('show.student.notes')}}" class="nav-link {{active('show.student.notes')}}" >
                        <i class="fe fe-edit-2"></i> ملاحظاتي
                    </a>
                </li>
            @endrole

            @role('student')
            <li class="nav-item">
                    <a href="{{route('student.teacher.note.index')}}" class="nav-link {{active(['student.teacher.note.index', 'student.teacher.note.create'])}}" >
                        <i class="fe fe-users"></i> الدكاتر
                    </a>
                </li>

            @endrole
   @role('student')
                <li class="nav-item">
                    <a href="{{route('certificates.index')}}" class="nav-link {{active(['certificate.index'])}}" >
                        <i class="fe fe-users"></i>  الشهاده
                    </a>
                </li>
            @endrole

            @role('teacher')
            <li class="nav-item">
                    <a href="{{route('student.teacher.notes')}}" class="nav-link {{active(['student.teacher.notes'])}}" >
                        <i class="fe fe-users"></i> ملاحظات الطلاب
                    </a>
                </li>
            @endrole

            </ul>
        </div>
        </div>
    </div>
</div>
