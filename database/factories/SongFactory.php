<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $artist = Artist::whereHas('albums')->get()->random();
        
        $songs = [
            'title' => $this->faker->name(),
            'album_id' => $album_id = $this->faker->boolean(70) ? $artist->albums->random()->id : null,
        ];

        // Get any artist if the song is doesnt belong to an album 
        if($album_id === null) {
            $songs['artist_id'] =  Artist::all()->random()->id;
            $songs['cover'] = '/cover/folklore.jpg';
        }
        // Else get an the artist of this same album and apply the same album cover to the album
        else{
            $songs['artist_id'] = $artist->id;
            $songs['cover']  = Album:: where('id', $album_id)->first()->cover;
        } 
        return $songs;
    }
}
