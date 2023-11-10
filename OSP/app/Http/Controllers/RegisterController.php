<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class RegisterController extends Controller
{
    public function create(){
        return view("register/create",[
            // 
        ]);
    }

    public function store(){

        
        //validate the form, if failed, it sends you back to the form, so you won't get past this block. the values then getstored in the $attributes array
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',//can also be declared in an array
            'username' => 'required|min:3|max:255|unique:users,username',//unique:users,username --> check if the username is unique in the users table in the column username
            'email' => 'required|email|max:255|unique:users,email',//unique:users,email --> check if the email is unique in the users table in the column email
            'password'=> 'required|min:8||max:255|confirmed',
            'biography' => 'max:2000',
            'profile_picture'=> 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        //create user
        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password'=> Hash::make(request('password')),
            'is_admin' => false,
            'biography' => request('biography'),
            'profile_picture_url'=> request('profile_picture') ? request('profile_picture')->store('profile_pictures', 'public') : 'profile_pictures/default_profile_picture.png',
        ]);  
       
        //sign in user
        auth()->login($user);

        //send success flashmessage --> can also be included in redirect by putting this in the return: redirect('/')->with('success','Your account has been created. You are now signed in.');
        session()->flash('success','Your account has been created. You are now signed in.');

        //redirect to home page
        return redirect('/');

    }

}
