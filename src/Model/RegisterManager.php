<?php

namespace App\Model;

class RegisterManager extends AbstractManager
{

    public const TABLE = 'user';

    /**
     * Insert new track in database
     */
    public function insert(array $user)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (username, password) VALUES (:username, :password)");
        $statement->bindValue(':username', $user['username'], \PDO::PARAM_STR);
        $statement->bindValue(':password', $user['password'], \PDO::PARAM_STR);
      
        $statement->execute();
    }

}