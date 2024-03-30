<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Song;
use App\Models\User;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;

use App\Models\Tracklist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Artist::truncate();
        Album::truncate();
        Song::truncate();
        Tracklist::truncate();



        User::factory(10)->create();
        Artist::factory(20)->create();
        Album::factory(30)->create();
        Song::factory(30)->create();
        Tracklist::factory(30)->create();



        $tracklists = Tracklist::all();
        foreach ($tracklists as $tracklist) {
            $tracklist->songs()->attach(
                Song::inRandomOrder()->limit(5)->get()->pluck('id')
            );
        }


        Schema::enableForeignKeyConstraints();

    }
}
