<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'song_name',
        'song_title',
        'song_description',
        'singers_id',
        'singer_langs_id',
        'singer_genres_id',
        'song_img',
        'song_mp3',
        'song_date',
        'view_count',
        'song_download',
    ];

    public function singer()
    {
        return $this->belongsTo(Singer::class, 'singers_id', 'id');
    }
    public function genre()
    {
        return $this->belongsTo(SingerGenre::class, 'singer_genres_id', 'id');
    }

    public function lang()
    {
        return $this->belongsTo(SingerLangs::class, 'singer_langs_id', 'id');
    }
}
