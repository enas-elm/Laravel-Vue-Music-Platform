<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Inertia\Inertia;
use App\Models\Artist;
use App\Models\Tracklist;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        return Inertia::render('Song/Index', [
            'songs' => Song::all(),
        ]);
    }

    
    public function show(Song $song, Artist $artist)
    {
        return Inertia::render('Song/Show', [
            'song' => $song,
            'artist' => $artist,
            'tracklists' => Tracklist::where('user_id', auth()->user()->id)->get(), // Tracklist du user connecté
        ]);
    }

    public function addToTracklist(Request $request, Tracklist $tracklist)
    {
        if ($tracklist->user_id == auth()->id()){ //Can add only if is creator of playlist
        $request->validate([
            'song' => 'required'
        ]);

        $tracklist->songs()->attach($request->song['id']);

        return redirect()->route('tracklist.userTracklist');}
    }

    public function removeToTracklist(Request $request, Tracklist $tracklist)
    {
        if ($tracklist->user_id == auth()->id()){ 
        $request->validate([
            'song' => 'required'
        ]);

        $tracklist->songs()->detach($request->song['id']);

        return redirect()->route('tracklist.userTracklist');
        }
    }


}
