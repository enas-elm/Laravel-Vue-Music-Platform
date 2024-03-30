<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return Inertia::render('Album/Index', [
            'albums' => Album::all(),
            'artists' => Artist::all()
        ]);
    }

    
    public function show(Album $album)
    {
        return Inertia::render('Album/Show', [
            'album' => $album->load('songs')
        ]);
    }
}
