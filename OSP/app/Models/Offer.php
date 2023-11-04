<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    //define relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //define relationship to species
    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }

    //Define relationship to killing method
    public function euthanasia_method()
    {
        return $this->belongsTo(Euthanasia_method::class, 'euthanasia_method_id');
    }

    public function scopeFilter($query, array $filters)
    {
        // if there is a search term in the url, search for it in the database --> ?? is the null safe operator adnd checks if there is a value for the key 'search' in the array $filters. If there is no value, it will return false

        $query->when($filters['search'] ?? false, function ($query, $search) {

            $query->where('description', 'like', '%' . request('search') . '%')
                ->orWhere('type', 'like', '%' . request('search') . '%')
                ->orWhere('strain', 'like', '%' . request('search') . '%')
                ->orWhere('sex', 'like', '%' . request('search') . '%')
                ->orWhere('organisation', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('removed_organs', 'like', '%' . request('search') . '%')
                ->orWhereHas('species', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
                ->orWhereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
                ->orWhereHas('user', function ($query) {
                    $query->where('username', 'like', '%' . request('search') . '%');
                })
                ->orWhereHas('euthanasia_method', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });

        });


        //get the offer where the species is the same as the species in the url
        $query->when($filters['species'] ?? false, function ($query, $species) {

            $query->whereHas('species', fn($query) =>
                $query->where('name', $species));



            //also works
            // $query
            //     ->whereExists(fn($query) =>
            //         $query->from('species')
            //             ->whereColumn('species.id', 'offers.species_id')
            //             ->where('species.name',  $species)
            //     );

        });

        //get the offer where the type is the same as the type in the url
        $query->when($filters['type'] ?? false, function ($query, $type) {
            $query->where('type', $type);
        });

        //username
        $query->when($filters['username'] ?? false, function ($query, $username) {
            $query->whereExists(
                fn($query) =>
                $query->from('users')
                    ->whereColumn('users.id', 'offers.user_id')
                    ->where('users.username', $username)
            );
        });


        //strain
        $query->when($filters['strain'] ?? false, function ($query, $strain) {

            $query
                ->where('strain', $strain);
        });

        //sex
        $query->when($filters['sex'] ?? false, function ($query, $sex) {
            $query
                ->where('sex', $sex);
        });

        //vital_status
        $query->when($filters['vital_status'] ?? false, function ($query, $vital_status) {
            $query
                ->where('vital_status', $vital_status);
        });

        //organisation
        $query->when($filters['organisation'] ?? false, function ($query, $organisation) {
            $query
                ->where('organisation', $organisation);
        });

        //expiration date
        $query->when($filters['expiration_date'] ?? false, function ($query, $expiration_date) {

            if ($expiration_date == "Available") {
                $query
                    ->where('expiration_date', '>=', now());
            } else {
                $query
                    ->where('expiration_date', '<', now());
            }
        });

        //euthanasia method
        // $query->when($filters['euthanasia_method'] ?? false, function ($query, $euthanasia_method) {
        //     $query->whereExists(
        //         fn($euthanasia_method) =>
        //         $query->from('euthanasia_methods')
        //             ->whereColumn('euthanasia_methods.id', 'offers.euthanasia_method_id')
        //             ->where('euthanasia_methods.name', $euthanasia_method)
        //     );
        // });

        $query->when($filters['euthanasia_method'] ?? false, function ($query, $euthanasia_method) {

            $query->whereHas('euthanasia_method', fn($query) =>
                $query->where('name', $euthanasia_method));

        });


    }
}
