<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create () {
        return view('profile/profile', [
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    public function update (Request $request) {
        //check if password has been changed and is not null
        if(!Hash::check(request('password'), auth()->user()->password) && request('password')) {
            
            //validate the form, if failed, it sends you back to the form, so you won't get past this block. the values then getstored in the $attributes array
            $attributes = $request->validate([
                'name' => 'required|min:3|max:255',//can also be declared in an array
                'username' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('users')->ignore(auth()->user()->id),//creates a unique rule that ignores the current user's ID. This means the username field must be unique among all users except for the current user.
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore(auth()->user()->id),//creates a unique rule that ignores the current user's ID. This means the email field must be unique among all users except for the current user.
                ],
                'password'=> 'required|min:8|max:255|confirmed',
                'biography' => 'max:2000',
                'profile_picture'=> 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //get the user and update the attributes
            $user = auth()->user();
            $user->update([
                'name' => $attributes['name'],
                'username' => $attributes['username'],
                'email' => $attributes['email'],
                'password'=> Hash::make($attributes['password']),
                'biography' => $attributes['biography'],
                'profile_picture'=> request('profile_picture') ? request('profile_picture')->store('profile_pictures', 'public') : $user->profile_picture,
            ]);

            
            return back()->with('success','Your profile data was successfully updated.');

        }else{
            //password hasn't been filled in, so update everything except password

            //validate the form, if failed, it sends you back to the form, so you won't get past this block. the values then getstored in the $attributes array
            $attributes = $request->validate([
                'name' => 'required|min:3|max:255',//can also be declared in an array
                'username' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('users')->ignore(auth()->user()->id),//creates a unique rule that ignores the current user's ID. This means the username field must be unique among all users except for the current user.
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore(auth()->user()->id),//creates a unique rule that ignores the current user's ID. This means the email field must be unique among all users except for the current user.
                ],
                'biography' => 'max:2000',
                'profile_picture_url'=> 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //get the user and update the attributes
            $user = auth()->user();
            $user->update([
                'name' => $attributes['name'],
                'username' => $attributes['username'],
                'email' => $attributes['email'],
                'biography' => $attributes['biography'],
                'profile_picture_url'=> request('profile_picture') ? request('profile_picture')->store('profile_pictures', 'public') : $user->profile_picture,
            ]);

          
            
            return back()->with('success','Your profile data was successfully updated.');

        }
        
        
    }
}
