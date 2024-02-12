<?php

namespace App\Models;

use CodeIgniter\Model;

class MechanicModel extends Model {

    protected $table = 'mechanic';

    protected $primaryKey = 'id_mechanic';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'bgg_id', 'slug'];
    
    public function insertMechanic($postData) {
        $mechanic = $this->select('id_mechanic')->where('name', $postData['name'])->get()->getRowArray();
        if (!$mechanic) {

            $this->insert($postData);
            $idMechanic = $this->insertID();

        } else {
            $idMechanic = $mechanic['id_mechanic'];
        }
        return $idMechanic;
    }

}

