<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Offer;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Offer $offer){
        
        //validate the input
        request()->validate([
            'body' => 'required|min:3|max:255',            
        ]);

        
        //create comment
        Comment::create([
            'body'=> request('body'),
            'user_id'=> auth()->user()->id,
            'offer_id'=> $offer->id,
            'published_at'=> now(),

        ]);

        //send success flashmessage
        return back()->with('success','Your comment was successfully added.');

    }

    public function destroy(Offer $offer, $comment_id){
     
        Comment::latest()->where('id', $comment_id)->delete();
        
        //send success flashmessage
        return back()->with('success','Your comment was deleted.');

    }
}
