<?php

namespace App\Services;

use App\Models\News;

class NewsServices {

    protected $newsModel;
    public function __construct(News $news)
    {
        $this->newsModel = $news->query();
    }

    // this method News Model get data
    public function newsIndexService()
    {
        return $this->newsModel->where(['status' => '1'])->get();
    }

    //this method News Model saved data
    public function newsStoreService($newsTitle, $newsDesc):void
    {
        $this->newsModel->create([
            'title' => $newsTitle,
            'news_description' => $newsDesc,
        ]);
    }
}