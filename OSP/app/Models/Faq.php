<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
