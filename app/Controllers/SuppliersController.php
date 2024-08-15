<?php

namespace App\Controllers;

use App\Controllers\Traits\CommonData;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GradesModel;
use App\Models\SuppliersModal;


class SuppliersController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $suppliersModel;
    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->gradesModel = new GradesModel;
        $this->suppliersModel = new SuppliersModal;
    }
    public function index()
    {
        $page_title = "Suppliers";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('suppliers/suppliers', compact('page_title', 'commonData', 'coffeeTypes'));
    }
    // Get Suppliers List
    public function suppliersList()
    {
        $data["suppliers"] = $this->suppliersModel->suppliersList($this->fpo);
        return $this->response->setJSON($data);
    }

    // Deliveries Page
    public function deliveriesView()
    {
        $page_title = "Suppliers";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('suppliers/deliveriesView', compact('page_title', 'commonData', 'coffeeTypes'));
    }


    // Previous deliveries
    public function deliveries()
    {
        $fromDate = $this->request->getPost("fromDate");
        $toDate = $this->request->getPost("toDate");
        $suppplier = $this->request->getPost("supplier");
        $deliveries = $this->suppliersModel->deliveries($this->fpo, $fromDate, $toDate, $suppplier);
        $data["deliveries"] = $deliveries;
        return $this->response->setJSON($data);
    }
    // Add categories
    public function addSupplier()
    {
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

    // New delivery valuation
    public function newDeliveryValuation()
    {
        $date = $this->request->getPost("date");
        $supplier = $this->request->getPost("supplier");
        $currency = $this->request->getPost("currency");
        $exch_rate = $this->request->getPost("exch_rate");
        $mc = $this->request->getPost("mc");
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
            $inventoryDetails = [
                "transaction_type_id" => 1,
                "transaction_id" => $summaryGrn,
                "trans_date" => $date,
                "client_id" => $supplier,
                "item_no",
                "grade_id",
                "store_id",
                "qty_in",
                "currency_id" => $currency,
                "price",
                "exch_rate" => $exch_rate,
                "moisture" => $mc,
            ];
        }
    }

    // Get coffee groups
    // public function gradeGroupsList()
    // {
    //     $data["groupsList"] = $this->gradesModel->gradeGroupsList($this->fpo);
    //     return $this->response->setJSON($data);
    // }

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
