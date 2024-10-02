<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Albums>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'image_url' => $this->faker->imageUrl(),
            'height' => $this->faker->numberBetween(100, 200),
            'width' => $this->faker->numberBetween(100, 200),
        ];
    }
}
