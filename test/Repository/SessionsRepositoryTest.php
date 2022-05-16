<?php

namespace Supri\ETU\UNTAG\Repository;

use PHPUnit\Framework\TestCase;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Domain\Session;

class SessionsRepositoryTest extends TestCase
{
    private SessionsRepository $sessionsRepository;

    protected function setUp():void
    {
        $this->sessionsRepository = new SessionsRepository(Database::getConnection());
        $this->sessionsRepository->deleteAll();
    }

    public function testCreate():void
    {
        $sessions = new Session();
        $sessions->setId('123');
        $sessions->setUserId('QkOZ8pHz496281eaf034f2b');
        $sessions->setTipe('tester');
        $sessions->setTimeLogin(date('Y-m-d H:i:s'));

        $this->sessionsRepository->create($sessions);

        $id = $this->sessionsRepository->findById('123');
        self::assertEquals($id->getUserId(), 'QkOZ8pHz496281eaf034f2b');
        self::assertEquals($id->getId(), '123');
    }

    public function testFindRole()
    {
        $sessions = new Session();
        $sessions->setId('123');
        $sessions->setUserId('QkOZ8pHz496281eaf034f2b');
        $sessions->setTipe('tester');
        $sessions->setTimeLogin(date('Y-m-d H:i:s'));

        $this->sessionsRepository->create($sessions);

        $role = $this->sessionsRepository->findRole('123');
        self::assertEquals($role->getRole(), 'user');
    }

}
