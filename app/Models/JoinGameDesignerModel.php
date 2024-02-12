<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinGameDesignerModel extends Model {

    protected $table = 'join_game_designer';

    protected $primaryKey = ['game_id', 'designer_id'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['game_id', 'designer_id'];

    public function insertGameDesigner($idGame, $idDesigner) {
        return $this->insert([
            'game_id' => $idGame,
            'designer_id' => $idDesigner
        ]);
    }

}

