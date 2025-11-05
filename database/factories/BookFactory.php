<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(30),
            'author_id' => \App\Models\Author::inRandomOrder()->first()->id,
            'publisher_id' => \App\Models\Publisher::inRandomOrder()->first()->id,
        ];
    }
}
