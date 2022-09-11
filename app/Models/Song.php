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
        'singer_id',
        'lang_id',
        'genre_id',
        'song_img',
        'song_mp3',
        'song_date',
        'view_count',
        'song_download',
    ];

    public function singer()
    {
        return $this->belongsTo(Singer::class);
    }
    public function genre()
    {
        return $this->belongsTo(SingerGenre::class);
    }

    public function lang()
    {
        return $this->belongsTo(SingerLangs::class);
    }
}
