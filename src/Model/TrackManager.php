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
    
    public function getAll(): array
    {
        $statement = $this->pdo->query("SELECT * FROM ". self::TABLE);
        $tracks = $statement->fetchAll();

        return $tracks;
    }

     /**
     * Update track in database
     */
    public function update(array $track): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :title,  artist = :artist, album = :album, is_in_flux = :flux WHERE id=:id");
        $statement->bindValue('id', $track['id'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
        $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
        $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
        $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

        return $statement->execute();
    }

    public function link($track_id, $playlists_id)
    {        
        $statement = $this->pdo->prepare("INSERT INTO trackPlaylist 
        (playlist_id, track_id) VALUES (:playlist_id, :track_id)"); 

        foreach ($_POST ["addPlaylist"] as $playlists_id) {
            $statement->bindValue(':track_id', $_POST['id'], \PDO::PARAM_INT);
            $statement->bindValue(':playlist_id', $playlists_id, \PDO::PARAM_INT);        
            
            $statement->execute();
        } 
    }
}