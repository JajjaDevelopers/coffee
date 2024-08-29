<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneralModal extends Model
{

    protected $db;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Get countries list
    public function countriesList($searchKey)
    {
        $query = $this->db->query("SELECT * FROM countries WHERE country_name LIKE '%{$searchKey}%'
        ORDER BY country_rank");
        return $query->getResultArray();
    }

    // 
}
