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
    public function clientsList($fpo, $clientType, $searchStr = "", $clientId = "all")
    {
        if ($searchStr == "") {
            $searchFilter = "";
        } else {
            $searchFilter = "AND (name like '%{$searchStr}%')";
        }
        if ($clientId == "all") {
            $clientFilter = "";
        } else {
            $clientFilter = "AND client_id = '{$clientId}'";
        }
        $query = $this->db->query("SELECT client_id, name, contact_person, district, telephone_1, telephone_2, email_1, category_name, 
            role, subcounty, street, country_name, currency_id, curency_code
            FROM clients
            LEFT JOIN client_categories USING (category_id)
            LEFT JOIN countries USING (country_id)
            LEFT JOIN currencies USING (currency_id)
            WHERE client_type = '{$clientType}' AND fpo = '{$fpo}' {$searchFilter} {$clientFilter}");
        return $query->getResultArray();
    }


    // Get recent deliveries
    public function deliveryValuations($fpo, $fromDate, $toDate, $summary = true, $supplier = "")
    {
        if ($supplier == "") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND inventory.client_id = '{$supplier}'";
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
        // Summary control
        if ($summary == true) {
            $groupBy = "GROUP BY inventory.transaction_id";
        } else {
            $groupBy = "";
        }

        $query = $this->db->query("SELECT valuation_id AS vId, trans_date, grn, name, store_name, grade_name, moisture, sum(qty_in) as qty,
            sum(qty_in * price * exch_rate) AS value
            FROM inventory
            JOIN clients USING (client_id)
            JOIN grades USING (grade_id)
            LEFT JOIN stores USING (store_id)
            LEFT JOIN valuations ON inventory.transaction_id = valuations.valuation_id
            WHERE transaction_type_id = '1' AND valuations.fpo = '{$fpo}'
            {$supplierFilter} {$dateFilter}
            {$groupBy}");
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

    // Get Sales
    public function previousPurchases($fpo, $dateFrom, $dateTo, $supplier = "")
    {
        if ($supplier == "") {
            $supplierFilter = "";
        } else {
            $supplierFilter = "AND inventory.client_id = '{$supplier}'";
        }
        $query = $this->db->query("SELECT qty_in AS purchaseQty, (qty_in * price * exch_rate) AS purchaseValue, type_name
            FROM inventory
            JOIN valuations ON inventory.transaction_id = valuations.valuation_id
            LEFT JOIN grades USING (grade_id)
            LEFT JOIN coffee_category USING (category_id)
            LEFT JOIN coffee_types USING (type_id)
            WHERE valuations.fpo = '{$fpo}' AND inventory.transaction_type_id = 1 {$supplierFilter}
            AND inventory.trans_date BETWEEN '{$dateFrom}' AND '{$dateTo}'");
        return $query->getResultArray();
    }

    // Save new valuation summary
    public function newValuationSummary($data)
    {
        $valuationSummary = $this->db->table("valuations");
        $valuationSummary->insert($data);
        return $this->db->insertID();
    }

    // Save new valuation items in inventory
    public function newValuationInventoryItems($data)
    {
        $builder = $this->db->table("inventory");
        return $builder->insertBatch($data);
    }

    // Add grade
    public function addSupplier($data)
    {
        $builder = $this->db->table("clients");
        return $builder->insert($data);
    }

    // Valuation Details for preview
    public function valuationPreview($vId)
    {
        // Inventory Items
        $itemsSql = $this->db->table("inventory");
        $itemsSql->select("grade_id, grade_code, grade_name, unit, qty_in AS qty, price, exch_rate, moisture");
        $itemsSql->join("grades", "grade_id");
        $itemsSql->where("transaction_type_id", 1);
        $itemsSql->where("transaction_id", $vId);
        $data["items"] = $itemsSql->get()->getResultArray();
        // Valuation Summary
        $summary = $this->db->table("valuations");
        $summary->select("valuation_date AS date, client_id AS supplier_id, name AS supplier, grn, prepared_by, time_prepared, approved_by, time_approved");
        $summary->join("clients", "client_id");
        $summary->where("valuation_id", $vId);
        $data["summary"] = $summary->get()->getResultArray()[0];

        return $data;
    }



    // 
}
