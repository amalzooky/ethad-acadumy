<?php

namespace App\Http\Controllers\Dashboard\Conference;

use App\Models\Conferences;
use App\Models\Division;
use App\Models\DoctoresConf;
use App\Models\DoctorsConferences;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class ConferenceCntroller extends Controller
{

    public function index()
    {

        $allconfe = Conferences::all()->sortByDesc('id');

        return view('dashboard.all_conferences.index', compact( 'allconfe'));
    }

    // groupSelected
    public function create()
    {
        $alldocs = DoctoresConf::all();
        return view('dashboard.all_conferences.create' , compact('alldocs'));
    }

    public function store(Request $request)
    {
        // try {
        $rules = [
            'name_confer' => 'required|string',
            'date_confer' => 'required|string',
            'subject' => 'nullable|array',
            'subject.*' => 'nullable|array',
        ];
        $validator = Validator::make($request->all(), $rules);
        $requests = $request->all();

        if ($validator->fails()) {
            return redirect()->route('allconference.create')->with('errors', $validator->messages()->get('*'))->with('data', $requests);
        }
        $doctors_confer = [];
        $confers = Conferences::create([
            'name_confer' => $request->name_confer,
            'date_confer' => $request->date_confer,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if (!empty($doctors_confer)) {
            foreach ($doctors_confer as $docconf) {
                DoctorsConferences::create([
                    'doctors_id' => $docconf['doctors_id'],
                    'conference_id' => $confers->id,

                ]);
            }
        }


        session()->flash('success', __('الاضافة بنجاح'));
        return response()->json(["redir"=>route('allconference.index')]);


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

        return view('admin.students.allactive', compact('vendors', 'categories', 'astudents'));
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
            $gavers = Governorate::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $paymnts = Payment::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $banks = Bankaccount::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $school_years = Schoolsyears::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $semester = Semester::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $classrooms = Clasesroom::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $divitions = Division::all()->where('translation_lang', get_default_lang())->sortByDesc('id');
            $teachers = Teacher::all()->sortByDesc('id');

            return view('admin.students.edit', compact('vendor', 'categories', 'gavers', 'classrooms', 'school_years', 'semester', 'banks', 'paymnts', 'teachers', 'divitions', 'cites', 'majors', 'schools', 'sc_years', 'subjects', 'groups'));
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
                'show_notes' => 'nullable|string',
                'major' => 'required|integer',
                'school' => 'nullable|integer',
                'group' => 'nullable|integer',
                'subject' => 'nullable|array',
                'subject.*' => 'nullable|array',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('admin.students.edit', $id)->with('errors', $validator->messages()->get('*'));
            }

            $vendor = Vendor::all()->where('id', $id)->first();
            if (!$vendor)
                return redirect()->route('admin.students')->with(['error' => 'هذا الطالب غير موجود او ربما يكون محذوفا ']);

            DB::beginTransaction();

            if (Vendor::all()->where('username', $request->username)->where('id', '!=', $id)->count() > 0) {
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
            if (!empty($request->subject[0][0])) {
                if (!empty($request->subject[0][0])) {
                    $allSubjects = $request->subject;
                    foreach ($allSubjects as $subject) {
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
            $vendor->school = $request->school;
            $vendor->student_group = $request->group;
            $vendor->active = $request->active;
            $vendor->show_notes = $request->show_notes;
            $vendor->disper_notes = $request->disper_notes;

            if ($vendor->save()) {
                // delete old subjects
                $oldSubject = StudentsSubjects::all()->where('student_id', $id);
                if (count($oldSubject)) {
                    foreach ($oldSubject as $subject) {
                        $subject->delete();
                    }
                }

                // put new subjects
                if (!empty($subjects)) {
                    foreach ($subjects as $subject) {
                        StudentsSubjects::create([
                            'subject_id' => $subject['subject'],
                            'student_id' => $vendor->id,
                            'subject_price' => $subject['price'],
                            'subject_tax' => $subject['tax'],
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

    public function view($id)
    {
        try {
            $categories = MainCategory::where('translation_of', 0)->active()->get();
            $vendor = Vendor::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($vendor)) {
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

    public function destroy($id)
    {
        try {
            $student = Vendor::find($id);
            if ($student === false) {
                return redirect()->route('admin.students')->with(['error' => 'الطالب غير موجود']);
            }
            $avatar = $student->avatar;
            if (Vendor::where('id', $id)->delete()) {
                !empty($avatar) && file_exists($avatar) ? unlink($avatar) : null;
            }
            return redirect()->route('admin.students')->with(['success' => 'تم حذف الطالب بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function getDivDoct($id){
        $division = DoctoresConf::where('id',$id)->get();
        return response()->json(['data'=>$division ]);
    }


}
