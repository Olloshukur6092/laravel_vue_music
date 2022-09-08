<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingerLangs extends Model
{
    use HasFactory;
    protected $fillable = [
        'lang_name',
    ];

    public function lang()
    {
        $this->hasMany(Song::class);
    }
}
