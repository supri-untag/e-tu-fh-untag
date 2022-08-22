<?php

namespace Supri\ETU\UNTAG\Model;

use Supri\ETU\UNTAG\Domain\Users;

class UserLoginRespon
{
    private Users $users;

    /**
     * @return Users
     */
    public function getUsers(): Users
    {
        return $this->users;
    }

    /**
     * @param Users $users
     */
    public function setUsers(Users $users): void
    {
        $this->users = $users;
    }
}