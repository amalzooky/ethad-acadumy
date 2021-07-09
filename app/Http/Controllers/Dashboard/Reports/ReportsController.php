<?php

namespace App\Http\Controllers\Dashboard\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\StudentSearchSelect2Resource;
use App\Http\Resources\CitySearchSelect2Resource;
use App\Http\Resources\SchoolsSearchSelect2Resource;
use App\WatchingRecordedCounter;
use App\City;
use App\School;
use App\Student;
use Carbon\Carbon;

class ReportsController extends Controller
{
    //

    public function watchingRecorded()
    {
        $watchingRecorded = WatchingRecordedCounter::orderBy('wiziq_counter')->orderBy('webinar_counter')->get();
        
        return view('dashboard.reports.recording', compact('watchingRecorded'));
    }

    public function select2Search(Request $request)
    {
        $q = $request->q;
        $users  = [];
        if ($q) {
            $users = User::role('student')->where(function ($query) use ($q) {
                $query->where("username", "like", "%$q%");
                $query->orWhere("email", "like", "%$q%");
                $query->orWhere("full_name", "like", "%$q%");
            })->limit(20)->get();
            $users = StudentSearchSelect2Resource::collection($users);
        }

        return response()->json($users);
    }

    public function watchingRecordedSearch(Request $request)
    {
        $result = WatchingRecordedCounter::where('student_id', $request->student)->get();
        $student_name = WatchingRecordedCounter::where('student_id', $request->student)->first();
  
        
        return view('dashboard.reports.recording_result', compact('result', 'student_name'));
    }

    public function citiesReport()
    {
        $cities = City::with('users')->get()->sortBy(function($user){
            return $user->users->count();
        }, SORT_REGULAR, true);
     
        return view('dashboard.reports.cities', compact('cities'));
    }

    public function select2CitiesSearch(Request $request)
    {
        $q = $request->q;
        $cities  = [];
        if ($q) {
            $cities = City::where(function ($query) use ($q) {
                $query->where("name", "like", "%$q%");
            })->limit(20)->get();
            $cities = CitySearchSelect2Resource::collection($cities);
        }

        return response()->json($cities);
    }

    public function citiesSearchResult(Request $request)
    {
        
        $count = City::where('id', $request->city)->first()->users()->has("student")->count();
        $name = City::where('id', $request->city)->first()->name;
     
        return view('dashboard.reports.cities_result', compact('count', 'name'));
    }

    public function schoolsReport()
    {
        $schools = School::with('students')->get()->sortBy(function($school){
            return $school->students->count();
        }, SORT_REGULAR, true);
       
        return view('dashboard.reports.schools', compact('schools'));
    }

    public function select2SchoolsSearch(Request $request)
    {
        $q = $request->q;
        $schools  = [];
        if ($q) {
            $schools = School::where(function ($query) use ($q) {
                $query->where("name", "like", "%$q%");
            })->limit(20)->get();
            $schools = SchoolsSearchSelect2Resource::collection($schools);
        }

        return response()->json($schools);
    }

    public function schoolsSearchResult(Request $request)
    {
     
        
        $count = School::where('id', $request->schools)->first()->students->count();
       
        $name = School::where('id', $request->schools)->first()->name;
        
        return view('dashboard.reports.schools_result', compact('count', 'name'));
    }

    public function studentsReport()
    {
        return view('dashboard.reports.students');
    }

    public function studentsReportSearch(Request $request)
    {
        $f = $request->from;
        $t = $request->to;

        $from    = Carbon::parse($request->from)
        ->startOfDay()        // 2018-09-29 00:00:00.000000
        ->toDateTimeString(); // 2018-09-29 00:00:00

        $to      = Carbon::parse($request->to)
        ->endOfDay()          // 2018-09-29 23:59:59.000000
        ->toDateTimeString(); // 2018-09-29 23:59:59
        
        $students = Student::whereBetween('created_at', [$from, $to])->get();
       
        return view('dashboard.reports.students_result', compact('students', 'f', 't'));
    }
}
