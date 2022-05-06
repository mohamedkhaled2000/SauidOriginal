<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagesRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Image;

class PagesController extends Controller
{
    public function index(){
        $pages = DB::table('pages')->latest()->get();
        return view('admin.pages.index',compact('pages'));
    }

    public function add(){
        return view('admin.pages.add');
    }

    public function store(PagesRequest $request){
        $request->validated();


        $path = 'images/pages/'.Str::random(20).'.webp';
        Image::make($request->file('image'))->resize(1024, 768)->save(public_path($path));

        $page = new Page();
        $page->title = $request->title;
        $page->title_slug = strtolower(str_replace(' ' , '-',$request->title));
        $page->content = $request->content;
        $page->image = $path;
        $page->status = $request->status;
        $page->save();

        $notification = array(
            'message' => 'تم اضافة الصفحة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);
    }

    public function edit($id){
        $page = Page::find($id);
        return view('admin.pages.adit',compact('page'));
    }


    public function update(PagesRequest $request,$id){
        $request->validated();
        $page = Page::find($id);

        $page->title = $request->title;
        $page->title_slug = strtolower(str_replace(' ' , '-',$request->title));
        $page->content = $request->content;
        $page->status = $request->status;

        if($request->file('image')){
            if($page->image){
                unlink($page->image);
            }


            $path = 'images/pages/'.Str::random(20).'.webp';
            Image::make($request->file('image'))->encode('webp', 90)->resize(1024, 768)->save(public_path($path));
            $page->image= $path;
            $page->save();

            $notification = array(
                'message' => 'تم تعديل الصفحة بنجاح',
                'alert-type' => 'success'
            );

            return redirect()->route('all.pages')->with($notification);

        }else{
            $page->save();
            $notification = array(
                'message' => 'تم تعديل الصفحة بنجاح',
                'alert-type' => 'success'
            );

            return redirect()->route('all.pages')->with($notification);
        }
    }

    public function destroy($id){
        $page = Page::find($id);
        unlink($page->image);
        $page->delete();
        $notification = array(
            'message' => 'تم حذف الصفحة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);
    }

}

