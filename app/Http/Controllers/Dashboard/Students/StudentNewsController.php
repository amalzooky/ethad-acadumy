<?php

namespace App\Http\Controllers\Dashboard\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentNews;
use Yajra\Datatables\Datatables;
use App\Major;
use App\Student;


class StudentNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.students_news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::where('is_active', 1)->whereHas('students')->get();
        return view('dashboard.students_news.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',            
            'body' => 'required',            
            'image' => 'required',            
        ]);

        $attributeNames =  [
            'title' => 'عنوان الخبر',
            'body' => 'نص الخبر',
            'image' => 'صورة الخبر',
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }


        $news = new StudentNews;

        $news->title = $request->title;
        $news->body = $request->body;
        $news->image = $request->image;
        $news->is_active = $request->get('is_active', 0);
        $news->major_id = $request->major_id === null ? 0 : $request->major_id;

        $news->save();

        session()->flash('success', 'تم إنشاء الخبر بنجاح');

        return response()->json(["redir"=>route('student-news.index')]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    public function singleNews($id)
    {
        $news = StudentNews::findOrFail($id);
        return view('dashboard.students_news.single', compact('news'));
    }

    public function allNews()
    {

        $user = auth()->user();
        if(!$user->hasRole("student")){
            return back();
        }

        $student = Student::where('user_id', $user->id)->first();
        $allNews = StudentNews::where('major_id', 0)->orwhereHas('major', function($q) use ($student){
            $q->where('major_id', $student->major->id);
        })->latest()->paginate(10);

        return view('dashboard.students_news.all_news', compact('allNews'));
    }

    public function showNews($id)
    {
        $news = StudentNews::findOrFail($id);
        return view('dashboard.students_news.single', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = StudentNews::findOrFail($id);
        $majors = Major::where('is_active', 1)->whereHas('students')->get();
        return view('dashboard.students_news.edit', compact('news', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',            
            'body' => 'required',            
            'image' => 'required',            
        ]);

        $attributeNames =  [
            'title' => 'عنوان الخبر',
            'body' => 'نص الخبر',
            'image' => 'صورة الخبر',
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        $news = StudentNews::findOrFail($id);
        $news->title = $request->title;
        $news->body = $request->body;
        $news->image = $request->image;
        $news->is_active = $request->get('is_active', 0);
        $news->major_id = $request->major_id === null ? 0 : $request->major_id;

        $news->save();

        session()->flash('success', 'تم تعديل الخبر بنجاح');

        return response()->json(["redir"=>route('student-news.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = StudentNews::findOrFail($id);
        $news->delete();
        session()->flash('success', 'تم حذف الخبر بنجاح');
    }

    public function uploadImage()
    {
        $response = \FroalaEditor\Image::upload('/storage/uploads/students_news/');
        echo stripslashes(json_encode($response));
    }

    public function getAllStudentNews()
    {
        $news = StudentNews::latest()->with('major')->select('student_news.*');
        return Datatables::of($news)
        ->addColumn('action', function($news){
            return view('dashboard.datatable.students_news', [
                'id' => $news->id,
            ]);
        }) 
        ->addColumn('is_active', function($news){
            return view('dashboard.datatable.is_active', [
                'news' => $news
            ]);
        }) 
        ->editColumn('created_at', function($news){
            return $news->created_at->toFormattedDateString();
        })
        ->editColumn('major_id', function($news){
            return $news->major_id == 0 ? 'خبر عام' : $news->major->name;
        })
        ->editColumn('updated_at', function($news){
            return $news->updated_at->toFormattedDateString();
        })
        ->editColumn('id', function($news){
            static $id = 1;
            return $id++;
        })
        ->editColumn('image', function($news){
            return "<img class='dt-img' src='" . asset($news->image) . "'>";
        })
        ->rawColumns(['image', 'action', 'is_active'])
        ->make(true);
    }

    public function activation()
    {
        $id = request()->id;

        $studentNews = StudentNews::findOrFail($id);
        if($studentNews->is_active == 1){
            $studentNews->is_active = 0;           
        } else {
            $studentNews->is_active = 1;
        }

       if($studentNews->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.latestnews_activation')
        ]);
       }        
    }
}
