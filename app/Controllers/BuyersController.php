<?php

namespace App\Controllers;


use CodeIgniter\I18n\Time;
use App\Models\BuyersModel;
use App\Models\GradesModel;
use App\Models\GeneralModal;
use App\Models\SuppliersModal;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\SuppliersController;


class BuyersController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $suppliersModel;
    public $generalModel;
    public $buyersModel;
    public $userData;
    public $dtNow; //DateTime now
    public $suppliersController;

    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $timeNow = Time::now();
        $this->dtNow = $timeNow->toDateTimeString();
        $this->gradesModel = new GradesModel;
        $this->suppliersModel = new SuppliersModal;
        $this->generalModel = new GeneralModal;
        $this->buyersModel = new BuyersModel;
        $this->suppliersController = new SuppliersController;
        $this->userData = $this->CommonData()["user"];
    }
    public function buyers()
    {

        $page_title = "Buyers";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        $buyerCategories = $this->suppliersModel->getClientCategories($this->fpo, "");
        return view('buyers/buyers', compact('page_title', 'commonData', 'coffeeTypes', 'buyerCategories'));
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
        $contractTypes = $this->buyersModel->contractTypes($this->fpo);
        return view('buyers/salesView', compact('page_title', 'commonData', 'dateToday', 'contractTypes'));
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
    // Add buyer
    public function addBuyer()
    {
        if(!$this->validate(Services::validation()->getRuleGroup("buyerInfoValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        } 
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

    // Edit buyer
    public function editBuyer()
    {
        if(!$this->validate(Services::validation()->getRuleGroup("buyerUpdateInfoValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        } 
        $newInfo = $this->request->getPost("info");
        $buyer = $this->request->getPost("buyer");
        $editBuyer = $this->buyersModel->editBuyer($buyer, $newInfo);
        if ($editBuyer) {
            $data["sms"] = "Success";
        } else {
            $data["sms"] = "fail";
        }
        return $this->response->setJSON($data);
    }

    // Previous Sales 
    public function previousSales()
    {
        // $buyer = $this->request->getPost("buyer");
        $allSales = $this->buyersModel->previousSales($this->fpo, "", '2024-01-01', '2024-12-31');
        return $this->response->setJSON($allSales);
    }

    // Save new sales report
    public function newSalesReport()
    {

        if(!$this->validate(Services::validation()->getRuleGroup("salesReportValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        } 
        
        $salesReportNo = $this->request->getPost("salesReportNo");
        $date = $this->request->getPost("date");
        $buyer = $this->request->getPost("buyer");
        $ref = $this->request->getPost("ref");
        $moisture = $this->request->getPost("moisture");
        $items = $this->request->getPost("items");
        $quantities = $this->request->getPost("quantities");
        $prices = $this->request->getPost("prices");
        $currency = $this->suppliersModel->clientsList($this->fpo, "B", "", $buyer)[0]["currency_id"];
        $fxRate = $this->request->getPost("fxRate");
        $salesReportData = [
            "date" => $date,
            "fpo" => $this->fpo,
            "sales_report_no" => $salesReportNo,
            "client_id" => $buyer,
            "market" => $this->request->getPost("market"),
            "contract_nature" => $this->request->getPost("contract"),
            "prepared_by" => $this->userData["id"], //To be updated to reflect the current user
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
                    "exch_rate" => $fxRate, //To be updated to capture the actual rate
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
        $data["market"] = $salesData[0]["market"];
        $data["contract"] = $salesData[0]["contract"];
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
    public function saveAdjustedSalesReport()
    {
        if(!$this->validate(Services::validation()->getRuleGroup("salesUpdateReportValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        } ;
        $salesId = $this->request->getPost("salesId");
        $salesReportNo = $this->request->getPost("salesNo");
        $ref = $this->request->getPost("ref");
        $moisture = $this->request->getPost("moisture");
        $fxRate = $this->request->getPost("fxRate");
        $market = $this->request->getPost("market");
        $contractNature = $this->request->getPost("contractNature");
        $items = $this->request->getPost("items");
        $quantities = $this->request->getPost("quantities");
        $prices = $this->request->getPost("prices");
        // Current Sales report summary;
        $currentSummaryDetails = $this->buyersModel->getSalesReportSummary($salesId);
        $buyer = $currentSummaryDetails["client_id"];
        $currency = $this->suppliersModel->clientsList($this->fpo, "B", "", $buyer)[0]["currency_id"];

        $updateData["summaryData"] = [
            "sales_report_no" => $salesReportNo,
            "prepared_by" => 1, //To be changed to match the current user
            "reference" => $ref,
            "market" => $market,
            "contract_nature" => $contractNature,
            "time_prepared" => $this->dtNow,
        ];
        // Inventory update
        $inventoryItems = [];
        for ($x = 0; $x < count($items); $x++) {
            $item = [
                "transaction_type_id" => 2,
                "transaction_id" => $salesId,
                "trans_date" => $currentSummaryDetails["date"],
                "client_id" => $buyer,
                "item_no" => $x + 1,
                "grade_id" => $items[$x],
                "store_id" => 1, //To be adjusted to match the actual store
                "qty_out" => $quantities[$x],
                "currency_id" => $currency,
                "price" => $prices[$x],
                "exch_rate" => $fxRate,
                "moisture" => $moisture
            ];
            array_push($inventoryItems, $item);
        }
        $updateData["inventoryData"] = $inventoryItems;
        $updateSummary = $this->buyersModel->saveAdjustedSalesReport($salesId, $updateData);
        if ($updateSummary) {
            $data["sms"] = "Success";
        } else {
            $data["sms"] = "Fail";
        }
        return $this->response->setJSON($data);
    }

    public function salesReport($salesReportId)
    {
        $salesData = $this->buyersModel->salesReportData($this->fpo,$salesReportId, "", "", "");
        $data["reportNo"] = $salesData[0]["sales_report_no"];
        $data["salesDate"] = $salesData[0]["date"];
        $data["buyerName"] = $salesData[0]["name"];
        $data["preparedBy"] = $salesData[0]["fname"].' '.$salesData[0]["lname"];
        $data['time_prepared']=$salesData[0]['time_prepared'];
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
        return view('reports/sales_report',compact('data'));
    }


    // 
}
