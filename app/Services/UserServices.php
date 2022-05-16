<?php

namespace Supri\ETU\UNTAG\Services;

use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Domain\Users;
use Supri\ETU\UNTAG\Exception\HandlerException;
use Supri\ETU\UNTAG\Helper\HashCodeString;
use Supri\ETU\UNTAG\Model\UserRegistrationRequest;
use Supri\ETU\UNTAG\Model\UserRegistrationRespon;
use Supri\ETU\UNTAG\Repository\UserRepository;

class UserServices
{

    Private UserRepository $userRepository;
    public static string $DEFAULT_PHOTOS = "undraw_profile.svg";
    public static string $DEFAULT_ROLE = "user";
    public static string $DEFAULT_VERIFY = "false";

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegistrationRequest $request) : UserRegistrationRespon
    {
        $this->validationUserRegistration($request);
        $byEmail = $this->userRepository->findByEmail($request->getEmail());
        if ($byEmail !== null){
            throw new HandlerException('Email telah digunakan');
        }
        try {
            Database::beginTransaction();
            $random = HashCodeString::hashString(10);
            $random5 = strtolower(HashCodeString::implode($request->getName(),1)).HashCodeString::hashString(5);
            $userRequest = new Users();
            $userRequest->setId(uniqid($random,false));
            $userRequest->setName($request->getName());
            $userRequest->setBagian($request->getBagian());
            $userRequest->setUsername($random5);
            $userRequest->setPassword(password_hash($request->getPassword(),PASSWORD_BCRYPT));
            $userRequest->setEmail($request->getEmail());
            $userRequest->setImage(self::$DEFAULT_PHOTOS);
            $userRequest->setDateAdd($request->getDateAdd());
            $userRequest->setVerify(self::$DEFAULT_VERIFY);
            $userRequest->setRole(self::$DEFAULT_ROLE);

            $this->userRepository->save($userRequest);

            $respon = new UserRegistrationRespon();
            $respon->setUsers($userRequest);

            Database::commitTransaction();
            return $respon;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validationUserRegistration( UserRegistrationRequest $request):void
    {
        if ( $request->getPassword() !== $request->getPasswordConfirm()){
            throw new HandlerException('sandi dan sandikonfirmasi tidak sama');
        }
        if ($request->getName() === null || $request->getBagian()=== null || $request->getEmail() === null || $request->getPassword()=== null || $request->getName() === '' || $request->getBagian()=== '' || $request->getEmail() === '' || $request->getPassword()=== '') {
            throw new HandlerException('Tidak boleh ada kolom yang kosong');
        }
        $number = preg_match('@[0-9]@', $request->getPassword());
        $uppercase = preg_match('@[A-Z]@', $request->getPassword());
        $lowercase = preg_match('@[a-z]@', $request->getPassword());
        $specialChars = preg_match('@[^\w]@', $request->getPassword());
        if(strlen($request->getPassword()) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            throw new HandlerException('Password tidak sesuai dengan ketentuan');
        }
        if (!filter_var($request->getEmail(), FILTER_VALIDATE_EMAIL)){
            throw new HandlerException('Kesalahan format email');
        }
    }

    public function deleteAllUser():void
    {
        $this->userRepository->deleteAll();
    }

}