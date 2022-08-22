<?php

namespace Supri\ETU\UNTAG\Repository;

use phpDocumentor\Reflection\Types\Void_;
use Supri\ETU\UNTAG\Domain\Users;

class UserRepository
{
    protected \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Users $users) :Users
    {
        $PDOStatement = $this->connection->prepare("INSERT INTO users(id, name, bagian, username, password, email, image, date_add, verify, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $PDOStatement->execute([
            $users->getId(),
            $users->getName(),
            $users->getBagian(),
            $users->getUsername(),
            $users->getPassword(),
            $users->getEmail(),
            $users->getImage(),
            $users->getDateAdd(),
            $users->getVerify(),
            $users->getRole()
        ]);
        return $users;
    }

    public function findById(string $id) :?Users
    {
        $PDOStatement = $this->connection->prepare("SELECT id, name, username, password, email, image, date_add, verify, role FROM users WHERE id = ?");
        $PDOStatement->execute([$id]);
        try {
            if ($row = $PDOStatement->fetch()){
                $user = new Users();
                $user->setId($row['id']);
                $user->setName($row['name']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setEmail($row['email']);
                $user->setImage($row['image']);
                $user->setDateAdd($row['date_add']);
                $user->setVerify($row['verify']);
                $user->setRole($row['role']);

                return $user;
            }
            else{
                return null;
            }

        } finally
        {
            $PDOStatement->closeCursor();
        }
    }

    public function findByUsername(string $name) :?Users
    {
        $PDOStatement = $this->connection->prepare("SELECT id, name, username, password, email, image, date_add, verify, role FROM users WHERE username = ?");
        $PDOStatement->execute([$name]);
        try {
            if ($row = $PDOStatement->fetch()){
                $user = new Users();
                $user->setId($row['id']);
                $user->setName($row['name']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setEmail($row['email']);
                $user->setImage($row['image']);
                $user->setDateAdd($row['date_add']);
                $user->setVerify($row['verify']);
                $user->setRole($row['role']);

                return $user;
            }
            else{
                return null;
            }

        } finally
        {
            $PDOStatement->closeCursor();
        }
    }

    public function findByEmail(string $email) :?Users
    {
        $PDOStatement = $this->connection->prepare("SELECT id, name, username, password, email, image, date_add, verify, role FROM users WHERE email = ?");
        $PDOStatement->execute([$email]);
        try {
            if ($row = $PDOStatement->fetch()){
                $user = new Users();
                $user->setId($row['id']);
                $user->setName($row['name']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setEmail($row['email']);
                $user->setImage($row['image']);
                $user->setDateAdd($row['date_add']);
                $user->setVerify($row['verify']);
                $user->setRole($row['role']);

                return $user;
            }else{
                return null;
            }
        } finally
        {
            $PDOStatement->closeCursor();
        }
    }
    public function deleteById(string $id):void
    {
        $PDOStatement = $this->connection->prepare("DELETE FROM users WHERE id =?");
        $PDOStatement->execute([$id]);
    }

    public function confirmVerify($id):void
    {
        $PDOStatement = $this->connection->prepare("UPDATE users SET verify = `true` WHERE id = ?");
        $PDOStatement->execute([$id]);
    }

    public function update(Users $users):void
    {
        $PDOStatement = $this->connection->prepare("UPDATE users SET name = ?,  bagain = ?, image = ? WHERE id = ?");
        $PDOStatement->execute([
           $users->getName(),
           $users->getBagian(),
           $users->getImage(),
           $users->getId()
        ]);
    }
    public function updateUsername(Users $users):void
    {
        $PDOStatement = $this->connection->prepare("UPDATE users SET username = ? WHERE id = ?");
        $PDOStatement->execute([
            $users->getUsername(),
            $users->getId()
        ]);
    }

    public function updatePassword(Users $users):void
    {
        $PDOStatement = $this->connection->prepare("UPDATE users SET password =? WHERE id ?");
        $PDOStatement->execute([
            $users->getPassword(),
            $users->getId()
        ]);
    }
    public function deleteAll():void
    {
        $this->connection->exec("DELETE FROM users");
    }
}