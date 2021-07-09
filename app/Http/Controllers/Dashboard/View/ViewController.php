<?php

namespace App\Http\Controllers\Dashboard\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\View;

class ViewController extends Controller
{
    public function index()
    {
        $views = View::latest()->get();
        return view('dashboard.views.index', compact('views'));
    }

    public function destroy($id)
    {
        $view = View::findOrFail($id);
        $view->delete();
        session()->flash('success', __('dashboard.statuses.view_deleted'));
    }

    public function update($id)
    {
        $view = View::findOrFail($id);
        $view->reply = request()->reply;
        $view->user_id = auth()->id();
        $view->save();
        session()->flash('success', __('dashboard.statuses.view_updated'));

        return response()->json('success');
    }

    public function activation()
    {
        
        $id = request()->id;
        
        $view = View::findOrFail($id);

        if($view->is_active == 1){
            $view->is_active = 0;           
        } else {
            $view->is_active= 1;
        }

       if($view->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.view_activation')
        ]);
        
       }        
    }
}
