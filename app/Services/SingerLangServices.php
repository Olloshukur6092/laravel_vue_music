<?php

namespace App\Services;

use App\Models\SingerLangs; 

class SingerLangServices
{

    // 
    protected $langModel;
    public function __construct(SingerLangs $singerLangs)
    {
        $this->langModel = $singerLangs->query();
    }

    // this method SingerLang Model get data;
    public function singerLangIndexService()
    {
        return $this->langModel->where(['status' => '1'])->get();
    }

    //this method saved SingerLang Model data;
    public function singerLangStoreService($langName):void
    {
        $this->langModel->create([
            'lang_name' => $langName
        ]);
    }
}
