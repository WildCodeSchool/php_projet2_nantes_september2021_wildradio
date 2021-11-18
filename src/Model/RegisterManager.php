<?php

namespace App\Model;

class RegisterManager extends AbstractManager
{

    public const TABLE = 'user';

    /**
     * Insert a user in database
     */
    public function insert(array $user)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (username, password) VALUES (:username, :password)");
        $statement->bindValue(':username', $user['username'], \PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($user['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
      
        $statement->execute();
    }
    

      /**
     * Find the user in the database.
     *
     */
    public function selectByUsername($username)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE username=:username");
        $statement->bindValue('username', $username, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
}