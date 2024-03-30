<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Tracklist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'album_id',
        'artist_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function tracklists()
    {
        return $this->belongsToMany(Tracklist::class, 'tracklists_songs'); //lie entre les deux tables via la table pivot
    }
}
