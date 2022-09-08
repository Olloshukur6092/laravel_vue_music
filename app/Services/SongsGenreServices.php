<?php

namespace App\Services;

use App\Models\SingerGenre;

class SongsGenreServices {

    protected $genreModel;
    public function __construct(SingerGenre $singerGenre)
    {
        $this->genreModel = $singerGenre->query();
    }

    //this method get SingerGenre Model data;
    public function songsGenreIndexService()
    {
        return $this->genreModel->where(['status' => '1'])->get();
    }

    //this method saved SingerGenere model data
    public function songsGenreStoreService($genreName):void
    {
        $this->genreModel->create([
            'genre_name' => $genreName
        ]);
    }
}