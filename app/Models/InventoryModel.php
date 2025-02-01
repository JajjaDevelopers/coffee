<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Save new GRN
    public function saveNewGrnSummary($data)
    {
        $grnSummary = $this->db->table("grns");
        $grnSummary->insert($data);
        return $this->db->insertID();
    }

    // Save new GRN inventory details
    public function saveNewGrnInventory($data)
    {
        $grnInventory = $this->db->table("inventory");
        return $grnInventory->insert($data);
    }

    // Get GRN list
    public function grnList($startDate, $endDate, $supplier = "")
    {
        if ($supplier == "") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND inventory.client_id = '{$supplier}'";
        }
        $list = $this->db->query("SELECT trans_date, name, grn_no, vehicle_reg_no AS reg_no, grade_name AS item, qty_in, status
        FROM inventory
        JOIN grns ON inventory.transaction_id = grns.grn_id
        JOIN clients ON inventory.client_id = clients.client_id
        JOIN grades USING (grade_id)
        WHERE transaction_type_id = 3 AND trans_date BETWEEN '{$startDate}' AND '$endDate' '{$supplierFilter}'");
        return $list->getResultArray();
    }


    // 
}
