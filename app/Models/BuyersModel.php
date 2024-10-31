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

    // Get sales report summary
    public function getSalesReportSummary($salesId)
    {
        $builder = $this->db->table("sales");
        $builder->where("sales_id", $salesId);
        $builder->select("sales_report_no, date, client_id, market, contract_nature, 
                            prepared_by, time_prepared, approved_by, time_approved, reference");
        return $builder->get()->getResultArray()[0];
    }


    // Get recent sales reports
    public function salesReportsList($fpo, $fromDate, $toDate, $buyer = "")
    {
        if ($buyer == "") {
            $buyerFilter = "";
        } else {
            $buyerFilter = "AND client_id = '{$buyer}'";
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
        $query = $this->db->query("SELECT trans_date, sales_id, sales_report_no, name, store_name, grade_name, market, 
            contract_type_name AS contract, sum(qty_out) AS qty,
            sum(qty_out*price) AS value, curency_code AS currency
            FROM inventory
            JOIN clients USING (client_id)
            JOIN grades USING (grade_id)
            LEFT JOIN stores USING (store_id)
            LEFT JOIN currencies ON inventory.currency_id = currencies.currency_id
            LEFT JOIN sales ON inventory.transaction_id = sales.sales_id
            LEFT JOIN contract_types ON sales.contract_nature = contract_types.contract_type_id
            WHERE transaction_type_id = '2' AND sales.fpo = '{$fpo}'
            {$buyerFilter} {$dateFilter}
            GROUP BY transaction_id");
        return $query->getResultArray();
    }

    // Sales Report Data
    public function salesReportData($fpo, $salesId = "", $buyer = "", $dateFrom = "", $dateTo = "")
    {
        // Filter controls
        // Sales Id
        if ($salesId == "") {
            $salesIdFilter = "";
        } else {
            $salesIdFilter = "AND inventory.transaction_id = '{$salesId}'";
        }
        // Buyer
        if ($buyer == "") {
            $buyerFilter = "";
        } else {
            $buyerFilter = "AND inventory.client_id = '{$buyer}'";
        }
        // Date
        if ($dateFrom == "" && $dateTo == "") {
            $dateFilter = "";
        } else if ($dateFrom == "" && $dateTo != "") {
            $dateFilter = "AND trans_date <= '{$dateTo}'";
        } else if ($dateFrom != "" && $dateTo == "") {
            $dateFilter = "AND trans_date >= '{$dateFrom}'";
        } else {
            $dateFilter = "AND trans_date BETWEEN '{$dateFrom}' AND '{$dateTo}' ";
        }
        $query = $this->db->query("SELECT sales_report_no, date, name, inventory.client_id, fname, lname, time_prepared, 
            reference, item_no, inventory.grade_id, grade_code, grade_name, unit, qty_out, inventory.currency_id, price, 
            exch_rate, moisture, curency_code, contract_type_name AS contract, market
            FROM inventory
            JOIN sales ON sales.sales_id = inventory.transaction_id
            LEFT JOIN users ON sales.prepared_by = users.id
            LEFT JOIN clients ON inventory.client_id = clients.client_id
            LEFT JOIN grades ON grades.grade_id = inventory.grade_id
            LEFT JOIN currencies ON currencies.currency_id = inventory.currency_id
            LEFT JOIN contract_types ON sales.contract_nature = contract_types.contract_type_id
            WHERE sales.fpo = '{$fpo}' AND inventory.transaction_type_id = 2 {$salesIdFilter} {$buyerFilter} {$dateFilter}");
        return $query->getResultArray();
    }

    // Inventory update on delivery valuation
    public function inventoryValuationUpdate($data)
    {
        $builder = $this->db->table("inventory");
        return $builder->insertBatch($data);
    }

    // Get Sales
    public function previousSales($fpo, $dateFrom, $dateTo, $buyer = "")
    {
        if ($buyer == "") {
            $buyerFilter = "";
        } else {
            $buyerFilter = "AND inventory.client_id = '{$buyer}'";
        }
        $query = $this->db->query("SELECT qty_out AS salesQty, (qty_out * price * exch_rate) AS salesValue, type_name, market
            FROM inventory
            JOIN sales ON inventory.transaction_id = sales.sales_id
            LEFT JOIN grades USING (grade_id)
            LEFT JOIN coffee_category USING (category_id)
            LEFT JOIN coffee_types USING (type_id)
            WHERE sales.fpo = '{$fpo}' AND inventory.transaction_type_id = 2 {$buyerFilter}
            AND inventory.trans_date BETWEEN '{$dateFrom}' AND '{$dateTo}'");
        return $query->getResultArray();
    }

    // Save adjusted sales report
    public function saveAdjustedSalesReport($salesId, $dataSet)
    {
        $summaryBuilder = $this->db->table("sales");
        $summaryBuilder->where("sales_id", $salesId);
        $salesSummary = $summaryBuilder->update($dataSet["summaryData"]);
        if ($salesSummary) {
            $deleteBuilder = $this->db->table("inventory");
            // Remove current sales Id items from the inventory
            $deleteBuilder->where("transaction_type_id", 2);
            $deleteBuilder->where("transaction_id", $salesId);
            $deleteExisting = $deleteBuilder->delete();
            // Update stock items
            if ($deleteExisting) {
                $updateBuilder = $this->db->table("inventory");
                return $updateBuilder->insertBatch($dataSet["inventoryData"]);
            }
        }
    }

    // Save new sales report summary
    public function saveSalesReportSummary($data)
    {
        $salesReportSummary = $this->db->table("sales");
        $salesReportSummary->insert($data);
        return $this->db->insertID();
    }

    // Save new sales report items in inventory
    public function newSalesReportInventoryItems($data)
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

    // Contract Types
    public function contractTypes($fpo)
    {
        $builder = $this->db->table("contract_types");
        $builder->where("fpo", $fpo);
        return $builder->get()->getResultArray();
    }



    // 
}
