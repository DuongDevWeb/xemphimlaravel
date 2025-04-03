<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $table = 'genries';
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class,'genre_id');
    }
    
}
