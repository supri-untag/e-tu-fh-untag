<?php

namespace Supri\ETU\UNTAG\Middleware;

use Supri\ETU\UNTAG\App\View;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;
use Supri\ETU\UNTAG\Services\SessionsService;

class MustNotLoginMiddleware implements Middleware
{
    private SessionsService $sessionsService;
    public function __construct()
    {
        $userRepository = new UserRepository(Database::getConnection());
        $sessionsRepository = new SessionsRepository(Database::getConnection());
        $this->sessionsService = new SessionsService($sessionsRepository,$userRepository);
    }
    public function before(): void
    {
        $users = $this->sessionsService->curent();
        if ($users !== null){
            View::redirect('/');
        }
    }
}