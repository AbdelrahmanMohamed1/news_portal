<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\frontend\NewSubscriber;
use App\Mail\frontend\NewSubscriberMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class NewLetterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        $newsletter = Newsletter::create([
            'email' => $request->email,
        ]);

        if (!$newsletter) {
            Session::flash('error', 'Something went wrong!');
            return redirect()->back();
        }
        Mail::to($request->email)->send(new NewSubscriberMail());

        Session::flash('success', 'You Subscribed Successfully!');
        return redirect()->back();
    }
}
