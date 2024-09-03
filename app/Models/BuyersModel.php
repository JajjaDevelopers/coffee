<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyersModel extends Model
{

    protected $db;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Coffee Types
    public function clientsList($fpo, $clientType, $searchStr = "")
    {
        if ($searchStr == "") {
            $searchFilter = "";
        } else {
            $searchFilter = "AND (name like '%{$searchStr}%')";
        }
        $query = $this->db->query("SELECT client_id, name, contact_person, district, telephone_1, telephone_2, email_1, 
            category_name, role, subcounty, street, curency_code
            FROM clients
            LEFT JOIN client_categories USING (category_id)
            LEFT JOIN currencies USING (currency_id)
            WHERE client_type = '{$clientType}' AND fpo = '{$fpo}' {$searchFilter}");
        return $query->getResultArray();
    }


    // Get recent deliveries
    public function deliveryValuations($fpo, $fromDate, $toDate, $supplier = "all")
    {
        if ($supplier == "all") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND client_id = '{$supplier}'";
        }
        // Date controls
        if ($fromDate == "" && $toDate == "") {
            $dateFilter = "";
        } elseif ($fromDate == "" && $toDate != "") {
            $dateFilter = "AND trans_date < '{$toDate}' ";
        } elseif ($fromDate != "" && $toDate == "") {
            $dateFilter = "AND trans_date > '{$fromDate}' ";
        } else {
            $dateFilter = "AND trans_date BETWEEN '{$fromDate}' AND '{$toDate}' ";
        }
        $query = $this->db->query("SELECT trans_date, grn, name, store_name, grade_name, moisture, qty_in as qty 
            FROM inventory
            JOIN clients USING (client_id)
            JOIN grades USING (grade_id)
            LEFT JOIN stores USING (store_id)
            LEFT JOIN valuations ON inventory.transaction_id = valuations.valuation_id
            WHERE transaction_type_id = '1' AND valuations.fpo = '{$fpo}'
            {$supplierFilter} {$dateFilter}");
        return $query->getResultArray();
    }

    // New delivery valuation
    public function newDeliveryValuation($data)
    {
        $builder = $this->db->table("coffee_category");
        $status = $builder->insert($data);
        if ($status) {
            return $this->db->insertID();
        }
    }

    // Inventory update on delivery valuation
    public function inventoryValuationUpdate($data)
    {
        $builder = $this->db->table("inventory");
        return $builder->insertBatch($data);
    }

    // Get Purchases
    public function getGrades($fpo)
    {
        $query = $this->db->query("SELECT grade_id, grade_code, grade_name, category_name, unit, group_name
            FROM grades
            LEFT JOIN coffee_category USING (category_id)
            LEFT JOIN grade_groups USING (group_id)
            WHERE coffee_category.fpo = '{$fpo}'");
        return $query->getResultArray();
    }

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

    // Save new sales report summary
    public function saveSalesReport($data)
    {
        $salesReportSummary = $this->db->table("sales");
        $salesReportSummary->insert($data);
        return $this->db->insertID();
    }

    // Save new valuation items in inventory
    public function newValuationInventoryItems($data)
    {
        $builder = $this->db->table("inventory");
        return $builder->insertBatch($data);
    }

    // Add grade
    public function addBuyer($data)
    {
        $builder = $this->db->table("clients");
        return $builder->insert($data);
    }



    // 
}
