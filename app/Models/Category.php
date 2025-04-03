<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $timestamps = false;

    public function isHidden()
    {
        return $this->hidden ?? false;
    }
    public function movies()
    {
        return $this->hasMany(Movie::class,'category_id'); // Một category có nhiều phim
    }

    

}
