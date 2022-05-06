<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\SEO;
use Illuminate\Http\Request;
class SEOController extends Controller
{
    public function index(){
        $seos = SEO::first();
        return view('admin.settings.seo_setting',compact('seos'));
    }

    public function update(Request $request, $id){
        SEO::findOrFail($id)->update([
            'meta_title'        => $request->meta_title,
            'meta_author'       => $request->meta_author,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'google_analytics'  => $request->google_analytics,
        ]);


        $notification = array(
            'message' => 'تم التحديث بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
