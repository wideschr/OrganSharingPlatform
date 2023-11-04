<?php

namespace Database\Factories;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'offer_id'=> function () {
                return rand(1, Offer::count());
            },
            'body' => fake()->paragraph(),
            'published_at' => fake()->dateTimeBetween('-1 years', 'now'),            
        ];
    }
}
