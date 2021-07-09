<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('Frontend')->group(function(){
    Route::get('/', 'FrontendController@index')->name('front.index');
    Route::get('تواصل-معنا', 'FrontendController@contact')->name('front.contact');
    Route::get('معرض-الصور', 'FrontendController@galleryCategories')->name('front.gallery.categories');
    Route::get('معرض-الصور/{id}', 'FrontendController@galleryCategory')->name('front.gallery.categories.show');
    Route::post('contact-send', 'FrontendController@massagessend')->name('contact.send');
    Route::get('أخبارنا', 'FrontendController@allNews')->name('news.all');
    Route::get('news/{slug}', 'FrontendController@showNews')->name('news.show');
    Route::get('قالو-عنا', 'FrontendController@views')->name('front.views');
    Route::post('views', 'FrontendController@Postview')->name('front.post.view');
    Route::get('لوحة-الشرف', 'FrontendController@honoraryboard')->name('front.honoraryboard');
    Route::get('المدرسين', 'FrontendController@teachers')->name('front.teachers');
//    Route::get('send/success', 'FrontendController@sendSuccess')->name('send.success');
    /*-----------------academyadmin--aml----------------------------------------------------------------*/
    Route::get('الرؤية-رساله', 'FrontendController@Vismisvalues')->name('front.Vismisvalues');
    Route::get('رئيس-الاكاديمية', 'FrontendController@academypresid')->name('front.academypresid');
    Route::get('وكيل-الاكاديمية', 'FrontendController@academyagent')->name('front.academyagent');
    Route::get('قرارات-الاكاديمية', 'FrontendController@academydis')->name('front.academydis');
    Route::get('الدراسات-العليا', 'FrontendController@graduateStudies')->name('front.graduateStudies');
    Route::get('العلاقه-الدولية', 'FrontendController@internatRelation')->name('front.internatRelation');
    Route::get('الهيكل-التنظيمي', 'FrontendController@organizStructure')->name('front.organizStructure');
    Route::get('ضمان-الجوده', 'FrontendController@qualityassurance')->name('front.qualityassurance');
    Route::get('التعليم-الامني', 'FrontendController@Securityeducation')->name('front.Securityeducation');
    Route::get('التعليم-المتخصص', 'FrontendController@Specildeducation')->name('front.Specildeducation');

    /*-----------------academyprograms--aml----------------------------------------------------------------*/
    Route::get('العلوم-الالكترونيه', 'FrontendController@electscience')->name('front.electscience');
    Route::get('أعداد-القاده', 'FrontendController@leadPreparation')->name('front.leadPreparation');
    Route::get('دبلوم-تمهيدي', 'FrontendController@introddiploma')->name('front.introddiploma');
    Route::get('أعداد-الفنين', 'FrontendController@prepartechnicians')->name('front.prepartechnicians');
    Route::get('دكتوراه-مهنيه', 'FrontendController@profesdoctor')->name('front.profesdoctor');
    Route::get('ماجستير-مهني', 'FrontendController@profesMaster')->name('front.profesMaster');
    Route::get('علوم-مهنيه', 'FrontendController@professcience')->name('front.professcience');
    Route::get('البرامج-المهنيه', 'FrontendController@professoftware')->name('front.professoftware');
    Route::get('تأهيل-الخرجين', 'FrontendController@qualifigraduates')->name('front.qualifigraduates');
    Route::get('التعلم-عن-بعد', 'FrontendController@distancelearning')->name('front.distancelearning');
    Route::get('أستشارات-خدمات', 'FrontendController@securityconsulting')->name('front.securityconsulting');
  /*-----------------studentsaffairs--aml----------------------------------------------------------------*/
    Route::get('رابطه-الخرجين', 'FrontendController@alumniAssociation')->name('front.alumniAssociation');
    Route::get('الخدمات-الالكترونيه', 'FrontendController@stelectrservices')->name('front.stelectrservices');
    Route::get('خدمات-الوافدين', 'FrontendController@expatrservice')->name('front.expatrservice');
    Route::get('الرعايه-الصحيه', 'FrontendController@healthycare')->name('front.healthycare');
    Route::get('الانشطة-الطلابيه', 'FrontendController@activservices')->name('front.activservices');
    Route::get('دليل-الطلاب', 'FrontendController@studenthanbook')->name('front.studenthanbook');

/*-----------------teachersaffairs--aml----------------------------------------------------------------*/
    Route::get('البوابه-الالكترونيه-التدريس', 'FrontendController@techerelectic')->name('front.techlectic');
    Route::get('البوابه-الالكترونيه', 'FrontendController@stelecticgate')->name('front.stelecticgate');
    Route::get('الخدمات-الالكترونيه-التدريس', 'FrontendController@techeraciveservice')->name('front.techeraciveservice');
    Route::get('دليل-التدريس', 'FrontendController@teachguids')->name('front.teachguids');
    Route::get('التطوير-التدريب', 'FrontendController@treandeveop')->name('front.treandeveop');

/*-----------------quilty--aml----------------------------------------------------------------*/
    Route::get('شكوي', 'FrontendController@complaint')->name('front.complaint');
    Route::get('أستبيان', 'FrontendController@questionnaire')->name('front.questionnaire');
    Route::get('أهداف-وحده-الجوده', 'FrontendController@Qualityassura')->name('front.Qualityassura');
/*-----------------newslaters--aml----------------------------------------------------------------*/
    Route::get('النشرات-الدوريه', 'FrontendController@newsletters')->name('front.newsletters');
    Route::get('معرض-الصور', 'FrontendController@photogaphy')->name('front.photogaphy');
    Route::get('البيانات-الصحفية', 'FrontendController@presreleases')->name('front.presreleases');
    Route::get('الاحداث', 'FrontendController@Juvenile')->name('front.Juvenile');




});
Route::get('تسجيل المؤتمر', 'MemmbersConferenceCntroller@create')->name('front.conference');

Route::resource('conference', 'MemmbersConferenceCntroller');



Auth::routes();


//Route::post('register/subjects', 'Auth\RegisterController@getSubjects');
Route::get('register/subjects/{id}', 'Auth\RegisterController@getSubjects');

Route::prefix('dashboard')->middleware("auth")->namespace('Dashboard')->group(function(){

    Route::get('home', 'DashboardController@index')->name('dashboard.home');
    Route::get('profile', 'DashboardController@profileIndex')->name('profile.index');
    Route::get('certificates', 'DashboardController@certificateIndex')->name('certificates.index');
    Route::post('profile/reset-password', 'DashboardController@resetPassword')->name('profile.reset_password');

    Route::namespace('Majors')->middleware('permission:managment_majors')->group(function(){
        Route::post('majors/activation', 'MajorController@activation')->name('major.activation');
        Route::get('majors/export/{type}', 'MajorController@export')->name('major.export');
        Route::resource('majors', 'MajorController');
    });


    Route::namespace('Subjects')->middleware('permission:managment_subject')->group(function(){
        Route::post('subjects/activation', 'SubjectController@activation')->name('subject.activation');
        Route::get('subjects/export/{type}', 'SubjectController@export')->name('subjects.export');
        Route::resource('subjects', 'SubjectController');
    });

    Route::namespace('Media')->middleware('permission:managment_media')->group(function(){
        Route::get('media', 'MediaController@index')->name('media.index');
        Route::get('media/ifream', 'MediaController@ifream')->name('media.ifream');
        Route::get('media/picker', 'MediaController@picker')->name('media.picker');

        Route::get('sliders', 'SliderController@index')->name('sliders.index');
        Route::get('sliders/create', 'SliderController@create')->name('sliders.create');
        Route::post('sliders', 'SliderController@store')->name('sliders.store');
        Route::post('sliders/activation', 'SliderController@activation')->name('sliders.activation');
        Route::delete('sliders/{id}', 'SliderController@delete')->name('sliders.delete');

        Route::resource('gallery-categories', 'GalleryCategoryController');
        Route::post('galleries/activation', 'GalleryController@activation')->name('gallery.activation');
        Route::resource('galleries', 'GalleryController');
    });

    Route::namespace('Roles')->middleware('permission:managment_roles')->group(function(){
        Route::get('roles/export/{type}', 'RoleController@export')->name('roles.export');
        Route::resource('roles', 'RoleController');
    });

    Route::namespace('Teachers')->middleware('permission:managment_teachers')->group(function(){
        Route::post('teachers/activation', 'TeacherController@activation')->name('teacher.activation');
        Route::get('teachers/year/{year?}', 'TeacherController@index')->name("teachers.index");
        Route::get('teachers/delete/{id}', 'TeacherController@getDeletePost')->name('teachers.delete');


        Route::resource('teachers', 'TeacherController')->except(["index"]);
//        Route::delete('teachers/{id}', 'TeacherController@destroy')->name('teachers.destroy');

        Route::get('teachers/{id}/show', 'TeacherController@show')->name('teachers.show');

        Route::get('teachers/export/{type}', 'TeacherController@export')->name('teachers.export');

        Route::get('teachers/{id}/notes', 'TeacherNoteController@index')->name('teachers.notes');
        Route::get('teachers/{id}/notes/create', 'TeacherNoteController@create')->name('teachers.notes.create');
        Route::post('teachers/notes/store', 'TeacherNoteController@store')->name('teachers.notes.store');
        Route::get('teachers/notes/{id}/edit', 'TeacherNoteController@edit')->name('teachers.notes.edit');
        Route::patch('teachers/notes/{id}/update', 'TeacherNoteController@update')->name('teachers.notes.update');
        Route::delete('teachers/notes/{id}/delete', 'TeacherNoteController@delete')->name('teachers.notes.delete');
        Route::post('teachers/notes/activation', 'TeacherNoteController@activation')->name('teachers.notes.activation');
    });

    Route::namespace('Students')->middleware('permission:managment_students')->group(function(){
        Route::get('students/datatable', 'StudentController@getAllStudents')->name('students.datatable');
        Route::get('students{active?}/{year?}', 'StudentController@index')->name("students.index");
        Route::resource('students', 'StudentController')->except(["index"]);
        Route::get('students/export/{type}/{active}', 'StudentController@export')->name('students.export');
        Route::post('students/activation', 'StudentController@activation')->name('students.activation');
        Route::post('students/subjects/{id}', 'StudentController@getSubjectByMajorId')->name('students.getSubjects');
        Route::post('students/getLecturesBySubjectIds', 'StudentController@getLecturesBySubjectIds')->name('students.getLecturesBySubjectIds');
        Route::get('reports/students/{active}/{year}', 'StudentController@reportStudents')->name("reports.students");

    });

    Route::namespace('Staff')->middleware('permission:managment_staff')->group(function(){
        Route::post('staff/activation', 'StaffController@activation')->name('staff.activation');
        Route::resource('staff', 'StaffController');
        Route::get('staff/export/{type}', 'StaffController@export')->name('staff.export');
//        Route::delete('staff/{id}', 'SliderController@delete')->name('staff.delete');

    });

    Route::namespace('Lectures')->group(function(){
        Route::post('lectures/activation', 'LectureController@activation')->name('lecture.activation');
        Route::post('lectures/subject/teachers', 'LectureController@getTeachersBySubjectID');
        Route::resource('lectures', 'LectureController');
        Route::get('lectures/export/{type}', 'LectureController@export')->name('lectures.export');
    });
    Route::namespace('VirtualClassroom')->middleware('permission:managment_virtual_classroom')->group(function(){
        Route::get('virtual-classroom/{year}/subjects', 'VirtualClassroomController@getSubjectsByYear')->name('getSubjectsByYear');
        Route::get('virtual-classroom/subject/{subject}/year/{year}', 'VirtualClassroomController@getClassRoomsByYear')->name('getClassRoomsByYear');
        Route::post('virtual-classroom/subject/{subject}/lectures', 'VirtualClassroomController@getLecturesBySubject')->name('getLecturesBySubject');

        Route::get('virtual-classroom/wiziq', 'VirtualClassroomController@wiziq')->name('wiziq.create');
        Route::get('virtual-classroom/webinar', 'VirtualClassroomController@webinar')->name('webinar.create');
        Route::get('virtual-classroom/zoom', 'VirtualClassroomController@zoom')->name('zoom.create');
        Route::get('virtual-classroom/zoom/wiziq', 'VirtualClassroomController@zoomWiziq')->name('zoom.wiziq.create');
        Route::post('virtual-classroom/zoom/wiziq', 'VirtualClassroomController@zoomWiziqStore')->name('zoom.wiziq.store');
        Route::post('virtual-classroom/zoom', 'VirtualClassroomController@storeZoom')->name('zoom.store');
        Route::post('virtual-classroom/wiziq', 'VirtualClassroomController@storeWiziq')->name('wiziq.store');
        Route::post('virtual-classroom/webinar', 'VirtualClassroomController@storeWebinar')->name('webinar.store');
        Route::resource('virtual-classroom', 'VirtualClassroomController');

        Route::get('virtual-classroom', 'VirtualClassroomController@index')->name('virtual-classroom.index');
    });

    Route::namespace('Latestnews')->middleware('permission:managment_latestnews')->group(function(){
        Route::post('latestnews/activation', 'LatestnewsController@activation')->name('latestnews.activation');
        Route::post('latestnews/upload/image', 'LatestnewsController@uploadImage')->name('latestnews.upload.image');
        Route::post('latestnews/remove/image', 'LatestnewsController@removeImage')->name('latestnews.remove.image');
        Route::resource('latestnews', 'LatestnewsController');
    });





    Route::namespace('Reports')->middleware('permission:managment_reports')->group(function(){
        Route::get('watching/recorded', 'ReportsController@watchingRecorded')->name('reports.watching.recorded');
        Route::get('students/watching/recorded/select2', 'ReportsController@select2Search');
        Route::post('students/watching/recorded/search', 'ReportsController@watchingRecordedSearch')->name('reports.watching.result');
        Route::get('reports/cities', 'ReportsController@citiesReport')->name('reports.cities');
        Route::get('reports/cities/select2', 'ReportsController@select2CitiesSearch');
        Route::post('reports/cities/search/result', 'ReportsController@citiesSearchResult')->name('reports.cities.result');

        Route::get('reports/schools', 'ReportsController@schoolsReport')->name('reports.schools');
        Route::get('reports/schools/select2', 'ReportsController@select2SchoolsSearch');
        Route::post('reports/schools/search/result', 'ReportsController@schoolsSearchResult')->name('reports.schools.result');
        Route::get('reports/students', 'ReportsController@studentsReport')->name('reports.students');
        Route::post('reports/students/search', 'ReportsController@studentsReportSearch')->name('reports.students.search');

    });

    // Start Routes Students
    Route::namespace('Students')->middleware('role:student')->group(function(){
        Route::get('student/subjects/{year}', 'StudentController@getStudentSubjectsByYear')->name("student.getSubjectsByYear");
        Route::post('student/watching/recorded/counter', 'StudentController@watchingRecordedCounter');
        Route::get('student/subjects', 'StudentController@getStudentSubjects')->name("student.getSubjects");
        Route::get('student/subject/{id}/classrooms', 'StudentController@getClassrommsBySubjectId')->name("student.subject.classrooms");
        Route::get('student/watch/{id}', 'StudentController@watchingClassroom')->name("student.watch");
        Route::get('student/reccord/wiziq/{id}', 'StudentController@recordClassroom')->name("student.record");
        Route::get('student/reccord/webinar/{id}', 'StudentController@recordWebinarClassroom')->name("student.record.webinar");
        Route::get('student/reccord/zoom/{id}', 'StudentController@recordZoomClassroom')->name("student.record.zoom");

    });
    Route::namespace('LectureDates')->group(function(){
        Route::get('lectureDates', 'LectureDatesController@index')->name("student.lectureDates");

    });

    Route::namespace('Teachers')->middleware('role:teacher')->group(function(){
        Route::get('teacher/students', 'TeacherController@getStudents')->name('get.students');
        Route::get('teacher/lectures/{sl}', 'TeacherController@getLectures')->name('teacher.get.lectures');
        Route::get('teacher/lecture/virtual_classroom/{id}', 'TeacherController@getLectureVirtualClassrooms')->name('teacher.get.lecture.virtual_classroom');
        Route::get('teacher/lecture/students/{id}', 'TeacherController@getLectureStudents')->name('teacher.get.lecture.students');
        Route::get('teacher/lecture/classromms/tv/{sl}', 'TeacherController@ViewUrlClassroom')->name('teacher.get.lecture.tv');
        Route::get('teacher/years', 'TeacherController@getYears')->name('teacher.get.years');
        Route::get('teacher/subjects/{year}', 'TeacherController@getSubjects')->name('get.subjects.by.year');

        Route::get('teacher/all/notes', 'TeacherNoteController@teacherNotes')->name('teacher.all.notes');


    });

    Route::middleware('permission:managment_students_notes')->group(function(){
        Route::get('teacher/student/note/getnote', 'Notes\NoteController@getNoteStudent');
        Route::post('teacher/student/note/save_or_update', 'Notes\NoteController@createOrUpdateNoteStudent');
        Route::get('teacher/lecture/virtual_classroom/{id}/students', 'Teachers\TeacherController@getStudentsVirtualClassrooms')->name('teacher.get.lecture.virtual_classroom.students');
    });

    Route::namespace('Setting')->middleware('permission:managment_settings')->group(function(){
        Route::get('settings', 'SettingController@index')->name('settings.index');
        Route::post('settings', 'SettingController@update')->name('settings.update');
    });

    Route::namespace('Chats')->group(function(){
        Route::get('chats', 'ChatController@index')->name('chats.index');
        Route::get('chats/get-chat-list', 'ChatController@getChatsList');
        Route::get('chats/search-chat-list', 'ChatController@searchChatsList');

        Route::get('chats/loadMessages', 'ChatController@loadMesages');
        Route::post('chats/sendMessage', 'ChatController@sendMessage');
        Route::post('chats/token', 'ChatController@saveToken');
        Route::get('chats/{user_id}', 'ChatController@index')->name('chats.index.user');
    });

    Route::namespace('Message')->middleware('permission:managment_site_messages')->group(function(){
        Route::get('messages', 'MessageController@index')->name('messages.index');
        Route::delete('messages/{id}', 'MessageController@destroy')->name('messages.destroy');
    });

    Route::namespace('AcademicYear')->middleware('permission:managment_academic_years')->group(function(){
        Route::get('years', 'AcademicYearController@index')->name('years.index');
        Route::post('years/activation', 'AcademicYearController@activation')->name('years.activation');
        Route::get('years/create', 'AcademicYearController@create')->name('years.create');
        Route::post('years/create', 'AcademicYearController@store')->name('years.store');
        Route::get('years/{id}/edit', 'AcademicYearController@edit')->name('years.edit');
        Route::patch('years/{id}', 'AcademicYearController@update')->name('years.update');
        Route::delete('years/{id}', 'AcademicYearController@destroy')->name('years.destroy');

    });

    Route::namespace('Honoraryboard')->middleware('permission:managment_honoraryboard')->group(function(){
        Route::post('honoraryboards/activation', 'HonoraryboardController@activation')->name('honoraryboards.activation');
        Route::resource('honoraryboards', 'HonoraryboardController');
    });



    Route::namespace('Certificate')->middleware('permission:managment_certificate')->group(function(){
        Route::post('certificate/activation', 'CertificateCntroller@activation')->name('certificate.activation');
        Route::resource('certificate', 'CertificateCntroller');

    });


    Route::namespace('Conference')->middleware('permission:managment_conference')->group(function(){
        Route::post('allconference/activation', 'ConferenceCntroller@activation')->name('allconference.activation');
        Route::resource('allconference', 'ConferenceCntroller');
        Route::get('divdoc/{id}','ConferenceCntroller@getDivDoct')->name('div.Doc');



    });


 Route::namespace('Conference')->middleware('permission:managment_doctconference')->group(function(){
        Route::post('alldoctconf/activation', 'DoctoresConferenceCntroller@activation')->name('alldoctconf.activation');
        Route::resource('alldoctconf', 'DoctoresConferenceCntroller');



    });










    Route::namespace('School')->middleware('permission:managment_schools')->group(function(){
        // Route::post('honoraryboards/activation', 'HonoraryboardController@activation')->name('honoraryboards.activation');
        Route::resource('schools', 'SchoolController');
    });


    Route::namespace('Analytics')->middleware('permission:managment_analytics')->group(function(){
        Route::get('analytics', 'AnalyticsController@index')->name('analytics.index');
        Route::get('onlineusers', 'AnalyticsController@onlineUsers')->name('analytics.onlineusers');
        Route::get('reports/citys/{year}', 'AnalyticsController@reportStudentsCitys')->name('analytics.reports.citys');
    });

    Route::namespace('Groups')->prefix('groups')->group(function(){
        Route::middleware('permission:managment_groups')->group(function(){
            Route::get('/', 'GroupController@index')->name('groups.index');
            Route::get('create', 'GroupController@create')->name('groups.create');
            Route::post('/', 'GroupController@store')->name('groups.store');
            Route::patch('{id}', 'GroupController@update')->name('groups.update');
            Route::get('{id}/edit', 'GroupController@edit')->name('groups.edit');
            Route::delete('{group}/members/{id}/delete', 'GroupController@deleteMember')->name('groups.delete.member');
            Route::post('add/{group}/members', 'GroupController@addMembers')->name('groups.add.members');
            Route::delete('group/delete/{id}', 'GroupController@deleteGroup')->name('group.delete');
        });
        Route::get('my-groups', 'GroupController@myGroups')->name('groups.my');
        Route::get('my-groups/{id}', 'GroupController@showGroup')->name('groups.show');
        Route::get('{id}/members', 'GroupController@members')->name('groups.members');
        Route::post('{id}/post', 'GroupController@storePost')->name('groups.store.post');
        Route::get('post/{post}/user/{group}/group', 'GroupController@showUserPosts')->name('groups.user.posts');
        Route::post('post/{id}/like', 'GroupController@postLike')->name('groups.post.like');
        Route::post('comment/{id}/like', 'GroupController@commentLike')->name('groups.comment.like');
        Route::post('post/{id}/user/{user}/comment', 'GroupController@comment')->name('groups.comment');
        Route::delete('comment/{comment}/delete', 'GroupController@deleteComment')->name('groups.comment.delete');
        Route::delete('post/{post}/delete', 'GroupController@deletePost')->name('groups.post.delete');
        Route::post('comment/update', 'GroupController@updateComment')->name('groups.comment.update');
        Route::post('post/update', 'GroupController@updatePost')->name('groups.post.update');
        Route::post('groups/upload/image', 'GroupController@uploadImage')->name('groups.upload.image');
        Route::delete('groups/remove/image', 'GroupController@removeImage')->name('groups.remove.image');

    });

    Route::namespace('View')->middleware('permission:managment_views')->group(function(){
        Route::get('views', 'ViewController@index')->name('views.index');
        Route::delete('views/{id}', 'ViewController@destroy')->name('views.destroy');
        Route::patch('views/{id}', 'ViewController@update')->name('views.update');
        Route::post('views/activation', 'ViewController@activation')->name('view.activation');
    });

    Route::namespace('Students')->group(function(){
        Route::middleware('permission:managment_students_news')->group(function(){
            Route::get('student-news/datatable', 'StudentNewsController@getAllStudentNews')->name('student-news.datatable');
            Route::resource('student-news', 'StudentNewsController');
            Route::post('student-news/upload/image', 'StudentNewsController@uploadImage')->name('student-news.upload.image');
            Route::post('student-news/activation', 'StudentNewsController@activation')->name('student-news.activation');
        });

       Route::middleware('permission:managment_notes')->group(function(){
            Route::get('student/{id}/notes', 'StudentNoteController@index')->name('student.notes');
            Route::get('student/{id}/create/notes', 'StudentNoteController@create')->name('student.notes.create');
            Route::post('student/notes/store', 'StudentNoteController@store')->name('student.notes.store');
            Route::get('student/notes/{id}/edit', 'StudentNoteController@edit')->name('student.notes.edit');
            Route::patch('student/notes/{id}/update', 'StudentNoteController@update')->name('student.notes.update');
            Route::delete('student/notes/{id}/delete', 'StudentNoteController@delete')->name('student.notes.delete');
            Route::post('student/note/activation', 'StudentNoteController@activation')->name('note.activation');
       });

        Route::get('student/my-notes', 'StudentNoteController@studentNotes')->name('show.student.notes');

        Route::get('news/{id}', 'StudentNewsController@singleNews');
        Route::get('student/news/all', 'StudentNewsController@allNews')->name('student.all.news');
        Route::get('student/{id}/news', 'StudentNewsController@showNews')->name('student.show.news');

    });


    Route::namespace('Students')->middleware('role:student')->group(function(){
        Route::get('teacher/notes', 'StudentTeacherNoteController@index')->name('student.teacher.note.index');
        Route::get('teacher/{id}/note/create', 'StudentTeacherNoteController@create')->name('student.teacher.note.create');
        Route::post('teacher/note/store', 'StudentTeacherNoteController@store')->name('student.teacher.note.store');

    });

    Route::namespace('Students')->middleware(['role:teacher'])->group(function(){
        Route::get('student/notes', 'StudentTeacherNoteController@studentNotes')->name('student.teacher.notes');
    });

/*-------------------amal-------------------------*/

    Route::namespace('Homes')->group(function(){
        Route::middleware('permission:managment_courses')->group(function(){

            Route::resource('courses', 'CoursesCntroller');
            Route::get('courses/export/{type}', 'CoursesCntroller@export')->name('courses.export');

        });
          Route::middleware('permission:managment_whyuse')->group(function(){
              Route::resource('whyuse', 'WhyuseCntroller');
              Route::get('whyuse/export/{type}', 'WhyuseCntroller@export')->name('whyuse.export');

          });
          Route::middleware('permission:managment_services')->group(function(){

              Route::resource('services', 'ServicesCntroller');
              Route::get('services/export/{type}', 'ServicesCntroller@export')->name('services.export');
        });


    });




//    Route::group(['namespace' => 'Admin'], function () {
//        Route::get('slides','SlidesController@index') -> name('admin.slides');
//        Route::get('create','SlidesController@create') -> name('admin.slides.create');
//        Route::post('store','SlidesController@store') -> name('admin.slides.store');
//
//        Route::get('edit/{id}','SlidesController@edit') -> name('admin.slides.edit');
//        Route::post('update/{id}','SlidesController@update') -> name('admin.slides.update');
//
//        Route::get('delete/{id}','SlidesController@destroy') -> name('admin.slides.delete');
//    });




});
