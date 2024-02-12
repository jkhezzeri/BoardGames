<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinGamePublisherModel extends Model {

    protected $table = 'join_game_publisher';

    protected $primaryKey = ['game_id', 'publisher_id'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['game_id', 'publisher_id'];

    public function insertGamePublisher($idGame, $idPublisher) {
        return $this->insert([
            'game_id' => $idGame,
            'publisher_id' => $idPublisher
        ]);
    }

}

