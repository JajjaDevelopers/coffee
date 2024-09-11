<?php

namespace App\Controllers;

use App\Controllers\Traits\CommonData;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GradesModel;
use App\Models\SuppliersModal;
use CodeIgniter\I18n\Time;
use App\Models\GeneralModal;
use App\Models\BuyersModel;


class BuyersController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $suppliersModel;
    public $generalModel;
    public $buyersModel;

    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->gradesModel = new GradesModel;
        $this->suppliersModel = new SuppliersModal;
        $this->generalModel = new GeneralModal;
        $this->buyersModel = new BuyersModel;
    }
    public function buyers()
    {

        $page_title = "Buyers";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('buyers/buyers', compact('page_title', 'commonData', 'coffeeTypes'));
    }
    // Get Buyers List
    public function buyersList()
    {
        $searchStr = $this->request->getPost("searchKey");
        $clientId = $this->request->getPost("buyer");
        $data["buyersList"] = $this->suppliersModel->clientsList($this->fpo, "B", $searchStr, $clientId);
        return $this->response->setJSON($data);
    }

    // Select search customers
    public function searchBuyers()
    {
        $searchStr = $this->request->getGet("search");
        $list = [];
        $suppliers = $this->buyersModel->clientsList($this->fpo, "B", $searchStr);
        for ($x = 0; $x < count($suppliers); $x++) {
            $list[$x]["id"] = $suppliers[$x]["client_id"];
            $list[$x]["text"] = $suppliers[$x]["name"];
        }
        $data["results"] = $list;
        return $this->response->setJSON($data);
    }

    // Get countries list
    public function countriesList()
    {
        $list = [];
        $search = $this->request->getGet("search");
        $countries = $this->generalModel->countriesList($search);
        for ($x = 0; $x < count($countries); $x++) {
            $list[$x]["id"] = $countries[$x]["country_id"];
            $list[$x]["text"] = $countries[$x]["country_name"];
        }
        $data["results"] = $list;
        return $this->response->setJSON($data);
    }

    // Deliveries Page
    public function salesPage()
    {
        $timeNow = Time::now();
        $dateToday = $timeNow->toLocalizedString('dd-MM-yyyy');
        $page_title = "Sales";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('buyers/salesView', compact('page_title', 'commonData', 'dateToday'));
    }


    // Previous sales reports
    public function salesReports()
    {
        $fromDate = $this->request->getPost("fromDate");
        $toDate = $this->request->getPost("toDate");
        $buyer = $this->request->getPost("buyer");
        $deliveries = $this->buyersModel->salesReportsList($this->fpo, $fromDate, $toDate, $buyer);
        $data["salesReports"] = $deliveries;
        return $this->response->setJSON($data);
    }
    // Add categories
    public function addBuyer()
    {
        $buyerData = $this->request->getPost("buyerInfo");
        $buyerData["fpo"] = $this->fpo;
        $buyerData["client_type"] = "B";

        $addBuyer = $this->buyersModel->addBuyer($buyerData);
        if ($addBuyer) {
            $sms["sms"] = "success";
        } else {
            $sms["sms"] = "fail";
        }
        return $this->response->setJSON($sms);
    }

    // New delivery valuation
    public function newDeliveryValuation()
    {
        $date = $this->request->getPost("date");
        $supplier = $this->request->getPost("supplier");
        $currency = $this->request->getPost("currency");
        $exch_rate = $this->request->getPost("exch_rate");
        $mc = $this->request->getPost("mc");
        $store = $this->request->getPost("store");
        $items = $this->request->getPost("items"); //Array of items
        $deliverySummaryData = [
            "fpo" => $this->fpo,
            "quality_remarks" => $this->request->getPost("quality_remarks"),
            "delivery_person" => $this->request->getPost("delivery_person"),
            "truck_no" => $this->request->getPost("truck_no"),
            "prepared_by" => $this->commonData()["user"]["id"], //request->getPost("prepared_by"),
            "time_prepared" => $this->request->getPost("time_prepared"),
            "reference" => $this->request->getPost("reference"),
        ];
        // Update delivery valuation summary
        $summaryGrn = $this->suppliersModel->newDeliveryValuation($deliverySummaryData);
        // Update the inventory on successful summary confirmation
        if ($summaryGrn) {
            $inventoryDetailsData = []; //Batch initialisation
            for ($x = 0; $x < count($items); $x++) {
                // Line inventory item 
                $inventoryItem = [
                    "transaction_type_id" => 1,
                    "transaction_id" => $summaryGrn,
                    "trans_date" => $date,
                    "client_id" => $supplier,
                    "item_no" => $x + 1,
                    "grade_id" => $items[$x]["grdId"],
                    "store_id" => $store,
                    "qty_in" => $items[$x]["grdQty"],
                    "currency_id" => $currency,
                    "price" => $items[$x]["grdPx"],
                    "exch_rate" => $exch_rate,
                    "moisture" => $mc,
                ];
                array_push($inventoryDetailsData, $inventoryItem);
            }
            // Updating inventory
            $inventoryUpdate = $this->suppliersModel->inventoryValuationUpdate($inventoryDetailsData);
            if ($inventoryUpdate) {
                $status["sms"] = "success";
            } else {
                $status["sms"] = "fail";
            }
            return $this->response->setJSON($status);
        }
    }

    // Save new valuation
    public function newSalesReport()
    {
        $date = $this->request->getPost("date");
        $buyer = $this->request->getPost("buyer");
        $ref = $this->request->getPost("ref");
        $moisture = $this->request->getPost("moisture");
        $items = $this->request->getPost("items");
        $quantities = $this->request->getPost("quantities");
        $prices = $this->request->getPost("prices");
        $currency = $this->suppliersModel->clientsList($this->fpo, "B", "", $buyer)[0]["currency_id"];
        $salesReportData = [
            "date" => $date,
            "fpo" => $this->fpo,
            "client_id" => $buyer,
            "prepared_by" => 1, //To be updated to reflect the current user
            "reference" => $ref
        ];
        // Save summary and obtain sales report Id
        $salesReportId = $this->buyersModel->saveSalesReportSummary($salesReportData);
        // Update Inventory
        if ($salesReportId) {
            $inventoryData = [];
            for ($x = 0; $x < count($items); $x++) {
                $itemData = [
                    "transaction_type_id" => 2,
                    "transaction_id" => $salesReportId,
                    "trans_date" => $date,
                    "client_id" => $buyer,
                    "item_no" => $x + 1,
                    "grade_id" => $items[$x],
                    "store_id" => 1, //To be updated to include store on the valuation
                    "qty_out" => $quantities[$x],
                    "currency_id" => $currency, //To be updated to capture the actual currency
                    "price" => $prices[$x],
                    "exch_rate" => 1, //To be updated to capture the actual rate
                    "moisture" => $moisture,
                ];
                array_push($inventoryData, $itemData);
            }
            // save items in the inventory
            $saveDetails = $this->buyersModel->newSalesReportInventoryItems($inventoryData);
            if ($saveDetails) {
                $sms["status"] = "Success";
            } else {
                $sms["status"] = "Fail";
            }
            return $this->response->setJSON($sms);
        }
    }

    // Edit sales Report Data
    public function editSalesReportData()
    {
        $sId = $this->request->getPost("sId");
        $salesData = $this->buyersModel->salesReportData($this->fpo, $sId, "", "", "");
        $data["reportNo"] = $salesData[0]["sales_report_no"];
        $data["salesDate"] = $salesData[0]["date"];
        $data["buyerId"] = $salesData[0]["client_id"];
        $data["buyerName"] = $salesData[0]["name"];
        $data["ref"] = $salesData[0]["reference"];
        $data["mc"] = $salesData[0]["moisture"];
        $data["currencyId"] = $salesData[0]["currency_id"];
        $data["currencyCode"] = $salesData[0]["curency_code"];
        $data["fxRate"] = $salesData[0]["exch_rate"];
        $items = [];
        $grandTotal = 0;
        for ($x = 0; $x < count($salesData); $x++) {
            $qty = $salesData[$x]["qty_out"];
            $price = $salesData[$x]["price"];
            $amount = $qty * $price;
            $itm = [
                "rowNo" => $x + 1,
                "code" => $salesData[$x]["grade_code"],
                "gradeId" => $salesData[$x]["grade_id"],
                "gradeName" => $salesData[$x]["grade_name"],
                "qty" => $qty,
                "unit" => $salesData[$x]["unit"],
                "price" => $price,
                "amount" => $amount,
            ];
            $grandTotal += $amount;
            array_push($items, $itm);
        }
        $data["items"] = $items;
        $data["salesTotal"] = $grandTotal;
        return $this->response->setJSON($data);
    }

    // Save adjusted sales report
    public function saveAdjustedSalesReport() {}


    // 
}
