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
        if ($startDate == "" && $endDate == "") {
            // Return the last 100 grns
            $limit = "LIMIT 100";
            $dateRange = "";
        } else {
            $limit = "";
            $dateRange = "AND trans_date BETWEEN '{$startDate}' AND '$endDate'";
        }
        if ($supplier == "") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND inventory.client_id = '{$supplier}'";
        }
        $list = $this->db->query("SELECT grn_id, trans_date, name, grn_no, vehicle_reg_no AS reg_no, grade_name AS item, qty_in AS qty, status
        FROM inventory
        JOIN grns ON inventory.transaction_id = grns.grn_id
        JOIN clients ON inventory.client_id = clients.client_id
        JOIN grades USING (grade_id)
        WHERE transaction_type_id = 3 {$dateRange} {$supplierFilter}
        ORDER BY trans_date  {$limit}");
        return $list->getResultArray();
    }

    // Check GRN existence
    public function getGrnDetails($grn)
    {
        $list = $this->db->query("SELECT trans_date, inventory.client_id AS supplierId, name, grn_no, vehicle_reg_no AS reg_no, 
        grade_id, grade_name AS item, qty_in AS qty, bags, grade_code, status, purpose_id, purpose, items_origin, vehicle_size,
        weighing_fees, delivered_by, wb_ticket_no, remarks
        FROM inventory
        JOIN grns ON inventory.transaction_id = grns.grn_id
        JOIN clients ON inventory.client_id = clients.client_id
        JOIN grades USING (grade_id)
        JOIN delivery_purposes USING (purpose_id)
        WHERE transaction_type_id = 3 AND grn_id = '{$grn}' ");
        return $list->getResultArray();
    }

    // Delivery Purposes List
    public function deliveryPurposes()
    {
        $purposeList = $this->db->table("delivery_purposes");
        $purposeList->select();
        return $purposeList->get()->getResultArray();
    }


    // 
}
