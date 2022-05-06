<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function homeSlider()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function addSlider(){
        return view('admin.slider.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = 'images/Sliders/'.Str::random(20).'.webp';
        Image::make($request->file('image'))->resize(1920, 1088)->save(public_path($path));

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'تم الاضافة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('home.slider')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.adit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_images = $request->old_image;
        $slider_image = $request->file('image');

        if($slider_image){
           $path = 'images/Sliders/'.Str::random(20).'.webp';
           Image::make($request->file('image'))->resize(1920, 1088)->save(public_path($path));

            unlink($old_images);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $path,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('home.slider')->with('success','تم التحديث بنجاح');

        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('home.slider')->with('success','تم التحديث بنجاح');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Slider::find($id);
        $old_images = $images->image;
        unlink($old_images);

        Slider::find($id)->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
