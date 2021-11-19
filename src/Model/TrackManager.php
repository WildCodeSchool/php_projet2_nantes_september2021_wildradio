<?php

namespace App\Model;

use App\Connection;

class TrackManager extends AbstractManager
{
    public const TABLE = 'track';

    /**
     * Insert new track in database
     */
    public function insert(array $track)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, artist, album, mp3, is_in_flux)
        VALUES (:title, :artist, :album, :mp3, :flux)");
        $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
        $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
        $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
        $statement->bindValue(':mp3', $track['mp3'], \PDO::PARAM_STR);
        $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

        $statement->execute();
    }
    
     /**
     * Récupérer toutes les tracks enregistrées dans la BDD 
     */
    public function getAll(): array
    {
        $statement = $this->pdo->query("SELECT * FROM track ORDER BY id DESC");
        $tracks = $statement->fetchAll();

        return $tracks;
    }

    /**
     * Récupérer toutes les tracks présentes dans le flux (=1)
     */

    public function getTracksInFlux(): array
    {
        $statement = $this->pdo->query("SELECT * FROM track WHERE is_in_flux = '1'");
        $tracks = $statement->fetchAll();

        return $tracks;

    }

     /**
     * Update track in database
     */
    public function update(array $track): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :title,  artist = :artist, album = :album, is_in_flux = :flux WHERE id = :id");
        $statement->bindValue(':id', $track['id'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
        $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
        $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
        $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

        return $statement->execute();
    }


    /**
    * Récupérer toutes les tracks comprenant le mot clé recherché  
    */
    public function getElementsFiltered($item)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE artist LIKE :item OR name LIKE :item  OR album LIKE :item ");
        $statement->bindValue(':item', "%". $item. "%", \PDO::PARAM_STR);
        $statement->execute();
        $tracks = $statement->fetchAll();
    
        return $tracks;
    }
}