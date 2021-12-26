<?php
namespace Database\Factories;

use App\Models\User;
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
        return [
            'title'     => $title= $this->faker->sentence(),
            'slug'      => Str::slug($title),
            'excerpt'   => $this->faker->paragraph(4),
            'content'   => $this->faker->paragraphs(4, true),
            'author_id' => User::factory(),
            'status'    => $this->faker->randomElement(['draft', 'published', 'in-review']),
        ];
    }
}
