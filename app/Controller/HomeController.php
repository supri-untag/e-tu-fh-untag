<?php

namespace Supri\ETU\UNTAG\Controller;

use Supri\ETU\UNTAG\App\View;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Helper\HostHelper;
use Supri\ETU\UNTAG\Helper\TimeHelper;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;
use Supri\ETU\UNTAG\Services\SessionsService;

class HomeController
{
    private TimeHelper $timeHelper;
    private SessionsService $sessionsService;

    public function __construct()
    {
        $this->timeHelper = new TimeHelper();
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $sessionsRepository = new SessionsRepository($connection);
        $this->sessionsService = new SessionsService($sessionsRepository, $userRepository);
    }

    public function index():void
    {
        $users = $this->sessionsService->curent();
        if ($users === null){
            $model = [
                "tittle" => "Home",
                "url" => HostHelper::curentHost()
            ];
            View::render('Home/index',$model);
        } else {
            $role = $this->sessionsService->findRole();
            if ($role->getRole() === 'admin'){
                $model = [
                    "tittle" => "Admin",
                    "url" => HostHelper::curentHost()
                ];
                View::render('Home/admin',$model);
            }else {
                $model = [
                    "tittle" => "Users",
                    "url" => HostHelper::curentHost()
                ];
                View::render('Home/users', $model);
            }
        }
    }
}