<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinGameArtistModel extends Model {

    protected $table = 'join_game_artist';

    protected $primaryKey = ['game_id', 'artist_id'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['game_id', 'artist_id'];

    public function insertGameArtist($idGame, $idArtist) {
        return $this->insert([
            'game_id' => $idGame,
            'artist_id' => $idArtist
        ]);
    }

}

