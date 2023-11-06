<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function create(User $user){

        //get offers of user
        $offers = $user->offer()->latest()->with('user', 'species', 'euthanasia_method')->paginate(6)->withQueryString();

        //get all offers for filter section
        $allOffers = Offer::latest()->with('user', 'species', 'euthanasia_method')->get();

        //get all offers for filters
        $selections = [];

        return view("profile.publicProfile",[
            "user"=> $user,
            "offers"=> $offers,
            "allOffers"=> $allOffers,
            "selections"=> $selections
        ]);
    }   
}
