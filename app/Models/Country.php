<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $table = 'countries';
    public $timestamps = false;

    public function movies()
    {
        return $this->hasMany(Movie::class, 'country_id'); // Mỗi country có nhiều phim
    }

}
