<?php

namespace App\Http\Controllers\Dashboard\Conference;

use App\City;
use App\Models\Bankaccount;
use App\Models\Clasesroom;
use App\Models\Division;
use App\Models\Governorate;
use App\Models\Groups;
use App\Models\MainCategory;
use App\Models\Major;
use App\Models\MemmbersConferences;
use App\Models\Payment;
use App\Models\SchoolsItems;
use App\Models\Schoolsyears;
use App\Models\Semester;
use App\Models\StudentsSubjects;
use App\Models\Subjects;
use App\Models\Teacher;
use App\Models\Vendor;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MemmbersConferenceCntroller extends Controller
{

    public function index()
    {

        $memmbesconf = MemmbersConferences::all()->sortByDesc('id');

        return view('admin.students.index', compact('vendors', 'categories'));
    }
    // groupSelected
    public function create()
    {
       $govers= Gavernement::all();
        return view('admin.students.create', compact('memmbesconf','govers'));
    }

    public function store(Request $request)
    {
//return $request;
        // try {
        $rules = [
            'name_conf' => 'required|string',
            'tel_conf' => 'required|string',
            'email_conf' => 'required|email',
            'Membership_no' => 'required|integer',
            'cover_conf' => 'required|string',
            'adress_conf' => 'required|string',
            'job_conf' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        $requests = $request->all();

        if ($validator->fails()){
            return redirect()->route('admin.students.create')->with('errors', $validator->messages()->get('*'))->with('data', $requests);
        }

        if (MemmbersConferences::all()->where('name_conf', $request->name_conf)->count() > 0){
            return redirect()->route('admin.students.create')->with('errorUsername', 'اسم المستخدم مسجل بالفعل')->with('data', $requests);
        }

//        $doctors = [];
//        if (!empty($request->subject[0][0])){
//            if (!empty($request->subject[0][0])){
//                $allSubjects = $request->subject;
//                foreach ($allSubjects as $subject){
//                    if (isset($subject['price']) && !empty($subject['price'])) {
//                        if (Subjects::find($subject[0]) === false)
//                            return redirect('admin.students.create')->with('error', 'فشل فى اضافه المواد')->with('data', $requests);
//                        else
//                            $subjects[] = ['subject' => $subject[0], 'price' => $subject['price'], 'tax' => $subject['tax'], 'payme_id' => $subject['payme_id'], 'bankname_id' => $subject['bankname_id'], 'bandnum_id' => $subject['bandnum_id'], 'discount' => $subject['discount']];
//                    } else {
//                        return redirect()->route('admin.students.create')->with('error', 'مطلوب ادخال سعر لكل ماده')->with('data', $requests);
//                    }
//                }
//            }
//        }
        // dd($subjects );
        $memmbers = MemmbersConferences::create([
            'name_conf' => $request->name_conf,
            'tel_conf' => $request->tel_conf,
            'email_conf' => $request->email_conf,
            'Membership_no' => $request->Membership_no,
            'cover_conf' => $request->cover_conf,
            'adress_conf' => $request->adress_conf,
            'job_conf' => $request->job_conf,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


//            Notification::send($vendor, new VendorCreated($vendor));

        return redirect()->route('admin.students')->with(['success' => 'تم الحفظ بنجاح']);

        // } catch (\Exception $ex) {
        //     return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }
    }
    public function showactive()
    {
        $categories = MainCategory::where('translation_lang', get_default_lang())
            ->selection()
            ->get();
        $vendors = Vendor::all()->sortByDesc('id');

        $astudents = Vendor::Active()->get();

        return view('admin.students.allactive', compact('vendors', 'categories' ,'astudents'));
    }
    public function edit($id)
    {
        try {

            $vendor = Vendor::find($id);
            if (!$vendor)
                return redirect()->route('admin.students')->with(['error' => 'هذا الطالب غير موجود او ربما يكون محذوفا ']);

            $categories = MainCategory::where('translation_of', 0)->active()->get();
            $majors = Major::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $schools = SchoolsItems::all()->where('translation_lang', get_default_lang())->sortByDesc('school_id');
            $sc_years = Schoolsyears::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $subjects = Subjects::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $groups = Groups::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            // dd($groups);
            $cites = Village::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $gavers = Governorate::all()->where('translation_lang', get_default_lang())->sortByDesc('id');                $paymnts = Payment::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $banks = Bankaccount::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $school_years = Schoolsyears::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $semester = Semester::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $classrooms = Clasesroom::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $divitions = Division::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $teachers = Teacher::all()->sortByDesc('id');

            return view('admin.students.edit', compact('vendor','categories',  'gavers','classrooms', 'school_years', 'semester', 'banks', 'paymnts', 'teachers',  'divitions', 'cites', 'majors', 'schools', 'sc_years', 'subjects' ,'groups'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update(Request $request, $id)
    {

        // return $request;
        try {

            $rules = [
                'avatar' => 'nullable|image',
                'fullname' => 'required|string',
                'username' => 'required|string',
                'mobile' => 'required|string',
                'telephone_fix' => 'nullable|string',
                'email' => 'required|email',
                'birthday' => 'required|date',
                'gender' => 'required|integer',
                'expire_date' => 'nullable|date',
                'city' => 'required|string',
                'password' => 'required',
                'fb_student' => 'nullable|url',
                'fb_parent' => 'nullable|url',
                // 'st_teacher' => 'nullable|integer',
                'schoolyear' => 'nullable|integer',
                'classroom' => 'nullable|integer',
                'semester' => 'nullable|integer',
                // 'divat' => 'nullable|integer',
                'active' => 'nullable|integer',
                'active_notes' => 'nullable|integer',
                'active_dispernots' => 'nullable|integer',
                'disper_notes' => 'nullable|string',
                'show_notes'  => 'nullable|string',
                'major' => 'required|integer',
                'school' => 'nullable|integer',
                'group' => 'nullable|integer',
                'subject' => 'nullable|array',
                'subject.*' => 'nullable|array',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return redirect()->route('admin.students.edit', $id)->with('errors', $validator->messages()->get('*'));
            }

            $vendor = Vendor::all()->where('id', $id)->first();
            if (!$vendor)
                return redirect()->route('admin.students')->with(['error' => 'هذا الطالب غير موجود او ربما يكون محذوفا ']);

            DB::beginTransaction();

            if (Vendor::all()->where('username', $request->username)->where('id', '!=', $id)->count() > 0){
                return redirect()->route('admin.students.edit', $id)->with('errorUsername', 'اسم المستخدم مسجل بالفعل');
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            if (!$request->has('show_notes'))
                $request->request->add(['show_notes' => 0]);
            else
                $request->request->add(['show_notes' => 1]);

            $oldAvatar = $vendor->avatar;
            $filePath = null;
            if ($request->has('avatar')) {
                !empty($oldAvatar) && file_exists($oldAvatar) ? unlink($oldAvatar) : null;
                $filePath = uploadImage('vendors', $request->avatar);
            }

            $subjects = [];
            if (!empty($request->subject[0][0])){
                if (!empty($request->subject[0][0])){
                    $allSubjects = $request->subject;
                    foreach ($allSubjects as $subject){
                        if (isset($subject['price']) && !empty($subject['price'])) {
                            if (Subjects::find($subject[0]) === false)
                                return redirect('admin.students.edit', $vendor->id)->with('error', 'فشل فى اضافه المواد');
                            else
                                $subjects[] = ['subject' => $subject[0], 'price' => $subject['price'], 'tax' => $subject['tax'], 'discount' => $subject['discount']];
                        } else {
                            return redirect()->route('admin.students.edit', $vendor->id)->with('error', 'مطلوب ادخال سعر لكل ماده');
                        }
                    }
                }
            }

            $vendor->fullname = $request->fullname;
            $vendor->username = $request->username;
            $vendor->password = !empty($request->password) ? $request->password : $vendor->password;
            $vendor->avatar = !empty($filePath) ? $filePath : $oldAvatar;
            $vendor->mobile = $request->mobile;
            $vendor->telephone_fix = $request->telephone_fix;
            $vendor->email = $request->email;
            $vendor->city = $request->city;
            $vendor->birthday = $request->birthday;
            $vendor->gender = $request->gender;
            $vendor->fb_student = $request->fb_student;
            $vendor->fb_parent = $request->fb_parent;
            $vendor->expire_date = $request->expire_date;
            $vendor->major = $request->major;
            $vendor->schoolyear = $request->schoolyear;
            // $vendor->divat = $request->divat;
            // $vendor->st_teacher = $request->st_teacher;
            $vendor->classroom = $request->classroom;
            $vendor->semester = $request->semester;
            $vendor->school  = $request->school;
            $vendor->student_group = $request->group;
            $vendor->active = $request->active;
            $vendor->show_notes = $request->show_notes;
            $vendor->disper_notes = $request->disper_notes;

            if ($vendor->save()){
                // delete old subjects
                $oldSubject = StudentsSubjects::all()->where('student_id', $id);
                if (count($oldSubject)){
                    foreach ($oldSubject as $subject){
                        $subject->delete();
                    }
                }

                // put new subjects
                if (!empty($subjects)){
                    foreach ($subjects as $subject){
                        StudentsSubjects::create([
                            'subject_id' => $subject['subject'],
                            'student_id' => $vendor->id,
                            'subject_price' => $subject['price'],
                            'subject_tax'   => $subject['tax'],
                            'subject_discount' => $subject['discount'],
                        ]);
                    }
                }

                DB::commit();
                return redirect()->route('admin.students', $id)->with(['success' => 'تم التحديث بنجاح']);
            } else {
                DB::commit();
                return redirect()->route('admin.students', $id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->route('admin.students', $id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function view($id){
        try{
            $categories = MainCategory::where('translation_of', 0)->active()->get();
            $vendor = Vendor::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($vendor)){
                return redirect()->route('admin.students')->with(['error' => 'الطالب غير موجود']);
            }
            $city = DB::table('cities')->select('name')
                ->where('id', $vendor->city)
                ->orWhere('translation_of', $vendor->city)->first();

            return view('admin.students.view', compact('vendor', 'city', 'categories'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id){
        try{
            $student = Vendor::find($id);
            if ($student === false){
                return redirect()->route('admin.students')->with(['error' => 'الطالب غير موجود']);
            }
            $avatar = $student->avatar;
            if (Vendor::where('id', $id)->delete()){
                !empty($avatar) && file_exists($avatar) ? unlink($avatar) : null;
            }
            return redirect()->route('admin.students')->with(['success' => 'تم حذف الطالب بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $students = Vendor::find($id);
            if (!$students)
                return redirect()->route('admin.students')->with(['error' => 'هذا القسم غير موجود ']);

            $status =  $students -> active  == 0 ? 1 : 0;

            $students -> update(['active' =>$status ]);

            return redirect()->route('admin.students')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function getDivMajor($id){
        $division = Division::where('major_id',$id)->get();

        return response()->json(['data'=>$division ]);
    }
    public function getcityGaver($id){

        $gaver = Village::where('governorate_id',$id)->get();

        return response()->json(['data'=> $gaver]);

    }

}
