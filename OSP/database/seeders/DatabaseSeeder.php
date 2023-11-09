<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // create tables
        //users
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password'=> "Password!321",
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin2',
            'email' => 'wito.ds@gmail.com',
            'password'=> 'azertyuiop',
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
        \App\Models\Offer::factory(30)->create();

        //create comments
        \App\Models\Comment::factory(100)->create();


        //create contact form messages
        \App\Models\ContactFormMessage::factory(25)->create();

        //create faqs
        \App\Models\Faq::factory(20)->create();

    }
}
