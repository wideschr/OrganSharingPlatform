<?php

namespace Database\Factories;

use App\Models\Species;
use App\Models\User;
use App\Models\Euthanasia_method;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return rand(1, User::count());
            },
            'species_id'=> function () {
                return rand(1, Species::count());
            },
            'euthanasia_method_id'=> function () {
                return rand(1, Euthanasia_method::count());
            },

           'slug' => fake()->slug(), 
            'type' => fake()->randomElement(['offer', 'request']),
            
            'strain' => fake()->word(),
            'genetics'=> fake()->word(),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'dob' => fake()->date('Y-m-d', now()),
            'vital_status' => fake()->randomElement(['Alive', 'Dead']),
            'expiration_date' => fake()->dateTimeBetween(now()->addYears(-4), now()->addYears(4)),
            'organisation' => fake()->company(),
            'location' => fake()->address(),
            'removed_organs' => fake()->sentence(),
            'amount' => fake()->numberBetween(1, 10),
            'description' => fake()->paragraph(),
        ];
    }
}
