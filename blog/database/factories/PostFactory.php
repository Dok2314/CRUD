<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => $this->faker->sentence(3),
            'content' => $this->faker->text(20),
            'likes' => rand(50, 2000),
            'is_published' => rand(0, 1)
        ];
    }
}
