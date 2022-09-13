<?php

namespace App\Services;

use App\Models\Song;

class SongsServices
{

    protected $songModel;
    public function __construct(Song $song)
    {
        $this->songModel = $song->query();
    }

    //this method Songs model get data
    public function songsIndexService()
    {
        return $this->songModel->where(['status' => 1])->orderby('id', 'desc')->with(['singer', 'genre', 'lang'])->get();
    }

    //this method Song Model saved data
    public function songsStoreService($songName, $songTitle, $songDesc, $singerId, $songLangId, $songGenreId, $songDate): void
    {
        $this->songModel->create([
            'song_name' => $songName,
            'song_title' => $songTitle,
            'song_description' => $songDesc,
            'singers_id' => $singerId,
            'singer_langs_id' => $songLangId,
            'singer_genres_id' => $songGenreId,
            'song_date' => $songDate,
        ]);
    }

    // this method Song model edit data
    public function editSongsService($songId)
    {
        return $this->songModel->where(['id' => $songId])->get();
    }

    // this method update song model
    public function updateSongsService($songId, $songName, $songTitle, $songDesc, $singerId, $songLangId, $songGenreId, $songDate): void
    {
        $this->songModel->where(['id' => $songId])->update([
            'song_name' => $songName,
            'song_title' => $songTitle,
            'song_description' => $songDesc,
            'singers_id' => $singerId,
            'singer_langs_id' => $songLangId,
            'singer_genres_id' => $songGenreId,
            'song_date' => $songDate,
        ]);
    }


    // this method delete Song model data
    public function destroySongService($songId): void
    {
        $this->songModel->where(['id' => $songId])->update(['status' => 0]);
    }
}
