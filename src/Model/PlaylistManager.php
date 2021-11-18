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


     // Mettre à jour la playlist dans database

     public function update(array $playlist): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :name,  description = :description, img = :img, is_online = :online WHERE id=:id");
        $statement->bindValue('id', $playlist['id'], \PDO::PARAM_INT);
        $statement->bindValue(':name', $playlist['name'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $playlist['description'], \PDO::PARAM_STR);
        $statement->bindValue(':img', $playlist['img'], \PDO::PARAM_STR);
        $statement->bindValue(':online', $playlist['is_online'], \PDO::PARAM_STR);

        return $statement->execute();
        }       

    /**
    * Récupérer toutes les tracks comprenant le mot clé recherché  
    */
    public function getElementsFiltered($item)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE name LIKE :item OR description LIKE :item ");
        $statement->bindValue(':item', "%". $item. "%", \PDO::PARAM_STR);
        $statement->execute();
        $playlists = $statement->fetchAll();
    
        return $playlists;
    }

}   