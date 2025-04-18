<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Genre extends Model
{
    use HasFactory;
    public $table = 'movie_genre';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre', 'genre_id', 'movie_id');
    }


}
