<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class MyOfferController extends Controller
{
    public function create(){
        //get offers of user
        $offers = Offer::latest()->where('user_id', auth()->user()->id)->with('user', 'species', 'euthanasia_method')->paginate(6)->withQueryString();
        $selections =[];
        $allOffers = Offer::latest()->with('user', 'species', 'euthanasia_method')->get();

        return view("offers.myOffers",[
            "offers"=> $offers,
            "selections"=> $selections,
            "allOffers"=> $allOffers
        ]);
    }
}
