<?php

namespace Supri\ETU\UNTAG\Domain;

class Users
{
    private string $id;
    private string $name;
    private string $bagian;
    private ?string $username;
    private string $password;
    private string $email;
    private ?string $image;
    private string $date_add;
    private string $verify;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDateAdd(): string
    {
        return $this->date_add;
    }

    /**
     * @param string $date_add
     */
    public function setDateAdd(string $date_add): void
    {
        $this->date_add = $date_add;
    }

    /**
     * @return string
     */
    public function getVerify(): string
    {
        return $this->verify;
    }

    /**
     * @param string $verify
     */
    public function setVerify(string $verify): void
    {
        $this->verify = $verify;
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

}