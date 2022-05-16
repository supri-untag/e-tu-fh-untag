<?php

namespace Supri\ETU\UNTAG\Model;

class UserRegistrationRequest
{
    private string $name;
    private string $bagian;
    private string $password;
    private string $passwordConfirm;
    private string $email;
    private string $dateAdd;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBagian(): string
    {
        return $this->bagian;
    }

    /**
     * @param string $bagian
     */
    public function setBagian(string $bagian): void
    {
        $this->bagian = $bagian;
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

    /**
     * @return string
     */
    public function getPasswordConfirm(): string
    {
        return $this->passwordConfirm;
    }

    /**
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDateAdd(): string
    {
        return $this->dateAdd;
    }

    /**
     * @param string $dateAdd
     */
    public function setDateAdd(string $dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

}