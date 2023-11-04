<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    //define relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Define relationship to offer
    public function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
