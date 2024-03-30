<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Inertia\Inertia;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Tracklist;
use Illuminate\Http\Request;

class AppController extends Controller
{
    
    public function welcome()
    {
        return Inertia::render('Welcome');
    }
    
    public function index()
    {
        return Inertia::render('Homepage', [
            'artists' => Artist::all(),
            'songs' => Song::all(),
            'albums' => Album::all(),
            'tracklists' => Tracklist::where('is_public', true)->get(),
        ]);
    }
}
