<?php

namespace App\Model;

use App\Connection;

class PlaylistManager extends AbstractManager
{
    public const TABLE = 'playlist';

    public function getAll(): array
    {
        $statement = $this->pdo->query("SELECT * FROM ". self::TABLE);
        $playlists = $statement->fetchAll();

        return $playlists;
    }

}
