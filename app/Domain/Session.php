<?php

namespace Supri\ETU\UNTAG\Domain;

class Session
{
    private string $id;
    private string $userId;
    private string $tipe;
    private string $timeLogin;

    /*
     * koneksi Ke Users
     * */

    private string $role;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getTipe(): string
    {
        return $this->tipe;
    }

    /**
     * @param string $tipe
     */
    public function setTipe(string $tipe): void
    {
        $this->tipe = $tipe;
    }

    /**
     * @return string
     */
    public function getTimeLogin(): string
    {
        return $this->timeLogin;
    }

    /**
     * @param string $timeLogin
     */
    public function setTimeLogin(string $timeLogin): void
    {
        $this->timeLogin = $timeLogin;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }


}