<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_Message;
use Brian2694\Toastr\Facades\Toastr;

class ContactMessage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $data['messages'] = Contact_Message::latest()->paginate(15);
        return view('backend.contact.message.index')->with($data);
    }
    public function details($id){
        $data['message'] = Contact_Message::find($id);

        $data['message']->view_status = 'read';
        $data['message']->save();
        return view('backend.contact.message.show')->with($data);
    }
    public function startstatus($id){
        $contact =  Contact_Message::find($id);
       if ( $contact->status == 'star') {
        $contact->status = 'normal';
    }
    else{
           $contact->status = 'star';
       }
       $contact->save();
      Toastr::success('Success', 'Updated Successfully');
        return back();
    }
    public function star(){

        $data['messages'] = Contact_Message::where('status','star')->paginate(15);
        return view('backend.contact.message.star')->with($data);
    }
    public function unread(){

        $data['messages'] = Contact_Message::where('view_status','unread')->paginate(15);
        return view('backend.contact.message.unread')->with($data);
    }
    public function total_mail(){

        $data['messages'] = Contact_Message::latest()->paginate(15);
        return view('backend.contact.message.total_mail')->with($data);
    }
}
