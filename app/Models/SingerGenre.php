<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingerGenre extends Model
{
    use HasFactory;
    protected $fillable = [
        'genre_name',
    ];

    public function genre()
    {
        $this->hasMany(Song::class);
    }
}
