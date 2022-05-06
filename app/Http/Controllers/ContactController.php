<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function adminContact()
    {
        $contacts = Contact::first();
        return view('admin.contact.adit',compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addContact()
    {
        return view('admin.contact.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Contact Inserted Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.contact')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.adit',compact('contacts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            Contact::find($id)->update([
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'تم التحديث بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.contact')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Contact::find($id)->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}
