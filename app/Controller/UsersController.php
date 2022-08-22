<?php

namespace Supri\ETU\UNTAG\Controller;

use Supri\ETU\UNTAG\App\View;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Helper\HostHelper;
use Supri\ETU\UNTAG\Helper\TimeHelper;
use Supri\ETU\UNTAG\Model\UserLoginRequest;
use Supri\ETU\UNTAG\Model\UserRegistrationRequest;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;
use Supri\ETU\UNTAG\Services\SessionsService;
use Supri\ETU\UNTAG\Services\UserServices;

class UsersController
{
    private TimeHelper $timeHelper;
    private UserServices $userServices;
    private SessionsService $sessionsService;

    public function __construct()
    {
        $this->timeHelper = new TimeHelper();
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $sessionsRepository = new SessionsRepository($connection);
        $this->userServices = new UserServices($userRepository);
        $this->sessionsService = new SessionsService($sessionsRepository, $userRepository);
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
        $userRegistrationRequest = new UserRegistrationRequest();
        $userRegistrationRequest->setName($_POST['name']);
        $userRegistrationRequest->setBagian($_POST['dep']);
        $userRegistrationRequest->setEmail($_POST['email']);
        $userRegistrationRequest->setPassword($_POST['password']);
        $userRegistrationRequest->setPasswordConfirm($_POST['passwordConfirm']);
        $userRegistrationRequest->setDateAdd($_POST['date']);
        try {
            $this->userServices->register($userRegistrationRequest);
            $this->sessionsService->sessionDumpset($_POST['email']);
            $data = ['status' => 'success'];
            echo json_encode($data, JSON_THROW_ON_ERROR);
        }catch (\Exception $exception){
            $data = [
                'msg' =>$exception->getMessage(),
                'status' => 'error',
                'tittle' => 'Gagal'
            ];
            try {
                echo json_encode($data, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
            }
        }

    }

    public function successRegister():void
    {
        $this->timeHelper->setTimeServer();
        $model = [
            "tittle" => "Pendaftaran Success",
            "url" => HostHelper::curentHost()
        ];
        View::render('users/successRegister', $model);
        $this->sessionsService->sessionDumpDestroy();
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

    public function postLogin():void
    {
        $this->timeHelper->getDate();
        $request = new UserLoginRequest();
        $request->setEmailUsername($_POST['RequestUser']);
        $request->setPassword($_POST['password']);
        try {
            $login = $this->userServices->login($request);
            $this->sessionsService->create($login->getUsers()->getId(), $login->getUsers()->getRole());
            $data = ['status' => true];
            echo json_encode($data, JSON_THROW_ON_ERROR);


        }catch (\Exception $exception){
            $data = [
                'msg' => $exception->getMessage(),
                'status' => false,
            ];
            echo json_encode($data, JSON_THROW_ON_ERROR);

        }
    }
    public function logout():void
    {
        $this->sessionsService->destroy();
        View::redirect('/');
    }
}