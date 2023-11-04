<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    //guarded vs fillable. Fillable defines what is assignable. Guarded defines what is not assignable. 
    //If you use guarded, you have to define all the attributes that are not assignable. 
    //If you use fillable, you have to define all the attributes that are assignable. --> easier to use guarded if you have a lot of attributes
    protected $guarded = ["id"];
 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast. --> cast to a certain data type. This was already defined by laravel.
     * Copilot says 'hashed' is not a valid data type, but it is. It is defined in the laravel framework. because it works out of the box.
     * I will comment it out and write an alternative, the mutator function in the User model.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

///////Mutators (setXxxxxAttrbutes) and Accessors(getXxxxxAttribute) are used to modify data before saving it to the database and after retrieving it from the database.
    //mutator function to hash the password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    //accessor function to get the name in uppercase (example to demonstrate how to use accessors)
    public function getNameAttribute($value)
    {
        return ucwords($value); 
    }



////////RELATIONSHIPS
    //define relationship to offer
    public function offer(){
        return $this->hasMany(Offer::class, 'user_id');
    }

    //define relationship to comment
    public function comment(){
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
