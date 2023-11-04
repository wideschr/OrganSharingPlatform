<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\User;
use App\Models\Species;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    //this function is called to show an indivdual offer.
    public function show(Offer $offer)
    {
        return view('offers/offer', [
            'offer' => $offer,
        ]);
    }


    //maybe to be merged with show function --> rename to index
    public function filter()
    {      
        //get selections from url and store in array
        $selections = array(
            'search' => request('search'),
            'type' => request('type'),
            'species' => request('species'),
            'strain' => request('strain'),
            'sex' => request('sex'), 
            'vital_status' => request('vital_status'), 
            'organisation' => request('organisation'), 
            'expiration_date' => request('expiration_date'), 
            'euthanasia_method' => request('euthanasia_method'),
        );        

        //get the filtered offers using filter scope in Offer model with the selections array as parameter
        $offers = Offer::latest()
                        ->with('user', 'species', 'euthanasia_method')
                        ->filter(request(['search', 'type', 'species', 'strain', 'sex','vital_status','organisation',"expiration",'euthanasia_method' ,'username']))//->filter($selections)
                        ->paginate(6)->withQueryString();
        
        //get all offers for setting up the filters --> no need to paginate
        $allOffers = Offer::latest()->with('user', 'species', 'euthanasia_method')->get();
       
                                  
    
          
        return view('offers/index', [
            'offers' => $offers,
            'allOffers'=>$allOffers,
            'selections'=> $selections,
        ]);

    }
}
