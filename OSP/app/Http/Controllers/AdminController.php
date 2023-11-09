<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Offer;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {

        $users = User::all()->sortBy('name');
        $offers = Offer::latest()->with('user', 'species', 'euthanasia_method')->get();
        $faqs = Faq::all();

        return view("admin.admin", [
            'users' => $users,
            'offers' => $offers,
            'faqs'=> $faqs
        ]);
    }

    public function destroy(User $user)
    {

        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }

    public function storeCreatedUser(Request $request)
    {


        //check input
        $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            //unique:users,username --> check if the username is unique in the users table in the column username
            'email' => 'required|email|max:255|unique:users,email',
            //unique:users,email --> check if the email is unique in the users table in the column email
            'password' => 'required|min:8||max:255',
            'biography' => 'max:2000',
            'profile_picture' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        //set the is-admin
        if ($request->input('is_admin') == 'no') {
            $is_admin = false;
        }
        if ($request->input('is-admin') == 'yes') {
            $is_admin = true;
        }


        try {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make(request('password')),
                'biography' => $request->biography,
                'profile_picture_url' => $request->profile_picture ? $request->profile_picture->store('profile_pictures', 'public') : 'profile_pictures/default_profile_picture.png',
                'is_admin' => $is_admin,
            ]);

        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to create user');
        }

        return back()->with('success', 'User created successfully');
    }

    public function editUserCreate(User $user)
    {

        return view("admin.editUser", [
            'user' => $user,
        ]);
    }


    public function editUserStore(User $user, Request $request)
    {

        if (!Hash::check(request('password'), $user->password) && request('password')) {

            //validate the form, if failed, it sends you back to the form, so you won't get past this block. the values then getstored in the $attributes array
            $attributes = $request->validate([
                'name' => 'required|min:3|max:255',
                //can also be declared in an array
                'username' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                    //creates a unique rule that ignores the current user's ID. This means the username field must be unique among all users except for the current user.
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                    //creates a unique rule that ignores the current user's ID. This means the email field must be unique among all users except for the current user.
                ],
                'password' => 'required|min:8|max:255|confirmed',
                'biography' => 'max:2000',
                'profile_picture' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            try {
                //set the is-admin
                $is_admin = false;
                if ($request->input('is_admin') == '0') {
                    $is_admin = false;
                }
                if ($request->input('is-admin') == '1') {
                    $is_admin = true;
                }

                // update the attributes
                $user->update([
                    'name' => $attributes['name'],
                    'username' => $attributes['username'],
                    'email' => $attributes['email'],
                    'password' => Hash::make($attributes['password']),
                    'biography' => $attributes['biography'],
                    'profile_picture' => request('profile_picture') ? request('profile_picture')->store('profile_pictures', 'public') : $user->profile_picture,
                    'is_admin' => $is_admin,
                ]);
            } catch (\Exception $e) {
                return back()->with('error', $e);
            }

            return back()->with('success', 'Your profile data was successfully updated.');

        } else {
            //password hasn't been filled in, so update everything except password
            //validate the form, if failed, it sends you back to the form, so you won't get past this block. the values then getstored in the $attributes array
            $attributes = $request->validate([
                'name' => 'required|min:3|max:255',
                'username' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                    //creates a unique rule that ignores the current user's ID. This means the username field must be unique among all users except for the current user.
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                    //creates a unique rule that ignores the current user's ID. This means the email field must be unique among all users except for the current user.
                ],
                'biography' => 'max:2000',
                'profile_picture_url' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

           
            try {
                
                //set the is-admin
                $is_admin = false;
                if ($request->input('is_admin') == 0) {
                    $is_admin = false;
                }
                if ($request->input('is-admin') == 1) {
                    $is_admin = true;
                }

                //get the user and update the attributes
                $user->update([
                    'name' => $attributes['name'],
                    'username' => $attributes['username'],
                    'email' => $attributes['email'],
                    'biography' => $attributes['biography'],
                    'profile_picture_url' => request('profile_picture') ? request('profile_picture')->store('profile_pictures', 'public') : $user->profile_picture,
                    'is_admin' => $is_admin,
                ]);
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }

            return back()->with('success', 'Your profile data was successfully updated.');

        }
    }

}
