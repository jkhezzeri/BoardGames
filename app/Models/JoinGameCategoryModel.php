<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinGameCategoryModel extends Model {

    protected $table = 'join_game_category';

    protected $primaryKey = ['game_id', 'category_id'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['game_id', 'category_id'];

    public function insertGameCategory($idGame, $idCategory) {
        return $this->insert([
            'game_id' => $idGame,
            'category_id' => $idCategory
        ]);
    }

}

