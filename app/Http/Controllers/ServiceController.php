<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Image;
class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index',compact('services'));
    }


    public function add()
    {
        return view('admin.services.add');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ],[
            'name.required' => 'هذا الحقل مطلوب',
            'image.required' => 'هذا الحقل مطلوب',
        ]);

        $path = 'images/Services/'.Str::random(20).'.webp';
        Image::make($request->file('image'))->resize(100, 100)->save(public_path($path));

        Service::insert([
                'name' => $request->name,
                'image' => $path,
        ]);

        $notification = array(
            'message' => 'تم الاضافة بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('all.service')->with($notification);

    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.adit',compact('service'));
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ],[
            'name.required' => 'هذا الحقل مطلوب',
            'image.required' => 'هذا الحقل مطلوب',
        ]);

        $service = Service::find($id);

        if($request->file('image')){
            if($service->image != null){
                unlink($service->image);
            }
            $path = 'images/Services/'.Str::random(20).'.webp';
            Image::make($request->file('image'))->resize(100, 100)->save(public_path($path));
            $service->update([
                    'name' => $request->name,
                    'image' => $path,
            ]);

            $notification = array(
                'message' => 'تم التحديث بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('all.service')->with($notification);
        }

        $service->update([
                'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'تم التحديث بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('all.service')->with($notification);

    }


    public function destroy($id)
    {
        $images = Service::find($id);
        unlink($images->image);

        $images->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

}
