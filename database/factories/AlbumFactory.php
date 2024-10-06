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
            'album_name' => $this->faker->sentence(4),
            'album_description' => $this->faker->paragraph(3),
            'image_thumb_url' => $this->faker->imageUrl(),
        ];
    }
}
