<?php

namespace App\Model;

class TrackManager extends AbstractManager
{
    public const TABLE = 'track';

    /**
     * Insert new track in database
     */
    public function insert(array $track)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, artist, album, duration, mp3, is_in_flux) VALUES (:title, :artist, :album, :duration, :mp3, :flux)");
        $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
        $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
        $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
        $statement->bindValue(':duration', $track['duration'], \PDO::PARAM_STR);
        $statement->bindValue(':mp3', $track['mp3'], \PDO::PARAM_STR);
        $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

        $statement->execute();
    }
}
