<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model {

    protected $table = 'game';

    protected $primaryKey = 'id_game';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'year', 'min_players', 'max_players', 'min_age', 'playing_time', 'description', 'image', 'bgg_id', 'slug', 'base_game_id'];

    public function insertGame($postData) {
        $this->insert($postData);
        return $this->insertID();
    }

    public function getIdByName($postName) {
        $game = $this->select('id_game')->where('name',$postName)->get()->getRowArray();
        return $game['id_game'];
    }

}

