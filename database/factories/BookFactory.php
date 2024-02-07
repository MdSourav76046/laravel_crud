<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


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
            'title' => fake() -> sentence,
            'author' => fake() -> userName,
            'isbn' => fake() -> isbn13,
            'stock' => fake()-> randomNumber(1, 100),
            'price' => fake()-> randomFloat(2, 1, 100)
        ];
    }
}
