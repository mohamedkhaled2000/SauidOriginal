<?php

namespace App\Http\Controllers;

use App\Models\AllComment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AllCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCommet()
    {
        $comments = AllComment::all();
        return view('admin.posts.posts_comment',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comments = AllComment::insert([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'تم ارسال التعليق بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllComment  $allComment
     * @return \Illuminate\Http\Response
     */
    public function show(AllComment $allComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllComment  $allComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AllComment $allComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AllComment  $allComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllComment $allComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllComment  $allComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AllComment::find($id)->delete();
        $notification = array(
            'message' => 'تم حذف التعليق بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
