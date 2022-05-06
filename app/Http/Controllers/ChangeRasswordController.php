<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Image;
class ChangeRasswordController extends Controller
{

        public function __construct(){
        $this->middleware('auth');
    }

   public function changePassword(){
       return view('admin.body.changePassword');
   }

   public function updatePassword(Request $request)
   {

    $validationData = $request->validate([
        'current_password' => 'required',
        'password' => 'required|confirmed'
    ]);
        $new_pass = Hash::make($request->password);
        if(Hash::check($request->current_password,Auth::user()->password)){
            $user = User::find(Auth::id());
            $user->password = $new_pass;
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'تم تغير كلمة المرور بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'كلمة المرور الحالية خطا',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
   }

   public function updateProfile(){
       if(Auth::user()){
           $user = User::find(Auth::user()->id);
           if($user){
               return view('admin.body.user_profile',compact('user'));
           }
       }
   }

   public function update_profile(Request $request){


    $user = User::find(Auth::user()->id);
    $old_images = $request->old_image;
    $profile_photo_path = $request->file('profile_photo_path');


            if(!Auth::user()->profile_photo_path == null){

            $path = 'images/Profile/'.Str::random(20).'.webp';
            Image::make($request->file('profile_photo_path'))->save(public_path($path));


            unlink($old_images);
            if($user){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->profile_photo_path = $path;
                $user->save();
                $notification = array(
                    'message' => 'تم تحديث الملف الشخصى بنجاح',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'تم تحديث الملف الشخصى بنجاح',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $profile_photo_path = $request->file('profile_photo_path');

            $path = 'images/Profile/'.Str::random(20).'.webp';
            Image::make($request->file('profile_photo_path'))->save(public_path($path));

            if($user){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->profile_photo_path = $path;
                $user->save();
                $notification = array(
                    'message' => 'تم تحديث الملف الشخصى بنجاح',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'لم يتم التحديث',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
   }
}
