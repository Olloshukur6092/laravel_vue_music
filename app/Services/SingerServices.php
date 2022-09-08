<?php

namespace App\Services;

use App\Models\Singer;

class SingerServices
{

    protected $singerModel;
    public function __construct(Singer $singer)
    {
        $this->singerModel = $singer->query();
    }

    // this method get Singer Model data;
    public function indexService()
    {
        return $this->singerModel->where(['status' => '1'])->get();
    }

    // this method Singer model save singer data;
    public function storeService($singerName): void
    {
        $this->singerModel->create([
            'name' => $singerName,
        ]);
    }
}
