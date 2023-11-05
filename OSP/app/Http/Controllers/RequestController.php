<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RequestMail;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function create(Offer $offer){
        
        $offer = Offer::latest()->where('id', $offer->id)->with('user', 'species', 'euthanasia_method')->first();//need to take the first because otherwise it is a collection and not an object
        
        return view("offers.request",[
            "offer"=> $offer
        ]);
    }

    public function store(Request $request, Offer $offer){
        //validate the form
        request()->validate([
            'email' => 'required|email',
            'message' => 'required|min:10|max:1000'
        ]);

        //get the offer with the user, species, euthanasia method relationship
        $offer = Offer::latest()->where('id', $offer->id)->with('user', 'species', 'euthanasia_method')->first();//need to take the first because otherwise it is a collection and not an object

       //create an instance (currently not saving in db)
        $requestFormData = ([
            "email" => $request->email,
            "message" => $request->message,
        ]);

       //send email to the offerer
        try {
            //Send email to myself --> check env file, mail.php and services.php + Mailable object i created --> ContactFormMail
            Mail::to(env("MAIL_FROM_ADDRESS"))
                    ->cc($request->user())  
                    ->send(new RequestMail($requestFormData, $offer));   

        } catch (\Exception $e) {
            return back()->with("error", $e->getMessage());
        }
        


        return back()->with("success","Your message has been sent successfully!");
        

    }


}
