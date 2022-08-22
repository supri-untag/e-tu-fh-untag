<?php

namespace Supri\ETU\UNTAG\Controller;

use Supri\ETU\UNTAG\App\View;
use Supri\ETU\UNTAG\Helper\HostHelper;

class AdminController
{
    public function invetoryStock():void
    {
        $model = [
            "tittle" => "Persediaan",
            "url" => HostHelper::curentHost()
        ];
        View::render('Admin/stock', $model);
    }
    public function invetoryRequest():void
    {
        $model = [
            "tittle" => "Permintaan",
            "url" => HostHelper::curentHost()
        ];
        View::render('Admin/request', $model);
    }

    public function invetoryCirl():void
    {
        $model = [
            "tittle" => "Sirkulasi",
            "url" => HostHelper::curentHost()
        ];
        View::render('Admin/circ', $model);
    }
}