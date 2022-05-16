<?php

namespace Supri\ETU\UNTAG\Services;

use PHPUnit\Framework\TestCase;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Exception\HandlerException;
use Supri\ETU\UNTAG\Model\UserRegistrationRequest;
use Supri\ETU\UNTAG\Repository\UserRepository;

class UserServicesTest extends TestCase
{
    private UserRepository $userRepository;
    private UserServices $UserServices;
    protected function setUp():void
    {
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->UserServices = new UserServices($this->userRepository);
        
        $this->UserServices->deleteAllUser();
    }

    public function testSuccess()
    {
        $user = new UserRegistrationRequest();
        $user->setName("Supriyanto");
        $user->setBagian("Bagian Coba");
        $user->setPassword("Supri@123");
        $user->setPasswordConfirm('Supri@123');
        $user->setEmail("supri@gmail.com");
        $user->setDateAdd(date('Y-m-d'));

        $this->UserServices->register($user);

        $byEmail = $this->userRepository->findByEmail('supri@gmail.com');

        self::assertEquals($byEmail->getName(), 'Supriyanto');
    }

    public function testDuplicateUsers():void
    {
        $user = new UserRegistrationRequest();
        $user->setName("Supriyanto");
        $user->setBagian("Bagian Coba");
        $user->setPassword("Supri@123");
        $user->setPasswordConfirm('Supri@123');
        $user->setEmail("supri@gmail.com");
        $user->setDateAdd(date('Y-m-d'));

        $this->UserServices->register($user);

        $this->expectException(HandlerException::class);

        $user1 = new UserRegistrationRequest();
        $user1->setName("Supriyanto");
        $user1->setBagian("Bagian Coba");
        $user1->setPassword("Supri@123");
        $user1->setPasswordConfirm('Supri@123');
        $user1->setEmail("supri@gmail.com");
        $user1->setDateAdd(date('Y-m-d'));

        $this->UserServices->register($user1);
    }


}
