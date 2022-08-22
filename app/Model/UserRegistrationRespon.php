<?php

namespace Supri\ETU\UNTAG\Model;

use Supri\ETU\UNTAG\Domain\Users;

class UserRegistrationRespon
{
    private Users $users;

    public function getUsers(): Users
    {
        return $this->users;
    }

    public function setUsers(Users $users): void
    {
        $this->users = $users;
    }


}