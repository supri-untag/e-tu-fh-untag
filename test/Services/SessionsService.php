<?php

namespace Supri\ETU\UNTAG\Services;

use Supri\ETU\UNTAG\Domain\Session;
use Supri\ETU\UNTAG\Domain\Users;
use Supri\ETU\UNTAG\Exception\HandlerException;
use Supri\ETU\UNTAG\Helper\HashCodeString;
use Supri\ETU\UNTAG\Repository\SessionsRepository;
use Supri\ETU\UNTAG\Repository\UserRepository;

class SessionsService
{
    public static $COOKE_NAME_SESSION = "_X_ET_s";
    public static $COOKE_NAME_ROLE = "__X_ET_r";
    public static $DEFAULT_TYPE = "login";

    private SessionsRepository $sessionsRepository;
    private UserRepository $userRepository;

    public function __construct(SessionsRepository $sessionsRepository, UserRepository $userRepository)
    {
        $this->sessionsRepository = $sessionsRepository;
        $this->userRepository = $userRepository;
    }

    public function create(string $request): Session
    {
        $byEmail = $this->userRepository->findByEmail($request);
        $username = null;
        if ($byEmail === null) {
            $username = $this->userRepository->findByUsername($request);
        }else {
            $username = $byEmail;
        }
        if ($username === null){
            throw new HandlerException('Email atau username tidak tersedia');
        }
        $sessions = new Session();
        $random = HashCodeString::hashString(5);
        $sessions->setId(uniqid($random, false));
        $sessions->setUserId($username->getId());
        $sessions->setTipe(self::$DEFAULT_TYPE);
        $sessions->setTimeLogin(date('Y-m-d H:i:s'));

        $this->sessionsRepository->create($sessions);

        setcookie(self::$COOKE_NAME_SESSION,$sessions->getId(), time () + 60 * 60 * 60 * 24, '/');
        setcookie(self::$COOKE_NAME_ROLE, hash('snefru' ,$sessions->setRole()) , time () + 60 * 60 * 60 * 24, '/');

        return $sessions;
    }

    public function destroy():void
    {
        $sessions = $_COOKIE[self::$COOKE_NAME_SESSION] ?? "";
        $this->sessionsRepository->findById($sessions);
        $this->sessionsRepository->deleteById($sessions);
        setcookie(self::$COOKE_NAME_SESSION, '', 1, '');
        setcookie(self::$COOKE_NAME_ROLE, '', 1, '');
    }

    public function curent():?Users
    {
        $sessions = $_COOKIE[self::$COOKE_NAME_SESSION] ?? "";
        $result = $this->sessionsRepository->findById($sessions);
        if ($result == null){
            return null;
        }
        return $this->userRepository->findById($result->getUserId());
    }

    public function findRole():?Users
    {
        $sessions = $_COOKIE[self::$COOKE_NAME_SESSION] ?? "";
        $role = $_COOKIE[self::$COOKE_NAME_ROLE] ?? "";

        $resultSessions = $this->sessionsRepository->findById($sessions);
        $resultUsers = $this->userRepository->findById($resultSessions->getUserId());

        if (hash('snefru',$resultUsers->getRole()=== $role)){
            return $resultUsers;
        } else{
            return null;
        }
    }
}