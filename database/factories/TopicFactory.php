<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->words(2, true),
            'slug' => Str::slug($name),
            'meta' => [
                'color' => $this->faker->hexColor(),
            ],
        ];
    }
}
