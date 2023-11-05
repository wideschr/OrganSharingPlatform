<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\ContactFormMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(){
        
        return view("contact.create");
    }


    public function store(Request $request){
        //validate the form
        request()->validate([
            'email' => 'required|email',
            'message' => 'required|min:10|max:1000'
        ]);

        //create instance of model and save to db
        $contactFormMessage = ContactFormMessage::create([
            "email" => $request->email,
            "message" => $request->message,
        ]);

        try {
            //Send email to myself --> check env file, mail.php and services.php + Mailable object i created --> ContactFormMail
            Mail::to(env("MAIL_FROM_ADDRESS"))
                    ->cc($request->user())  
                    ->send(new ContactFormMail($contactFormMessage));   

        } catch (\Exception $e) {
            return back()->with("error", $e->getMessage());
        }
        


        return back()->with("success","Your message has been sent successfully!");

    }
}
