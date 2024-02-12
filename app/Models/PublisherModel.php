<?php

namespace App\Models;

use CodeIgniter\Model;

class PublisherModel extends Model {

    protected $table = 'publisher';

    protected $primaryKey = 'id_publisher';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'bgg_id', 'slug'];
    
    public function insertPublisher($postData) {
        $publisher = $this->select('id_publisher')->where('name', $postData['name'])->get()->getRowArray();
        if (!$publisher) {

            $this->insert($postData);
            $idPublisher = $this->insertID();

        } else {
            $idPublisher = $publisher['id_publisher'];
        }
        return $idPublisher;
    }

}

