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
        $data["buyersList"] = $this->suppliersModel->clientsList($this->fpo, "B", $searchStr);
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


    // Previous delivery valuation
    public function deliveryValuations()
    {
        $fromDate = $this->request->getPost("fromDate");
        $toDate = $this->request->getPost("toDate");
        $suppplier = $this->request->getPost("supplier");
        $deliveries = $this->suppliersModel->deliveryValuations($this->fpo, $fromDate, $toDate, $suppplier);
        $data["deliveries"] = $deliveries;
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
    public function newValuation()
    {
        $date = $this->request->getPost("date");
        $supplier = $this->request->getPost("supplier");
        $grn = $this->request->getPost("grn");
        $moisture = $this->request->getPost("moisture");
        $items = $this->request->getPost("items");
        $quantities = $this->request->getPost("quantities");
        $prices = $this->request->getPost("prices");
        $valuationSummaryData = [
            "valuation_date" => $date,
            "client_id" => $supplier,
            "grn" => $grn,
            "fpo" => $this->fpo,
            "prepared_by" => 1, //To be changed to reflect the current user
        ];
        // Save summary and obtain valuation Id
        $valuationId = $this->suppliersModel->newValuationSummary($valuationSummaryData);
        // Update Inventory
        if ($valuationId) {
            $inventoryData = [];
            for ($x = 0; $x < count($items); $x++) {
                $itemData = [
                    "transaction_type_id" => 1,
                    "transaction_id" => $valuationId,
                    "trans_date" => $date,
                    "client_id" => $supplier,
                    "item_no" => $x + 1,
                    "grade_id" => $items[$x],
                    "store_id" => 1, //To be updated to include store on the valuation
                    "qty_in" => $quantities[$x],
                    "currency_id" => 1, //To be updated to capture the actual currency
                    "price" => $prices[$x],
                    "exch_rate" => 1, //To be updated to capture the actual rate
                    "moisture" => $moisture,
                ];
                array_push($inventoryData, $itemData);
            }
            // save items in the inventory
            $saveDetails = $this->suppliersModel->newValuationInventoryItems($inventoryData);
            if ($saveDetails) {
                $sms["status"] = "Success";
            } else {
                $sms["status"] = "Fail";
            }
            return $this->response->setJSON($sms);
        }
    }

    // Add grade
    // public function addGrade()
    // {
    //     $grdData = [
    //         "grade_code" => $this->request->getPost("grdCode"),
    //         "grade_name" => $this->request->getPost("grdName"),
    //         "category_id" => $this->request->getPost("grdCatId"),
    //         "unit" => $this->request->getPost("grdUnit"),
    //         "group_id" => $this->request->getPost("grdGroup")
    //     ];
    //     $addGrade = $this->gradesModel->addGrade($grdData);
    //     if ($addGrade) {
    //         $data["sms"] = "success";
    //     } else {
    //         $data["sms"] = "fail";
    //     }
    //     return $this->response->setJSON($data);
    // }


    // 
}
