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

    // this method Singer model delete data with id
    public function destroySingerService($singerId): void
    {
        $this->singerModel->where(['id' => $singerId])->update(['status' => 0]);
    }

    // this method edit Singer Model with id
    public function editSingerService($singerId)
    {
        return  $this->singerModel->where(['id' => $singerId])->get();
    }

    //this method Singer model data updated for
    public function updateSingerService($singerName, $singerId): void
    {
        $this->singerModel->where(['id' => $singerId])->update(['name' => $singerName]);
    }
}
