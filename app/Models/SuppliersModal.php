<?php

namespace App\Models;

use CodeIgniter\Model;

class SuppliersModal extends Model
{

    protected $db;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Coffee Types
    public function suppliersList($fpo)
    {
        $query = $this->db->query("SELECT client_id, name, contact_person, district, telephone_1, telephone_2, email_1, category_name, role, subcounty, street
            FROM clients
            LEFT JOIN client_categories USING (category_id)
            WHERE client_type = 'S' AND fpo = '{$fpo}'");
        return $query->getResultArray();
    }


    // Get grade categories
    public function deliveries($fpo, $fromDate, $toDate, $supplier = "all")
    {
        if ($supplier == "all") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND client_id = '{$supplier}'";
        }
        $query = $this->db->query("SELECT trans_date, grn, name, store_name, grade_name, moisture, sum(qty_in) as qty 
            FROM inventory
            JOIN clients USING (client_id)
            JOIN grades USING (grade_id)
            LEFT JOIN stores USING (store_id)
            LEFT JOIN deliveries ON inventory.transaction_id = deliveries.grn
            WHERE transaction_type_id = '1' AND deliveries.fpo = '{$fpo}'
            {$supplierFilter} AND trans_date BETWEEN '{$fromDate}' AND '{$toDate}'");
        return $query->getResultArray();
    }

    // Add categories
    // public function addCategory($data)
    // {
    //     $builder = $this->db->table("coffee_category");
    //     return $builder->insert($data);
    // }

    // Quantity according to category
    // public function categoryQtyBalance($fpo, $category = "all")
    // {
    //     if ($category == "all") {
    //         $categoryFilter = "";
    //     } else {
    //         $categoryFilter = "AND coffee_category.category_id='{$category}'";
    //     }

    //     $query = $this->db->query("SELECT category_id, category_name, sum(qty_in) - sum(qty_out) AS balance
    //         FROM inventory
    //         RIGHT JOIN grades USING (grade_id)
    //         RIGHT JOIN coffee_category USING (category_id)
    //         WHERE coffee_category.fpo = '{$fpo}' {$categoryFilter}
    //         GROUP BY category_id");

    //     return $query->getResultArray();
    // }

    // Get Grades
    // public function getGrades($fpo)
    // {
    //     $query = $this->db->query("SELECT grade_id, grade_code, grade_name, category_name, unit, group_name
    //         FROM grades
    //         LEFT JOIN coffee_category USING (category_id)
    //         LEFT JOIN grade_groups USING (group_id)
    //         WHERE coffee_category.fpo = '{$fpo}'");
    //     return $query->getResultArray();
    // }

    // Quantity according to category
    // public function gradeQtyBalance($fpo, $grade = "all")
    // {
    //     if ($grade == "all") {
    //         $gradeFilter = "";
    //     } else {
    //         $gradeFilter = "AND grades.grade_id='{$grade}'";
    //     }

    //     $query = $this->db->query("SELECT grade_id, grade_code, grade_name, category_name, sum(qty_in) - sum(qty_out) AS balance
    //         FROM inventory
    //         RIGHT JOIN grades USING (grade_id)
    //         RIGHT JOIN coffee_category USING (category_id)
    //         JOIN grade_groups ON grades.group_id = grade_groups.group_id
    //         WHERE coffee_category.fpo = '{$fpo}' {$gradeFilter}
    //         GROUP BY category_id");

    //     return $query->getResultArray();
    // }

    // Get coffee groups
    // public function gradeGroupsList($fpo)
    // {
    //     $builder = $this->db->table("grade_groups");
    //     $builder->select();
    //     $builder->where("fpo", $fpo);
    //     return $builder->get()->getResultArray();
    // }

    // Add grade
    public function addSupplier($data)
    {
        $builder = $this->db->table("clients");
        return $builder->insert($data);
    }



    // 
}
