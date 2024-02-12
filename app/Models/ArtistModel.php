<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtistModel extends Model {

    protected $table = 'artist';

    protected $primaryKey = 'id_artist';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'bgg_id', 'slug'];
    
    public function insertArtist($postData) {
        $artist = $this->select('id_artist')->where('name', $postData['name'])->get()->getRowArray();
        if (!$artist) {

            $this->insert($postData);
            $idArtist = $this->insertID();

        } else {
            $idArtist = $artist['id_artist'];
        }
        return $idArtist;
    }

}

