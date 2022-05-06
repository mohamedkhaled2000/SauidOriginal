<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function homeAbout(){
        $abouts = HomeAbout::latest()->get();
        return view('admin.home.index',compact('abouts'));
    }

    public function addAbout(){
        return view('admin.home.add');
    }

    public function store(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'تم الاضافة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('home.about')->with($notification);
    }

    public function edit($id)
    {
        $abouts = HomeAbout::find($id);
        return view('admin.home.adit',compact('abouts'));
    }

    public function update(Request $request, $id)
    {

            HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'تم التحديث بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('home.about')->with($notification);

    }

    public function destroy($id)
    {
        HomeAbout::find($id)->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

}
