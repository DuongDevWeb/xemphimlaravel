<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'server'; // Tên bảng
    public $timestamps = false; // Nếu bảng không có cột `created_at` và `updated_at`

    public function movies()
    {
        return $this->hasMany(Movie::class, 'server_id', 'id');
    }
    
}
