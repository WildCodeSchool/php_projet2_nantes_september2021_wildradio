<?php

namespace App\Model;

use App\Connection;

class TrackPlaylistManager extends AbstractManager
{
    public const TABLE = 'trackPlaylist';

    // permet de selectionner les tracks présentes dans une playslist 
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


    // permet de lier une track à une playlist 
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

    // permet de nettoyer les tracks au playlist avant ajout 
    public function unlink($track_id)
    {        
        $statement = $this->pdo->prepare("DELETE FROM " . static::TABLE . 
        " WHERE track_id = :track_id ");
        $statement->bindValue(':track_id', $_POST['id'], \PDO::PARAM_INT);
        $statement->execute();
    }

    //permet d'extraire la liste des id des playlists liées à une track
    public function getAllSelectedPlaylists($track_id)
    {
        $statement = $this->pdo->prepare("SELECT playlist_id FROM trackPlaylist WHERE track_id = :track_id");
        $statement->bindValue(':track_id', $_GET['id'], \PDO::PARAM_INT);
        $statement->execute();
        $toto = $statement->fetchAll();
        
        var_dump($toto);
        die();
    
        return $toto;
    }

}