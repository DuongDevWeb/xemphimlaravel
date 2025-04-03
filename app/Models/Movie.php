<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $table = 'movies';
    public $timestamps = false;


    // kết nối id với nhau thì có kết giống để lấy dữ liệu

    // 1-với nhiều video 1 quốc gia có 1 video 
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    // Trong model Movie
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    //  nhiều 1 video có nhiều server 
    public function movies()
    {
        return $this->hasMany(Movie::class, 'server_id', 'id');
    }

    // nhiều
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
    

}
