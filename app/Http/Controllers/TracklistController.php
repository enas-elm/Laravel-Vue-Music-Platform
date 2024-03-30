<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Tracklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class TracklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Tracklist/Index', [
            'tracklists' => Tracklist::where('is_public', true)->get(), // Tracklist en mode publique
        ]);
    }

    public function userTracklist()
    {
        return Inertia::render('Tracklist/UserTracklist', [
            'tracklists' => Tracklist::where('user_id', auth()->user()->id)->get(), // Tracklist du user connecté
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Tracklist/Create',[
            'users'=> User::all()
        ] 
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'cover'=> ['required', File::types(['png', 'jpg', 'jpeg'])],
            'is_public'=>'required',
            'user_id'=>'required',
        ]);

        $path = Storage::disk('public')->put('cover', $request->file('cover'));

        Tracklist::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $path,
            'is_public' => $request->is_public,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tracklist.userTracklist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tracklist $tracklist)
    {
        if ($tracklist->user_id == auth()->id()){ 
            $remove = true;
        }else{
            $remove = false;
            
        }
        return Inertia::render('Tracklist/Show', [
            'tracklist' => $tracklist->load('songs'),
            'remove' => $remove
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracklist $tracklist, User $user)
    { 
        if ($tracklist->user_id == auth()->id()){ //Edit only if is creator
            return Inertia::render('Tracklist/Edit',[
                'tracklist'=>$tracklist->load('user'),
                'users'=> User::where('id', auth()->user()->id)->get(),
    
                'songs' => $tracklist->load('songs'),
            ] );
        }else{
        return redirect()->route('tracklist.index');
            
        }
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracklist $tracklist)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'cover'=> ['required', File::types(['png', 'jpg', 'jpeg'])],
            'is_public'=>'required',
            'user_id'=>'required',
        ]);

        $path = Storage::disk('public')->put('cover', $request->file('cover'));
       
        $tracklist->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $path,
            'is_public' => $request->is_public,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tracklist.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
