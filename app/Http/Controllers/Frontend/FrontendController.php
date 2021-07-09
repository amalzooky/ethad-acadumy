<?php

namespace App\Http\Controllers\Frontend;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Major;
use App\Message;
use App\Latestnews;
use App\View;
use App\HonoraryBoard;
use App\Slider;
use App\Teacher;
use App\GalleryCategory;

use Artisan;

class FrontendController extends Controller
{
    public function index()
    {

        $allNews = Latestnews::where('is_active', 1)->latest()->paginate(15);
        $categories = GalleryCategory::latest()->get();

        $galleries = Gallery::latest()->get();

        $teachers = Teacher::whereHas('user', function($q){
            $q->where('is_active', 1)->where('email', '!=', 'abed.shuqair@gmail.com');
        })->latest()->take(7)->get();

        $testimonials = View::where('is_active', 1)->latest()->take(10)->get();
        $sliders = Slider::where('is_active', 1)->latest()->get();


        return view('site.index', compact('sliders', 'categories', 'galleries', 'allNews','testimonials', 'teachers'));
    }

    public function contact()
    {
        return view('site.contact.index');
    }

    public function massagessend(Request $request)
    {
        return $request;
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required',
            'mobile' => 'required|numeric',
        ]);

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'mobile' => $request->mobile
        ]);

        session()->flash('success', 'تم إرسال رسالتك بنجاح, شكرا لتواصلك معنا');

        return redirect()->route('/');
    }

    public function showNews($slug)
    {
        $news = Latestnews::where('slug', $slug)->first();

        return view('frontend.news.single', compact('news'));
    }
    public function allNews()
    {
        $allNews = Latestnews::where('is_active', 1)->latest()->paginate(15);

        return view('frontend.news.all', compact('allNews'));
    }
//*-------------------------------new pages acadimi aml---------------------*/
    public function Vismisvalues()
    {
        return view('site.academyadmin.Vismisvalues');
    }

    public function academydis()
    {
        return view('site.academyadmin.Academidecisions');
    }
    public function academyagent()
    {
        return view('site.academyadmin.AcademyAgent');
    }
    public function academypresid()
    {
        return view('site.academyadmin.AcademyPresident');
    }
    public function graduateStudies()
    {
        return view('site.academyadmin.GraduateStudies');
    }
    public function internatRelation()
    {
        return view('site.academyadmin.InternationalRelationship');
    }
    public function organizStructure()
    {
        return view('site.academyadmin.OrganizationalStructure');
    }
    public function qualityassurance()
    {
        return view('site.academyadmin.Qualityassurance');
    }
    public function Securityeducation()
    {
        return view('site.academyadmin.Securityeducation');
    }
    public function Specildeducation()
    {
        return view('site.academyadmin.Specializededucation');

    }
    /*------------------progame------------------------------*/
    public function introddiploma()
    {
        return view('site.academyprograms.Introddiploma');

    }
    public function leadPreparation()
    {
        return view('site.academyprograms.leadPreparation');

    }
    public function prepartechnicians()
    {
        return view('site.academyprograms.Prepartechnicians');

    }
    public function profesdoctor()
    {
        return view('site.academyprograms.Profesdoctor');

    }
    public function electscience()
    {
        return view('site.academyprograms.Electscience');

    }
    public function profesMaster()
    {
        return view('site.academyprograms.ProfesMaster');

    }
    public function professcience()
    {
        return view('site.academyprograms.Professcience');

    }
    public function professoftware()
    {
        return view('site.academyprograms.Professoftware');

    }
 public function qualifigraduates()
    {
        return view('site.academyprograms.Qualifigraduates');

    }

//*-------------------------------end pages distancelearning aml---------------------*/

public function distancelearning()
    {
        return view('site.distancelearning.index');

    }

//*-------------------------------end pages acadimi aml---------------------*/
public function securityconsulting()
    {
        return view('site.securityconsulting.index');

    }

//*-------------------------------end pages acadimi aml---------------------*/
//*-------------------------------end pages acadimi aml---------------------*/
public function alumniAssociation()
    {
        return view('site.studentsaffairs.AlumniAssociation');

    }
public function stelecticgate()
    {
        return view('site.studentsaffairs.electronicgate');

    }
public function stelectrservices()
    {
        return view('site.studentsaffairs.electronicservices');

    }
public function expatrservice()
    {
        return view('site.studentsaffairs.Expatriateservice');

    }
public function healthycare()
    {
        return view('site.studentsaffairs.healthcare');

    }
public function Studenthanbook()
    {
        return view('site.studentsaffairs.Studenthandbook');

    }
public function activservices()
    {
        return view('site.studentsaffairs.Studentactivities');

    }

//*-------------------------------end pages teachersaffairs aml---------------------*/

    public function techerelectic()
    {
        return view('site.studentsaffairs.electronicgate');

    }
public function techeraciveservice()
    {
        return view('site.teachersaffairs.Electronicservices');

    }
public function treandeveop()
    {
        return view('site.teachersaffairs.treandeveopment');

    }
public function teachguids()
    {
        return view('site.teachersaffairs.treandeveopment');

    }

//*-------------------------------end pages acadimi aml---------------------*//*-------------------------------end pages teachersaffairs aml---------------------*/

    public function complaint()
    {
        return view('site.studentsaffairs.electronicgate');

    }
public function questionnaire()
    {
        return view('site.teachersaffairs.Electronicservices');

    }
public function Qualityassura()
    {
        return view('site.teachersaffairs.treandeveopment');

    }

//*-------------------------------end pages acadimi aml---------------------*/
//*-------------------------------end pages newslater aml---------------------*//*-------------------------------end pages teachersaffairs aml---------------------*/

    public function newsletters()
    {
        return view('site.studentsaffairs.electronicgate');

    }
public function photogaphy()
    {
        return view('site.teachersaffairs.Electronicservices');

    }
public function presreleases()
    {
        return view('site.teachersaffairs.treandeveopment');

    }
    public function Juvenile()
    {
        return view('site.teachersaffairs.treandeveopment');

    }

//*-------------------------------end pages acadimi aml---------------------*/


    public function views()
    {
        $views = View::where('is_active', 1)->latest()->take(20)->get();

        return view('frontend.views.index', compact('views'));
    }

    public function Postview(Request $request)
    {
        $view = new View;

        $view->name = $request->name;
        $view->email = $request->email;
        $view->mobile = $request->mobile;
        $view->view = $request->view;

        $view->save();

        session()->flash('success', 'التعليق بإنتظار الموافقة, شكرا لك');

        return back();
    }

    public function honoraryboard(){

        return view('frontend.honoraryboards.index', [
            'honoraryboards' => HonoraryBoard::latest()->where("is_active",1)->paginate(1),
            'colors' => ['bg-orange', 'bg-shrock', 'bg-yellow', 'bg-blue', 'bg-darkBlue', 'bg-pink', 'bg-violet']
        ]);
    }

    public function galleryCategories()
    {
        $categories = GalleryCategory::latest()->paginate(10);

        return view('frontend.gallery_categories', compact('categories'));
    }

    public function teachers()
    {
        $teachers = Teacher::whereHas('user', function($q){
            $q->where('is_active', 1)->where('email', '!=', 'abed.shuqair@gmail.com');
        })->latest()->paginate(11);

        return view('frontend.teachers', compact('teachers'));
    }

    public function galleryCategory($id)
    {
        $category = GalleryCategory::findOrFail($id);
        $galleries = $category->galleries()->where('is_active', 1)->paginate(25);


        return view('site.gallery', compact('galleries', 'category'));
    }

    public function sendSuccess()
    {
        return view('site.success_send');
    }

}
