<?php

namespace Supri\ETU\UNTAG\Services;

use PHPUnit\Framework\TestCase;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Domain\Users;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;

class SessionsServiceTest extends TestCase
{
    private SessionsRepository $sessionsRepository;
    private UserRepository $userRepository;
    private SessionsService $sessionsService;

    protected function setUp():void
    {
        $this->sessionsRepository = new SessionsRepository(Database::getConnection());
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->sessionsService = new SessionsService($this->sessionsRepository, $this->userRepository);
    }

    public function testCreateSucces()
    {
        $this->sessionsService->create('test');

    }

    public function testCreateSucces1()
    {
        $this->sessionsService->create('supriyantohQ03m');
    }


}
