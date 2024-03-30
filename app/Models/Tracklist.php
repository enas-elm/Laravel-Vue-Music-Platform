<?php

namespace App\Models;

use App\Models\Song;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tracklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cover',
        'is_public',
        'user_id',
    ];
    public function songs(){
        return $this->belongsToMany(Song::class, 'tracklists_songs'); //lie entre les deux tables via la table pivot
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
