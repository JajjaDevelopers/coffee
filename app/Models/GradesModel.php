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

    // Add categories
    public function addCategory($data)
    {
        $builder = $this->db->table("coffee_category");
        return $builder->insert($data);
    }

    // Quantity according to category
    public function categoryQtyBalance($fpo, $category = "all")
    {
        if ($category == "all") {
            $categoryFilter = "";
        } else {
            $categoryFilter = "AND coffee_category.category_id='{$category}'";
        }

        $query = $this->db->query("SELECT category_id, category_name, sum(qty_in) - sum(qty_out) AS balance
            FROM inventory
            RIGHT JOIN grades USING (grade_id)
            RIGHT JOIN coffee_category USING (category_id)
            WHERE coffee_category.fpo = '{$fpo}' {$categoryFilter}
            GROUP BY category_id");

        return $query->getResultArray();
    }

    // Get Grades
    public function getGrades($fpo)
    {
        $query = $this->db->query("SELECT grade_id, grade_code, grade_name, category_name, unit, group_name
            FROM grades
            LEFT JOIN coffee_category USING (category_id)
            LEFT JOIN grade_groups USING (group_id)
            WHERE coffee_category.fpo = '{$fpo}'");
        return $query->getResultArray();
    }

    // Quantity according to grade
    public function gradeQtyBalance($fpo, $grade = "all")
    {
        if ($grade == "all") {
            $gradeFilter = "";
            $limitFilter = "";
        } else {
            $gradeFilter = "AND grades.grade_id='{$grade}'";
            $limitFilter = "LIMIT 1";
        }

        $query = $this->db->query("SELECT grade_id, grade_code, grade_name, category_name, sum(qty_in) - sum(qty_out) AS balance
            FROM inventory
            RIGHT JOIN grades USING (grade_id)
            RIGHT JOIN coffee_category USING (category_id)
            JOIN grade_groups ON grades.group_id = grade_groups.group_id
            WHERE coffee_category.fpo = '{$fpo}' {$gradeFilter}
            GROUP BY grade_id {$limitFilter}");

        return $query->getResultArray();
    }

    // Get coffee groups
    public function gradeGroupsList($fpo)
    {
        $builder = $this->db->table("grade_groups");
        $builder->select();
        $builder->where("fpo", $fpo);
        return $builder->get()->getResultArray();
    }

    // Add grade
    public function addGrade($data)
    {
        $builder = $this->db->table("grades");
        return $builder->insert($data);
    }



    // 
}
