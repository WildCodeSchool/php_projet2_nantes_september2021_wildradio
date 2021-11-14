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
        $statement = $this->pdo->query("SELECT * FROM ". self::TABLE);
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
        $statement->bindValue('id', $track['id'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
        $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
        $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
        $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

        return $statement->execute();
    }


   
    public function link($track_id, $playlists_id)
    {

        var_dump($playlists_id);
        die();
        
        $statement = $this->pdo->prepare("INSERT INTO" . self::TABLE . 
        "WHERE id 
        IN (SELECT track_id=" . ":track_id" . "FROM trackPlaylist WHERE playlist_id=:" . ":playlist_id)"); 
        $statement->bindValue(':track_id', $track_id, \PDO::PARAM_INT);
        $statement->bindValue(':playlist_id', $playlists_id, \PDO::PARAM_INT);
        
        $statement->execute();
    }
}