<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "author_id" => rand(1, 3),
            "category_id" => rand(1, 7),
            "title" => fake()->sentence(4),
            "excerpt" => fake()->sentence(10),
            "content" => fake()->sentence(50)
        ];
    }
}
