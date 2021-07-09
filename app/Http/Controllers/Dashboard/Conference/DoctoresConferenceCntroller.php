<?php

namespace App\Http\Controllers\Dashboard\Conference;
use App\Models\DoctoresConf;
use App\Models\DoctorsConferences;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class DoctoresConferenceCntroller extends Controller
{
    public function index()
    {

        $alldoct = DoctoresConf::all()->sortByDesc('id');

        return view('dashboard.all_doctorsconf.index', compact( 'alldoct'));
    }

    // groupSelected
    public function create()
    {

        return view('dashboard.all_doctorsconf.create');
    }

    public function store(Request $request)
    {
        // try {
        $rules = [
            'doct_name' => 'required|string',
            'doct_job' => 'required|string',

        ];
        $validator = Validator::make($request->all(), $rules);
        $requests = $request->all();

        if ($validator->fails()) {
            return redirect()->route('alldoctconf.create')->with('errors', $validator->messages()->get('*'))->with('data', $requests);
        }
        $confers = DoctoresConf::create([
            'doct_name' => $request->doct_name,
            'doct_job' => $request->doct_job,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('alldoctconf.index')->with(['success' => 'تم الحفظ بنجاح']);



        // } catch (\Exception $ex) {
        //     return redirect()->route('admin.students')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }
    }


    public function edit($id)
    {
        $doctors = DoctoresConf::find($id);

        return view('dashboard.all_doctorsconf.edit', compact('doctors'));

    }

    public function update(Request $request,  DoctoresConf $docrtors)
    {


        $validator = Validator::make($request->all(), [
            'doct_name' => 'required|unique',
            'doct_job' => 'required',
        ]);


        $docrtors->doct_name = $request->doct_name;
        $docrtors->doct_job = $request->doct_job;

        $docrtors->save();
        session()->flash('success', __('تم التعديل بنجاح'));

        return response()->json(["redir"=>route('alldoctconf.index')]);
    }


    public function destroy($id)
    {
        try {
            $doct = DoctoresConf::find($id);
            if ($doct === false) {
                return redirect()->route('alldoctconf.index')->with(['error' => 'الطالب غير موجود']);
            }
            $doct->delete();


            return redirect()->route('alldoctconf.index')->with(['success' => 'تم حذف الطالب بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('alldoctconf.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function getDivMajor($id)
    {
        $division = Division::where('major_id', $id)->get();

        return response()->json(['data' => $division]);
    }

    public function getcityGaver($id)
    {

        $gaver = Village::where('governorate_id', $id)->get();

        return response()->json(['data' => $gaver]);

    }


}
