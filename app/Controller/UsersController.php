<?php

namespace Supri\ETU\UNTAG\Controller;

use Supri\ETU\UNTAG\App\View;
use Supri\ETU\UNTAG\Helper\HostHelper;
use Supri\ETU\UNTAG\Helper\TimeHelper;

class UsersController
{
    private TimeHelper $timeHelper;

    public function __construct()
    {
        $this->timeHelper = new TimeHelper();
    }

    public function register():void
    {
        $this->timeHelper->setTimeServer();
        $model = [
            "tittle" => "Pendaftaran Users",
            "url" => HostHelper::curentHost()
        ];
        View::render('users/register', $model);
    }

    public function postRegister():void
    {
        $this->timeHelper->getDate();
    }

    public function successRegister():void
    {
        $this->timeHelper->setTimeServer();
        $model = [
            "tittle" => "Pendaftaran Success",
            "url" => HostHelper::curentHost()
        ];
        View::render('users/successRegister', $model);
    }

    public function login():void
    {
        $this->timeHelper->setTimeServer();
        $model = [
            "tittle" => "Login - ".date('D'),
            "url" => HostHelper::curentHost()
        ];
        View::render('users/login', $model);
    }

    public function logout():void
    {

    }
}