<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TracklistController;
use App\Http\Middleware\IsCreator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AppController::class, 'welcome']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/homepage', [AppController::class, 'index'])->name('homepage');

    Route::prefix('artist')->name('artist.')->group(function(){
        Route::get('/', [ArtistController::class, 'index'])->name('index');
        Route::get('/{artist}', [ArtistController::class, 'show'])->name('show');
    });

    Route::prefix('tracklist')->name('tracklist.')->group(function(){    
        Route::get('/', [TracklistController::class, 'index'])->name('index'); //visible tracklists
        Route::get('/create', [TracklistController::class, 'create'])->name('create');
        Route::post('/create', [TracklistController::class, 'store'])->name('store');   
        Route::get('/mytracklists', [TracklistController::class, 'userTracklist'])->name('userTracklist');  // user's tracklist
        Route::get('/{tracklist}', [TracklistController::class, 'show'])->name('show');


        Route::get('/{tracklist}/edit', [TracklistController::class, 'edit'])->name('edit');
        Route::post('/{tracklist}/', [TracklistController::class, 'update'])->name('update');

        Route::post('/{tracklist}/remove-to-tracklist', [SongController::class, 'removeToTracklist'])->name('removeToTracklist');

    });

    Route::prefix('song')->name('song.')->group(function(){
        Route::get('/', [SongController::class, 'index'])->name('index');
        Route::get('/{song}', [SongController::class, 'show'])->name('show');
        Route::post('/{tracklist}/add-to-tracklist', [SongController::class, 'addToTracklist'])->name('addToTracklist');


    });

    Route::prefix('album')->name('album.')->group(function(){
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::get('/{album}', [AlbumController::class, 'show'])->name('show');
    });
});




// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/myplaylists', function () {
        return Inertia::render('userTracklist');
    })->name('userTracklist');
});

