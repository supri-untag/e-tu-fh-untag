<?php

namespace Supri\ETU\UNTAG\Model;

class UserLoginRequest
{
    private string $emailUsername;
    private string $password;

    /**
     * @return string
     */
    public function getEmailUsername(): string
    {
        return $this->emailUsername;
    }

    /**
     * @param string $emailUsername
     */
    public function setEmailUsername(string $emailUsername): void
    {
        $this->emailUsername = $emailUsername;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}