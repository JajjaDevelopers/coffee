<?php

namespace App\Models;

use CodeIgniter\Model;

class RoasteryModel extends Model
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Get roastery receiving items
    public function roasteryReceivingItems($startDate = "", $endDate = "")
    {
        $sql = $this->db->query("SELECT roastery_grn.grn_date AS date, name, book_no, grn_no, grade_name AS item, qty_in
            FROM roastery_grn
            LEFT JOIN grns USING (grn_id)
            JOIN clients ON grns.client_id = clients.client_id
            JOIN inventory ON roastery_grn.receipt_id = inventory.transaction_id
            LEFT JOIN grades ON grades.grade_id = inventory.grade_id
            WHERE transaction_type_id = 4 AND qty_in > 0
            ORDER BY trans_date DESC");
        return $sql->getResultArray();
    }

    // Save roastery item receiving summary
    public function saveRoasteryReceivingSummary($data)
    {
        $save = $this->db->table("roastery_grn");
        $save->insert($data);
        return $this->db->insertID();
    }
    // Save roastery item receiving inventory details
    public function saveRoasteryReceivingInventory($data)
    {
        $save = $this->db->table("inventory");
        return $save->insertBatch($data);
    }

    // Available Roastery GRNs not yet received in the Roastery Unit
    public function availableRoasteryGrns($customer)
    {
        // Grns already existing in the Roastery receiving book
        $existGrnList = [];
        $existGrnsSql = $this->db->query("SELECT grn_id FROM roastery_grn JOIN grns USING (grn_id)
        WHERE grns.grn_id = roastery_grn.grn_id AND client_id = '{$customer}' AND purpose_id = '2'");
        $existSqlResults = $existGrnsSql->getResultArray();
        for ($x = 0; $x < count($existSqlResults); $x++) {
            array_push($existGrnList, $existSqlResults[$x]["grn_id"]);
        }

        // return $receivedGrns;
        $sql = $this->db->table("grns");
        $sql->select("grn_id, grn_no");
        $sql->where("client_id", $customer);
        $sql->where("purpose_id", "2", false);
        if (count($existSqlResults) > 0) {
            $sql->whereNotIn("grn_id", $existGrnList);
        }

        return $sql->get()->getResultArray();
    }


    // 
}
