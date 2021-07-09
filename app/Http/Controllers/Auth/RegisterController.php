<?php

namespace App\Http\Controllers\Auth;

use App\Gavernement;
use App\User;
use App\Major;
use App\Subject;
use App\Student;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

        /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $majors = Major::where('is_active', 1)->latest()->get();
        $cities = Gavernement::get();
        return view('auth.register', compact('majors', 'cities'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator =  Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'full_name' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'numeric'],
            'telephone_number' => ['Nullable', 'numeric'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'major_id' => ['required'],
            'city_id' => ['required'],
            'sex' => ['required'],
            'card_stu' => ['required'],
            // 'subjects' => ['required'],
            'password' => ['required', 'string', 'min:6', 'max:15'],
        ]);

        $attributeNames =  [
            'full_name' => __('global.full_name'),
            'mobile_number' => __('global.mobile_number'),
            'telephone_number' => __('global.telephone_number'),
        ];

        $validator->setAttributeNames($attributeNames);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(  array $data )
    {
        //  dd($data['card_stu']);
       $filePath = "";
       if ($data['card_stu']) {

        $filePath = uploadImage('abouts', $data['card_stu']);
    }
      

        $user = User::create([
            'username' => $data['username'],
            'full_name' => $data['full_name'],
            'telephone_number' => $data['telephone_number'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'city_id' => $data['city_id'],
            'sex' => $data['sex'],
            'card_stu' => $filePath,
            'password' => Hash::make($data['password']),
            
        ]);

        $user->assignRole('student');

        $student = Student::create([
            'major_id' => $data['major_id'],
            'user_id' => $user->id,
            'membership_no'=> rand(100 ,999). $user->id
        ]);

         $student->subjects()->attach($data['subjects']);


        // Mail::to($data['email'])->send(new WelcomeMail($user));

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        session()->flash('alert-success', 'تمت عملية إنشاء الحساب بنجاح! الرجاء التواصل معنا لتفعيل حسابك');

        return back();

    }

        /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

    }

    public function getSubjects($id)
    {
        $majorID = $id;
        $subjects = Subject::where('is_active', 1)->where('major_id', $majorID)->whereHas('academicYear', function($q){
            $q->where('year', now()->year);
        })->get();

        $fillter = [];
        foreach($subjects as $subject){
            $fillter[] = [
                'id' => $subject->id,
                'name' => $subject->name,
            ];
        }
        return response()->json([
            'subjects' => $fillter,
        ]);
    }
}
