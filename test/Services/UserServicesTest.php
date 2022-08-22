<?php

namespace Supri\ETU\UNTAG\Services;

use PHPUnit\Framework\TestCase;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Exception\HandlerException;
use Supri\ETU\UNTAG\Model\UserLoginRequest;
use Supri\ETU\UNTAG\Model\UserRegistrationRequest;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;

class UserServicesTest extends TestCase
{
    private UserRepository $userRepository;
    private UserServices $UserServices;
    protected function setUp():void
    {
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->UserServices = new UserServices($this->userRepository);
        $sessionsRepository = new SessionsRepository(Database::getConnection());
        $sessionsRepository->deleteAll();
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

    public function testLoginSucces()
    {
        $user = new UserRegistrationRequest();
        $user->setName("Supriyanto");
        $user->setBagian("Bagian Coba");
        $user->setPassword("Supri@123");
        $user->setPasswordConfirm('Supri@123');
        $user->setEmail("supri@gmail.com");
        $user->setDateAdd(date('Y-m-d'));

        $this->UserServices->register($user);
        $loginRequest = new UserLoginRequest();
        $loginRequest->setEmailUsername('supri@gmail.com');
        $loginRequest->setPassword('Supri@123');

        $respon = $this->UserServices->login($loginRequest);
        self::assertEquals($loginRequest->getEmailUsername(),$respon->getUsers()->getEmail());
        self::assertTrue(password_verify($loginRequest->getPassword(), $respon->getUsers()->getPassword()));
    }

    public function testEmailNotFound():void
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

        $loginRequest = new UserLoginRequest();
        $loginRequest->setEmailUsername('salah');
        $loginRequest->setPassword('Supri@123');
        $this->UserServices->login($loginRequest);
    }

    public function testWrongPassword()
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
        $loginRequest = new UserLoginRequest();
        $loginRequest->setEmailUsername('supri@gmail.com');
        $loginRequest->setPassword('Supri');
        $this->UserServices->login($loginRequest);
    }

    public function testFieldIsZero()
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
        $loginRequest = new UserLoginRequest();
        $loginRequest->setEmailUsername(' ');
        $loginRequest->setPassword(' ');
        $this->UserServices->login($loginRequest);
    }

}
