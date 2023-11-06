<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Euthanasia_method;
use App\Models\Offer;
use App\Models\User;
use App\Models\Species;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    //this function is called to show an indivdual offer.
    public function show(Offer $offer)
    {
        //get the offer with the user, species, euthanasia method relationship
        return view('offers/offer', [
            'offer' => $offer,
            'comments' => $offer->comment()->latest()->with('user')->get(),
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
            'expiration' => request('expiration'), 
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

    public function create(){
        return view('offers/create-offer', [
            'allOffers' => Offer::latest()->with('user', 'species', 'euthanasia_method')->get(),
        ]);
    }


    public function store(Request $request){
        //validate the request
        $arguments =  request()->validate([
            'species'=> 'required|min:2|max:255',
            'euthanasia_method'=> 'required|min:2|max:255',
            'type'=> 'required|min:2|max:255',
            'strain'=> 'required|min:2|max:255',
            'genetics'=> 'required|min:2|max:255',
            'dob'=> 'required|date',
            'expiration_date'=>'required|date',
            'location'=> 'required|min:2|max:255',
            'organisation'=> 'required|min:2|max:255',
            'removed_organs'=> 'required|min:2|max:1000',
            'amount'=> 'required|number|min:1|max:1000',
            'description'=> 'required|number|min:1|max:2000',
        ]);

        //get the necessry data from the request
        $species_id = Species::where('name', $request['species'])->first()->id;
        $euthanasia_method_id = Euthanasia_method::where('name', $request['euthanasia_method'])->first()->id;

      

        //create the offer
        try {
            $offer = Offer::create([
                'user_id'=> auth()->user()->id,
                'species_id'=> $species_id,
                'euthanasia_method_id'=> $euthanasia_method_id,
                'type'=> $request['type'],
                'strain'=> $request['strain'],
                'genetics'=> $request['genetics'],
                'sex'=> $request['sex'],
                'dob'=> $request['dob'],
                'vital_status'=> $request['vital_status'],
                'expiration_date'=> $request['expiration'],
                'location'=> $request['location'],
                'organisation'=> $request['organisation'],
                'removed_organs'=> $request['removed_organs'],
                'amount'=> $request['amount'],
                'description'=> $request['description'],
                'published_at'=> now(),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage()); //'The offer could not be created. Please try again later.'
        }

        return back()->with('success','The offer was created successfully.');

    }


}
