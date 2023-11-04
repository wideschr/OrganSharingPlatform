<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //truncate all tables
        \App\Models\Offer::truncate();
        \App\Models\Species::truncate();
        \App\Models\User::truncate();
        \App\Models\Euthanasia_method::truncate();


        // create tables
        //users
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'wito.ds@gmail.com',
            'password'=> bcrypt('admin'),
            'is_admin' => true
        ]);


        //create species
        $species = ["mouse", "rat", "dog", "pig", "rabbit"];
        foreach ($species as $option) {
            \App\Models\Species::create([
                'name' => $option,
            ]);
        };

        //create killing methods
        $euthanasia_methods = ["N/A","CO2", "Decapitation", "Overdose anesthesia", "other"];
        foreach ($euthanasia_methods as $option) {
            \App\Models\Euthanasia_method::create([
                'name' => $option,
            ]);
        };
        


        //create offers
        \App\Models\Offer::factory(15)->create();
    }
}
