<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model {

    protected $table = 'category';

    protected $primaryKey = 'id_category';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'bgg_id', 'slug'];
    
    public function insertCategory($postData) {
        $category = $this->select('id_category')->where('name', $postData['name'])->get()->getRowArray();
        if (!$category) {

            $this->insert($postData);
            $idCategory = $this->insertID();

        } else {
            $idCategory = $category['id_category'];
        }
        return $idCategory;
    }

}

