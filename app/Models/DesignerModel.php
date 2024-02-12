<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignerModel extends Model {

    protected $table = 'designer';

    protected $primaryKey = 'id_designer';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'bgg_id', 'slug'];
    
    public function insertDesigner($postData) {
        $designer = $this->select('id_designer')->where('name', $postData['name'])->get()->getRowArray();
        if (!$designer) {

            $this->insert($postData);
            $idDesigner = $this->insertID();

        } else {
            $idDesigner = $designer['id_designer'];
        }
        return $idDesigner;
    }

}

