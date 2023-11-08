<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create()
    {
        //get faqs from db
        $faq = Faq::all();

        return view('faq.faq',[
            'faq' => $faq,
        ]);
    }
}
