<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TracklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'cover' => '/cover/playlist.jpg',

            'is_public' => $this->faker->boolean(),
            'user_id'=> User::all()->random()->id,
        ];
    }
}
