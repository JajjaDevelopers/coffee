<?php

namespace App\Models;

use CodeIgniter\Model;

class GradesModel extends Model
{

    protected $db;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Coffee Types
    public function getCoffeeTypes()
    {
        $query = $this->db->query("SELECT type_id, type_name FROM coffee_types");
        return $query->getResultArray();
    }
    // Get grade categories
    public function getCoffeeCategories($fpo)
    {
        $query = $this->db->query("SELECT category_id, category_name, type_name
            FROM coffee_category
            JOIN coffee_types USING (type_id)
            WHERE fpo = '{$fpo}'");
        return $query->getResultArray();
    }



    // 
}
