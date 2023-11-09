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
        $faqs = Faq::all()->groupBy('topic');

        return view('faq.faq',[
            'faqs' => $faqs,
        ]);
    }

    public function store(Request $request){
        //check input
        $request->validate([
            'topic' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required|max:2000',
        ]);

        //store in db
        try {
            Faq::create([
                'user_id'=>\Auth::user()->id,
                'topic' => $request->topic,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }


        return back()->with('success','FAQ created successfully!');
        
    }

    public function update(Request $request, Faq $faq){
        //validate input
        $request->validate([
            'topic' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required|max:2000',
        ]);

        //update faq in db
        try{
            $faq->update([
                'topic' => $request->topic,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        }
        catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return back()->with('success','FAQ updated successfully!');

    }

    public function destroy(Faq $faq){
        try {
            $faq->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return back()->with('success','FAQ deleted successfully!');
        
    }
}
