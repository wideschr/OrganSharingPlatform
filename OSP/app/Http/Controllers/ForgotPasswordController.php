<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return view("forgot-password.create", [
            //
        ]);
    }

    public function sendResetLinkEmail(){
        
        $email = request("email");

        //check if email is registered
        if(!User::where("email", $email)->exists()){
            return back()->with("error", "This emailadress is not registered in our system. Please create an account.");
        }
        
        //send email to the offerer
        try {
            Mail::to($email)
                    ->cc(env("MAIL_FROM_ADDRESS"))
                    ->send(new ResetPasswordMail($email));   

        } catch (\Exception $e) {
            return back()->with("error", $e->getMessage() );//"Your message could not be sent. Please try again."
        }
        
        return back()->with("success","Your message has been sent successfully!");

    }


    public function showResetPassword($email){

        return view("forgot-password.resetPassword", [
            'email' => $email,
        ]);
    }


    public function storeResetPassword(Request $request){
        //validate the request
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);



        //get the user with the email
        try {
            $user = User::where('email', $request->email)->first();
        } catch (\Exception $e) {
            return back()->with('error', 'This emailadress is not registered in our system. Please create an account.' ); //this should not happen. email is already checked when they asked for the reset link
        }

        //reset their password to the new one
        try {
            $user->update([
                'password'=> Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'The password could not be reset. Try again later.' );
        }

        //log them in and go to home
        try {
            Auth::login( $user );
        } catch (\Throwable $th) {
            //reroute to the login page
            return redirect()->route('login')->with('success', 'Your password has been reset successfully. Please log in with your new password.' );
        }

        return redirect()->route('home')->with('success', 'Your password has been reset successfully. You are now logged in.' );
        


    }
}
