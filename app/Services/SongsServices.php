<?php

namespace App\Services;

use App\Models\Song;

class SongsServices {

    protected $songModel;
    public function __construct(Song $song)
    {
        $this->songModel = $song->query();
    }

    //this method Songs model get data
    public function songsIndexService()
    {
        return $this->songModel->orderby('id', 'desc')->with(['singer', 'genre', 'lang'])->get();
    }

    //this method Song Model saved data
    public function songsStoreService($songName, $songTitle, $songDesc, $singerId, $songLangId, $songGenreId, $songDate):void
    {
        $this->songModel->create([
            'song_name' => $songName,
            'song_title' => $songTitle,
            'song_description' => $songDesc,
            'singer_id' => $singerId,
            'lang_id' => $songLangId,
            'genre_id' => $songGenreId,
            'song_date' => $songDate,
        ]);
    }
}