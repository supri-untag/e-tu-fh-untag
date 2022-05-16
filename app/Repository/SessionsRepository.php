<?php

namespace Supri\ETU\UNTAG\Repository;

use Supri\ETU\UNTAG\Domain\Session;

class SessionsRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function deleteById(string $id):void
    {
        $PDOStatement = $this->connection->prepare("DELETE FROM sessions WHERE id = ?");
        $PDOStatement->execute([$id]);
    }

    public function deleteAll():void
    {
        $this->connection->exec("DELETE FROM sessions");
    }

    public function create(Session $session) :Session
    {
        $PDOStatement = $this->connection->prepare("INSERT INTO sessions (id, user_id, tipe, time_login) VALUES (?,?,?,?)");
        $PDOStatement->execute([
            $session->getId(), $session->getUserId(), $session->getTipe(), $session->getTimeLogin()
        ]);
        return $session;
    }

    public function findById(string $id) :?Session
    {
        $PDOStatement = $this->connection->prepare("SELECT id, user_id, tipe, time_login FROM sessions WHERE id = ?");
        $PDOStatement->execute([$id]);
        try {
            if ($rows = $PDOStatement->fetch()){
                $session = new Session();
                $session->setId($rows['id']);
                $session->setUserId($rows['user_id']);
                $session->setTipe($rows['tipe']);
                $session->setTimeLogin($rows['time_login']);
                return $session;
            }else {
                return null;
            }
        } finally {
            $PDOStatement->closeCursor();
        }
    }

    public function findRole(string $id) : ? Session
    {
        $PDOStatement = $this->connection->prepare("SELECT sessions.id, sessions.user_id, sessions.tipe, sessions.time_login, users.role FROM sessions JOIN users ON sessions.user_id=users.id WHERE sessions.id = ?");
        $PDOStatement->execute([$id]);
        try {
            if ($rows = $PDOStatement->fetch()){
                $session = new Session();
                $session->setId($rows['id']);
                $session->setUserId($rows['user_id']);
                $session->setTipe($rows['tipe']);
                $session->setTimeLogin($rows['time_login']);
                $session->setRole($rows['role']);
                return $session;
            }else {
                return null;
            }
        } finally {
            $PDOStatement->closeCursor();
        }

    }
}