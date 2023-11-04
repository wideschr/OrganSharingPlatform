<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    //define relationship to offer
    public function offer()
    {
        return $this->hasMany(Offer::class, 'species_id');
    }
}
