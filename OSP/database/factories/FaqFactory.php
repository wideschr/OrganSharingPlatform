<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>function () {
                return rand(1, User::count());
            },
            'topic' => $this->faker->sentence(3),
            'question' => $this->faker->sentence(10),
            'answer' => $this->faker->paragraph(2),
        ];
    }
}
