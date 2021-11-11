<?php

namespace App\Model;

use App\Connection;

class PlaylistManager extends AbstractManager
{
    public const TABLE = 'playlist';


   // inserer nouvelle playlist dans database
   
    public function insert(array $playlist)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, description, img, tag, is_online)
        VALUES (:name, :description, :img, :tag, :is_online)");
        $statement->bindValue(':name', $playlist['name'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $playlist['description'], \PDO::PARAM_STR);
        $statement->bindValue(':img', $playlist['img'], \PDO::PARAM_STR);
        $statement->bindValue(':tag', $playlist['tag'], \PDO::PARAM_STR);
        $statement->bindValue(':is_online', $playlist['is_online'], \PDO::PARAM_INT);
        $statement->execute();
    }
    

    public function getAll(): array
    {
        $statement = $this->pdo->query("SELECT * FROM ". self::TABLE);
        $playlists = $statement->fetchAll();

        return $playlists;
    }


     // telecharger playlist dans dtbase

     public function update(array $playlist): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :name,  description = :description, img = :img, online = :online WHERE id=:id");
        $statement->bindValue('id', $playlist['id'], \PDO::PARAM_INT);
        $statement->bindValue(':name', $playlist['name'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $playlist['description'], \PDO::PARAM_STR);
        $statement->bindValue(':img', $playlist['img'], \PDO::PARAM_STR);
        $statement->bindValue(':online', $playlist['is_online'], \PDO::PARAM_STR);

        return $statement->execute();
        }
    }
<<<<<<< HEAD
}
=======
>>>>>>> ad4849ffac2ed9eb20a51c68023021c63aad722c
