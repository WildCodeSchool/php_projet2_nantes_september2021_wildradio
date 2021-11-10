<?php

namespace App\Model;

use App\Connection;

class TrackManager extends AbstractManager
{
    public const TABLE = 'playlist';
    public const TRACK_PLAYLIST = 'trackPlaylist';

    /**
     * Create new playlist in database
     */
    public function createPlaylist(array $playlist)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, description, img, tag, is_online)
        VALUES (:name, :description, :img, :tag, :online)");
        $statement->bindValue(':name', $playlist['name'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $playlist['description'], \PDO::PARAM_STR);
        $statement->bindValue(':img', $playlist['img'], \PDO::PARAM_STR);
        $statement->bindValue(':tag', $playlist['tag'], \PDO::PARAM_STR);
        $statement->bindValue(':online', $playlist['online'], \PDO::PARAM_STR);

        $statement->execute();

        if($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST['save_playlist'])
        {
            $playlistId = isset($_POST['playlist']) ? $_POST['playlist']: NULL;
                if($playlist){
                    save_playlist($playlist);
                    echo "Bravo ! La playlist a bien été créée";
            }
        }
    }

    /**
     * Ajouter un track à une playlist dans la base de données
     */
    public function add_to_playlist ($track, $playlistId)
    {    
        if($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST['add_to_playlist'])
        {
            $playlistId = isset($_POST['add_to_playlist']) ? $_POST['add_to_playlist']: NULL;
                if($playlistId){
                    if(count($track) > 0) {
                        foreach($track as $tr){
                            save_to_playlist($tr, $playlistId);
                        }
                    }
                }
        }
    }

    public function save_to_playlist($trackId, $playlistId)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TRACK_PLAYLIST . " (track, playlist)
        VALUES (:track, :playlist)");

        $statement->execute($trackID, $playlistID);
    }
}
//     // public function getAll(): array
//     // {
//     //     $statement = $this->pdo->query("SELECT * FROM ". self::TABLE);
//     //     $tracks = $statement->fetchAll();

//     //     return $tracks;
//     // }

//     //  /**
//     //  * Update track in database
//     //  */
//     // public function update(array $track): bool
//     // {
//     //     $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :title,  artist = :artist, album = :album, is_in_flux = :flux WHERE id=:id");
//     //     $statement->bindValue('id', $track['id'], \PDO::PARAM_INT);
//     //     $statement->bindValue(':title', $track['title'], \PDO::PARAM_STR);
//     //     $statement->bindValue(':artist', $track['artist'], \PDO::PARAM_STR);
//     //     $statement->bindValue(':album', $track['album'], \PDO::PARAM_STR);
//     //     $statement->bindValue(':flux', $track['flux'], \PDO::PARAM_STR);

//     //     return $statement->execute();