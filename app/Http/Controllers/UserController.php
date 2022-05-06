<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Logout(){
        Auth::logout();
        $notification = array(
            'message' => 'User logout successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }
}
