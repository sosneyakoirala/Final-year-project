<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        Mail::send('emails.contactmail', [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        ], function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
            $mail->to("sosneya.koiral@gmail.com")->subject('Job Contact');
        });
        return redirect()->back()->with('success', 'Thanks for contacting us, We will get back to you soon!');   
    }
}
