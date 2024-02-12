<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinGameMechanicModel extends Model {

    protected $table = 'join_game_mechanic';

    protected $primaryKey = ['game_id', 'mechanic_id'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['game_id', 'mechanic_id'];

    public function insertGameMechanic($idGame, $idMechanic) {
        return $this->insert([
            'game_id' => $idGame,
            'mechanic_id' => $idMechanic
        ]);
    }

}

