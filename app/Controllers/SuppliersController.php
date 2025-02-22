<?php

namespace App\Controllers;

use App\Controllers\Traits\CommonData;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GradesModel;
use App\Models\SuppliersModal;
use CodeIgniter\I18n\Time;
use Config\Services;

class SuppliersController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $suppliersModel;
    public $dateTimeNow;
    public $now;
    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->gradesModel = new GradesModel;
        $this->suppliersModel = new SuppliersModal;
        $this->now = Time::now();
        $this->dateTimeNow = $this->now->toDateTimeString();
    }
    public function index()
    {
        $page_title = "Suppliers";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        $clientCategories = $this->suppliersModel->getClientCategories($this->fpo, "");
        return view('suppliers/suppliers', compact('page_title', 'commonData', 'coffeeTypes', 'clientCategories'));
    }
    // Get Suppliers List
    public function suppliersList()
    {
        $searchStr = $this->request->getPost("searchKey");
        $supplier = $this->request->getPost("supplier");
        $data["suppliers"] = $this->suppliersModel->clientsList($this->fpo, "S", $searchStr, $supplier);
        return $this->response->setJSON($data);
    }

    // Select search customers
    public function searchSuppliers()
    {
        $searchStr = $this->request->getGet("search");
        $list = [];
        $suppliers = $this->suppliersModel->clientsList($this->fpo, "S", $searchStr);
        for ($x = 0; $x < count($suppliers); $x++) {
            $list[$x]["id"] = $suppliers[$x]["client_id"];
            $list[$x]["text"] = $suppliers[$x]["name"];
        }
        $data["results"] = $list;
        return $this->response->setJSON($data);
    }

    // Deliveries Page
    public function deliveriesView()
    {
        $timeNow = Time::now();
        $dateToday = $timeNow->toLocalizedString('dd-MM-yyyy');
        $page_title = "Valuations";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('suppliers/valuationsView', compact('page_title', 'commonData', 'dateToday'));
    }


    // Previous delivery valuation
    public function deliveryValuations()
    {
        $fromDate = $this->request->getPost("fromDate");
        $toDate = $this->request->getPost("toDate");
        $suppplier = $this->request->getPost("supplier");
        $summary = $this->request->getPost("summary");
        $deliveries = $this->suppliersModel->deliveryValuations($this->fpo, $fromDate, $toDate, $summary, $suppplier);
        $data["deliveries"] = $deliveries;
        return $this->response->setJSON(
            $data
        );
    }
    // Add supplier
    public function addSupplier()
    {
        if (!$this->validate(Services::validation()->getRuleGroup("supplierValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        }
        $data = [
            "fpo" => $this->fpo,
            "client_type" => "S",
            "name" => $this->request->getPost("supplierName"),
            "contact_person" => $this->request->getPost("contactPerson"),
            "district" => $this->request->getPost("supplierDistrict"),
            "telephone_1" => $this->request->getPost("supplierTel1"),
            "telephone_2" => $this->request->getPost("supplierTel2"),
            "email_1" => $this->request->getPost("supplierEmail"),
            "category_id" => $this->request->getPost("supplierCategory"),
            "currency_id" => $this->request->getPost("supplierCurrency"),
            "role" => $this->request->getPost("conatctRole"),
            "subcounty" => $this->request->getPost("supplierSubcounty"),
            "street" => $this->request->getPost("supplierStreet"),
        ];
        $addSupplier = $this->suppliersModel->addSupplier($data);
        if ($addSupplier) {
            $sms["sms"] = "success";
        } else {
            $sms["sms"] = "fail";
        }
        return $this->response->setJSON($sms);
    }

    // Edit supplier
    public function editSupplier()
    {
        if (!$this->validate(Services::validation()->getRuleGroup("updateSupplierValidationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        }
        $supplier = $this->request->getPost("supplier");
        // Adjusted details
        $details = [
            "name" => $this->request->getPost("sName"),
            "contact_person" => $this->request->getPost("sName"),
            "district" => $this->request->getPost("sDistrict"),
            "telephone_1"  => $this->request->getPost("sTel1"),
            "telephone_2" => $this->request->getPost("sTel2"),
            "email_1" => $this->request->getPost("sEmail"),
            "category_id" => $this->request->getPost("sCategory"),
            "role" => $this->request->getPost("sContactRole"),
            "subcounty" => $this->request->getPost("sSubCounty"),
            "street" => $this->request->getPost("sStreet"),
        ];
        $edit =  $this->suppliersModel->editSupplier($supplier, $details);
        if ($edit) {
            $response["sms"] = "success";
        } else {
            $response["sms"] = "fail";
        }
        return $this->response->setJSON($response);
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
            "prepared_by" => $this->commonData()["user"]["id"],
            "time_prepared" => $this->dateTimeNow,
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
        if (!$this->validate(Services::validation()->getRuleGroup("valuationRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        }
        $date = $this->request->getPost("date");
        $supplier = $this->request->getPost("supplier");
        $grn = $this->request->getPost("grn");
        $moisture = $this->request->getPost("moisture");
        $valFx = $this->request->getPost("valFx");
        $sustDeduction = $this->request->getPost("sustDeduction");
        $processDeduction = $this->request->getPost("processDeduction");
        $items = $this->request->getPost("items");
        $quantities = $this->request->getPost("quantities");
        $prices = $this->request->getPost("prices");
        $valuationSummaryData = [
            "valuation_date" => $date,
            "client_id" => $supplier,
            "grn" => $grn,
            "fpo" => $this->fpo,
            "prepared_by" => $this->commonData()["user"]["id"], //To be changed to reflect the current user
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
    public function valuationDetails()
    {
        $vId = $this->request->getPost("vId");
        $valuation = $this->suppliersModel->valuationPreview($vId);
        return $this->response->setJSON($valuation);
    }

    // Valution modification
    public function editValuation()
    {
        $valuationId = $this->request->getPost("valId");
        $mc = $this->request->getPost("valMc");
        $itemIds = $this->request->getPost("itemIds");
        $itemQtys = $this->request->getPost("itemQtys");
        $itemPxs = $this->request->getPost("itemPxs");
        $currentSummary = $this->suppliersModel->valuationPreview($valuationId);
        $date = $currentSummary["summary"]["date"];
        $supplier = $currentSummary["summary"]["supplier_id"];
        // Valuation summary. Only changing required fields and the rest should not be changed
        $summaryData = [
            "grn" => $this->request->getPost("valGrn"),
            "prepared_by" => $this->commonData()["user"]["id"],
            "time_prepared" => $this->dateTimeNow,
        ];
        // Inventory details
        $inventoryDetails = [];
        for ($x = 0; $x < count($itemIds); $x++) {
            $item = [
                "transaction_type_id" => 1, // 1 for purchases or valuations
                "transaction_id" => $valuationId,
                "trans_date" => $date,
                "client_id" => $supplier,
                "item_no" => $x + 1,
                "grade_id" => $itemIds[$x],
                "store_id" => 1,
                "qty_in" => $itemQtys[$x],
                "currency_id" => 1, //Assuming all suppliers are set to UGX as their currency
                "price" => $itemPxs[$x],
                "exch_rate" => 1, //Assuming all valuations are made in UGX
                "moisture" => $mc,
            ];
            array_push($inventoryDetails, $item);
        }
        $data["summary"] = $summaryData;
        $data["inventory"] = $inventoryDetails;
        $edit = $this->suppliersModel->editValuation($valuationId, $data);
        $response["sms"] = $edit;
        return $this->response->setJSON($response);
    }

    // Print valuation Report
    public function printValuationReport()
    {
        $vId = $this->request->getGet("v");
        $valuationData = $this->suppliersModel->valuationPreview($vId);
        $data["items"] = $valuationData["items"];
        $data["summary"] = $valuationData["summary"];
        return view('reports/greenUnit/valuationReport', $data);
    }


    // 
}
