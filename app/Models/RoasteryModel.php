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
        $sql = $this->db->query("SELECT trans_date, name, book_no, grn_no, grade_name AS item, qty_in
            FROM inventory
            JOIN grns ON inventory.transaction_id = grns.grn_id
            JOIN clients ON inventory.client_id = clients.client_id
            JOIN roastery_receiving_book ON grns.grn_id = roastery_receiving_book.grn_id
            JOIN grades USING (grade_id)
            WHERE transaction_type_id = 4
            ORDER BY trans_date DESC");
        return $sql->getResultArray();
    }

    // Save roastery item receiving
    public function saveRoasteryItemReceiving($data)
    {
        $save = $this->db->table("roastery_receiving_book");
        $save->insert($data);
        return $this->db->insertID();
    }

    // Available Roastery GRNs not yet received in the Roastery Unit
    public function availableRoasteryGrns($customer)
    {
        $grns = $this->db->query("SELECT grn_id, grn_no
            FROM grns
            WHERE client_id = '{$customer}' AND purpose_id = '2' 
            AND NOT EXISTS (SELECT grn_id FROM roastery_receiving_book WHERE grns.grn_id = roastery_receiving_book.grn_id)");
        return $grns->getResultArray();
    }


    // 
}
