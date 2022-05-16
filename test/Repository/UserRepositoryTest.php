<?php

namespace Supri\ETU\UNTAG\Repository;

use PHPUnit\Framework\TestCase;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Domain\Users;
use function PHPUnit\Framework\assertNull;

class UserRepositoryTest extends TestCase
{
    private UserRepository $userRepository;
    protected function setUp():void
    {
        $this->userRepository = new UserRepository(Database::getConnection());
    }


    public function testSaveSuccess():void
    {
        $requestTest = new Users();
        $requestTest->setId('1234');
        $requestTest->setName('Supri Test');
        $requestTest->setBagian('Bagian Coba');
        $requestTest->setUsername('');
        $requestTest->setPassword('1234');
        $requestTest->setEmail('email@1234.com');
        $requestTest->setDateAdd(date('Y-m-d'));
        $requestTest->setVerify('true');
        $requestTest->setRole('users');
        $requestTest->setImage('');

        $this->userRepository->save($requestTest);
        $byId = $this->userRepository->findById('1234');

        self::assertEquals($byId->getId(), '1234');
    }

    public function testFindByEmailNotFound():void
    {
        $byEmail = $this->userRepository->findByEmail('example.com');
        self::assertNull($byEmail);
    }
    public function testFindByEmail():void
    {
        $byEmail = $this->userRepository->findByEmail('email@1234.com');
        self::assertNotNull($byEmail);
    }

    public function testFindByusernameNotFound():void
    {
        $byUsername = $this->userRepository->findByUsername('username');
        self::assertNull($byUsername);
    }

    public function DeleteAll():void
    {
        $this->userRepository->deleteAll();

    }

}
