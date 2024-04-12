<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactPage;
use App\Http\Requests\ContactPageRequest;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
       return view('backend.contact.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact_page_details = ContactPage::first();
        return view('backend.site_setting.contactPage' , compact('contact_page_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::where('id' , $id)->first();
        return view('backend.contact.show' , compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactPageRequest $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = array();
            $image_file     =   $request->file('image');
            if ($image_file) {
                $image_filename = $image_file->getClientOriginalName();
                $success = $image_file->storeAs('public/images/contactPage/' , $image_filename);
                if (!isset($success)) {
                    return back()->withError('Could not upload logo');
                }
                $data["image"]=$image_filename;
            }

                $data["heading"]=$request->heading;
                $data["sub_heading"]=$request->sub_heading;
                $data["content"]=$request->content;
                $data["status"]=$request->status;
                $result=ContactPage::where('id',$id)->update($data);
                return redirect()->route('contact.create')->with('success' , 'Contact Page updated successfully');;
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
