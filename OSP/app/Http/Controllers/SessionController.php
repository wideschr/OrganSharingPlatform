<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect("/")->with("success", "You have been logged out.");
    }

    public function create()
    {
        return view("login/create", [
            //
        ]);
    }

    public function store()
    {
        //get the attributes from the form and validate them
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        //attempt to login the user with the credentials they provided. If succcess, user is autom. logged in. If not, error message is shown and user is redirected back to login page
        if(auth()->attempt($attributes)) {
            session()->flash('success','You are now logged in.');
            return redirect('/'); //->with("success", "You are now logged in.");
        } else {
            session()->flash('error','Your credentials could not be verified. Please try again.');
            return back()->withInput(); //withinput --> to keep the email in the form
        }

    }
}
