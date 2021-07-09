<?php

return [
    'dashboard_title' => 'لوحة التحكم',
    'header' => [
        "major"=>"التخصص",
        'home' => 'الرئيسية',
        'users' => 'الاعضاء',
        'studnets' => 'المتدربين',
        'students_create'=>'إنشاء طالب',
        'inactive_studnets' => 'المتدربين بإنتظار التفعيل',
        'active_studnets' => 'المتدربين المفعلين',
        'teachers' => 'أعضاء هيئة التدريس',
        'teacher_create' => 'إنشاء دكتور',
        'academic_affairs' => 'الشؤون الاكاديمية',
        'majors' => 'التخصصات',
        'major_create' => 'إنشاء تخصص',
        "gallery"=>"الوسائط",
        'subjects' => 'الدورات',
        'whyuse' => 'لماذا الاتحاد',
        'subject_create' => 'إنشاء دوره',
        'roles'=>"الأدوار",
        'role_create'=>"إنشاء دور",
        'academic_years' => 'السنوات الدراسية',
        'lectures' => 'المحاضرات',
        'courses' => 'الكورسات',
        'services' => 'الخدمات',
        'acadmy' => 'الاكاديمية',
        'lecture_create' => 'إنشاء محاضرة',
        'service_create' => 'إنشاء خدمة',
        'why_create' => 'إنشاء لماذا',
        'staffs'=>'الموظفين',
        'staff_create'=>'إنشاء موظف',
        'virtual_classroom' => 'البث المباشر',
        'classrooms' => 'المحاضرات',
        'virtual_classroom_create' => 'إنشاء بث مباشر',
        'views_news' => 'آراء وأخبار',
        "latestnews"=>"أخر الأخبار",
        'groups' => 'الاقسام',
        'my_groups' => 'مجموعاتي',
        'views' => 'أراء أولياء الأمور',


        "honoraryboard"=>"لوحة الشرف",
        "honoraryboard_create"=>"إضافة طالب",
        "analytics"=>"احصائيات"
    ],

    'groups' => [
        'create' => 'إنشاء قسم',
        'name' => 'إسم قسم',
        'description' => 'وصف قسم',
        'image' => 'صورة قسم',
        'edit' => 'تعديل معلومات قسم'
    ],

    'latestnews'=>[
        "create"=>"انشاء خبر",
        "edit"=>"تعديل الخبر",
        "title"=>"عنوان الخبر",
        "description"=>"الخبر",
        "image"=>"صورة الخبر",
        "delete"=>"حذف الخبر"
    ],
    'major' => [
        'name' => 'إسم التخصص',
        'description' => 'وصف التخصص',
        'image' => "صورة التخصص",
        'edit' => 'تعديل بيانات التخصص',
        'delete' => 'حذف التخصص'
    ],

    'roles'=>[
        'name' => 'إسم دور',
        'edit' => 'تعديل بيانات الدور',
        'permissions'=>"الصلاحيات",
        "student"=>"طالب",
        "teacher"=>"معلم",
        'owner'=>'المدير التنفيذي',
        'select_role'=>"اختار دور",
        'role'=>'الدور'

    ],

    'permissions'=>[
        "managment_student"=>'المتدربين',
        'managment_reports' => 'التقارير',
        "managment_media"=>"الصور",
        "managment_majors"=>"التخصصات",
        "managment_subject"=>'المواد',
        'managment_roles'=>'الأدوار',
        'managment_teachers'=>'الموظفين',
        'managment_staff'=>'أعضاء هيئة التدريس',
        'managment_students'=>'المتدربين',
        'managment_lectures'=>'المحاضرات',
        'managment_virtual_classroom' => 'البث المباشر',
        'managment_academic_years' => 'السنوات الدراسية',
        'managment_site_messages' => 'رسائل الموقع',
        'managment_settings' => 'إعدادات الموقع',
        'managment_latestnews'=>"أخر الأحبار",
        'managment_groups' => 'إدارة الاقسام',
        'managment_views' => 'إدارة أراء أولياء الأمور',
        "managment_honoraryboard"=>"ادارة لوحة الشرف",
        "managment_students_notes"=>"ادارة ملاحظات المتدربين",
        'managment_schools' => 'ادارة الفرق',
        'managment_analytics' => 'ادارة اﻹحصائيات',
        'managment_students_news' => 'إدارة أخبار المتدربين',
        'managment_notes' => 'ادراة الملاحظات العامه للطلاب',
        'managment_chats' => 'إدارة المحادثات',
        'managment_certifcate' => 'إدارة الشهادات',
        'managment_student_teacher_notes' => 'إدارة ملاحظات المتدربين للمعلمين'
    ],

    'subject' => [
        'name' => 'إسم الدوره',
        'description' => 'وصف الدوره',
        'semester' => 'الفصل الدراسي',
        'first_semester' => 'الفصل الدراسي الأول',
        'second_semester' => 'الفصل الدراسي الثاني',
        'year' => 'السنة الدراسية',
        'majors' => 'إختر التخصص المطلوب',
        'edit' => 'تعديل بيانات الدوره',
        'delete' => 'حذف الدوره'
    ],

    'teacher' => [
        'personal_info' => 'المعلومات الشخصية',
        'academic_info' => 'المعلومات الأكاديمية',
        'teacher_subjects' => 'دورات الاستاذ',
        'teacher_image' => 'صورة الاستاذ',
        'teacher_edit' => 'تعديل بيانات الاستاذ',
        'teacher_delete' => 'حذف الاستاذ'
    ],

    'staff' => [
        'image' => 'صورة الموظف',
        'edit' => 'تعديل بيانات الموظف',
        'delete' => 'حذف الموظف'
    ],

    'top_header' => [
        'profile' => 'الملف الشخصي',
        'profile_edit' => 'تعديل الملف الشخصي',
        'logout' => 'تسجيل الخروج',
        'settings' => 'الإعدادات',
        'home_page' => 'رئيسية الموقع'
    ],

    'settings' => [
        'site_settings' => 'إعدادات الموقع',
        'phone' => 'رقم الجوال'
    ],


    'statuses' => [
        'major_created' => 'تم إنشاء التخصص بنجاح',
        'major_deleted' => 'تم حذف التخصص بنجاح',
        'major_activation' => 'تم تغير حالة التخصص بنجاح',
        'major_edited' => 'تم تحديث بيانات التخصص بنجاح',
        "latestnews_activation"=>"تم تغير حالة الخبر بنجاح",
        "laestnews_deleted"=>"تم حذف الخبر بنجاح",
        'laestnews_created' => 'تم إنشاء الخبر بنجاح',
        'course_created' => 'تم إنشاء الكورس بنجاح',
        'serves_created' => 'تم إنشاء الخدمه بنجاح',
        'whyus_created' => 'تم إنشاء لماذا بنجاح',
        'laestnews_edited' => 'تم تحديث بيانات الخبر بنجاح',
        'subject_created' => 'تم إنشاء الدورة بنجاح',
        'subject_deleted' => 'تم حذف الدورة بنجاح',
        'subject_activation' => 'تم تغير حالة الدورة بنجاح',
        'subject_edited' => 'تم تحديث بيانات الدورة بنجاح',
        'teacher_created' => 'تم إنشاء الدكتور بنجاح',
        'teacher_updated' => 'تم تعديل بيانات الدكتور بنجاح',
        'teacher_deleted' => 'تم حذف الدكتور بنجاح',
        'teacher_activation' => 'تم تغير حالة الدكتور بنجاح',
        'login_successfully' => 'تم التسجيل الدخول بنجاح',
        'staffs_activation'=>'تم تغير حالة الموظف بنجاح',
        'staff_created'=>'تم إنشاء الموظف بنجاح',
        'staff_deleted'=>'تم حذف الموظف بنجاح',
        'student_created' => 'تم إنشاء المتدرب بنجاح',
        'student_updated' => 'تم تعديل بيانات المتدرب بنجاح',
        'student_deleted' => 'تم حذف المتدرب بنجاح',
        'student_activation' => 'تم تغير حالة المتدرب بنجاح',
        'lecture_created' => 'تم إنشاء المحاضرة بنجاح',
        'lecture_deleted' => 'تم حذف المحاضرة بنجاح',
        'lecture_updated' => 'تم تعديل بيانات المحاضرة بنجاح',
        'lecture_activation' => 'تم تغير حالة المحاضرة بنجاح',
        'login_successfully' => 'تم التسجيل الدخول بنجاح',
        'virtual_classroom_created' => 'تم إنشاء البث المباشر بنجاح',
        'settings_update' => 'تم تعديل إعدادات الموقع بنجاح',
        'academic_year_created' => 'تم إنشاء السنة الدراسية بنجاح',
        'year_activation' => 'تم تغير حالة السنة الدراسية بنجاح',
        'year_updated' => 'تم تعديل بيانات السنة الدراسية بنجاح',
        'year_deleted' => 'تم حذف السنه بنجاح',
        'message_deleted' => 'تم حذف الرسالة بنجاح',
        'group_created' => 'تم إنشاء المجموعه بنجاح',
        'group_updated' => 'تم تعديل معلومات المجموعة بنجاح',
        'group_delete_member' => 'تم حذف العضو من المجموعة بنجاح',
        'group_add_members' => 'تمت إضافة الأعضاء الي المجموعة بنجاح',
        'group_add_post' => 'تم إضافة المنشور بنجاح',
        'group_delete_comment' => 'تم حذف التعليق بنجاح',
        'group_delete_post' => 'تم حذف المنشور بنجاح',
        'view_activation' => 'تم تغير حالة التعليق بنجاح',
        'view_deleted' => 'تم حذف التعليق بنجاح',
        'view_updated' => 'تم إضافة الرد بنجاح',
        "honoraryboard_created"=>"تم اظافة طالب الي لوحة الشرف بنجاح",
        "honoraryboard_updated"=>"تم تحديث  لوحة الشرف بنجاح",
        "honoraryboard_delete"=>"تم حذف طالب من لوحة الشرف بنجاح",
        'honoraryboard_activation' => 'تم تغير حالة لوحة الشرف بنجاح',

    ],
    'messages' => [
        'name' => 'إسم المرسل',
        'message' => 'نص الرسالة',
    ],
    'students'=>[
        'subjects' => 'دورات المتدرب',
        'select_major'=>"اختر التخصص",
        'major'=>"تخصص المتدرب",
        'image' => 'صورة المتدرب',
        'edit' => 'تعديل بيانات المتدرب',
        'delete' => 'حذف المتدرب',
        "name"=>"اسم المتدرب"
    ],

    "honoraryboards"=>[
        "create"=>"اضافة طالب",
        "edit"=>"تعديل لوحة الشرق",
        "name"=>"اسم المتدرب",
        "university"=>" التخصص",
        'interview_url' => 'رابط المقابلة'
    ],
    "year_un"=>"سنة التخرج",
    "marker"=>"العلامة",

    'lecture' => [
        'name' => 'إسم المحاضرة',
        'description' => 'وصف المحاضرة',
        'select_subject' => 'إختر الدوره',
        'select_teacher' => 'إختر الاستاذ',
        'teacher_name' => 'إسم الاستاذ',
        'edit' => 'تعديل بيانات المحاضرة',
        'delete' => 'حذف المحاضرة'
    ],
 'course' => [
        'name' => 'إسم الكورس',
        'durat' => 'مده الكورس',
        'price' => 'سعر الكورس',
        'time' => 'وقت الكورس',
        'description' => 'وصف الكورس',
        'select_subject' => 'إختر الكورس',
        'select_teacher' => 'إختر الاستاذ',
        'teacher_name' => 'إسم الاستاذ',
        'image' => 'إسم الصوره',
        'edit' => 'تعديل بيانات الكورس',
        'delete' => 'حذف الكورس'
    ],
'services' => [
        'name' => 'إسم الخدمة',
        'description' => 'وصف الخدمة',
        'image' => 'إسم الخدمة',
        'edit' => 'تعديل بيانات الكورس',
        'delete' => 'حذف الكورس'
    ],
    'whyuse' => [
        'name' => 'إسم لماذا الاتحاد',
        'description' => 'وصف لماذا الاتحاد',
        'image' => 'إسم لماذا الاتحاد',
        'edit' => 'تعديل بيانات لماذا الاتحاد',
        'delete' => 'حذف لماذا الاتحاد'
    ],

    'academic_years' => [
        'create' => 'إنشاء سنة دراسية',
        'name' => 'إسم السنة الدراسية',
        'edit' => 'تعديل السنة الدراسية',
        'year' => 'السنة الدراسية'

    ],

    'virtual_classroom' => [
        'title' => 'إسم الحصة',
        'lecture' => 'المحاضرة',
        'start_time' => 'وقت بدء الحصة',
        'duration' => 'مدة الحصة',
        'duration_help_text' => 'اقل مدة 30 دقيقة و اقصى مدة 300 دقيقة',
        'extend_duration' => 'تمديد مدة الحصة',
        'create_recording' => 'تسجيل الحصة',
        'attendee_limit' => 'عدد الحضور',
        'webinar_url' => 'رابط الويبينار',
        'wiziq_webinar_title' => 'For Wiziq and Webinar',
        'webinar_end_time' => 'وقت نهاية الحصه',
        'webinar_description' => 'وصف المحاضرة',
        'webinar_account' => 'حساب الويبينار'

    ]
];
