<?php

namespace App\Model;

use App\Connection;

class TrackPlaylistManager extends AbstractManager
{
    public const TABLE = 'trackPlaylist';


    public function selectTracksInPlaylist($id)
    {
        $statement = $this->pdo->prepare("SELECT track.name as title, track.artist as artist, track.album as album, track.mp3 as mp3
        FROM " . static::TABLE . "
        INNER JOIN track ON track_id= track.id
        INNER JOIN playlist ON playlist.id=playlist_id
        WHERE playlist_id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
           
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}