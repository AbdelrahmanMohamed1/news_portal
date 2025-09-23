<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }
    public function send(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            'email'=> 'required|email',
            'phone'=> 'required|string',
            'message'=> 'required|string',
            'title'=> 'required|string',
        ]);
        $contact=Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'title' => $request->title,
            'ip_address' => $request->ip(),
        ]);
        if(!$contact){
            Session::flash('error','Contact not sent');
            return redirect()->back();
        }
        Session::flash('success','Contact sent');
        return redirect()->back();
    }
}
