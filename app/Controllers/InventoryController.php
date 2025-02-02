<?php

namespace App\Controllers;

use App\Models\GradesModel;
use App\Models\InventoryModel;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;


class InventoryController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $validation;
    public $userData;
    public $inventoryModel;

    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->userData = $this->CommonData()["user"];
        $this->gradesModel = new GradesModel;
        $this->inventoryModel = new InventoryModel;
        $this->validation = Services::validation();
    }

    // GRNs page
    public function grns()
    {
        // $data['pageTitle'] = "Coffee Grades";
        $page_title = "Goods Received";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('inventory/grns', compact('page_title', 'commonData', 'coffeeTypes'));
    }

    // Save new GRN
    public function saveNewGrn()
    {
        // summary in the grns table
        $grnDate = $this->request->getPost("date");
        $supplier = $this->request->getPost("supplier");
        $summaryData = [
            "grn_date" => $grnDate,
            "grn_no" => $this->request->getPost("grnNo"),
            "client_id" => $supplier,
            "vehicle_reg_no" => $this->request->getPost("vehicleNo"),
            "vehicle_size" => $this->request->getPost("vehicleSize"),
            "weighing_fees" => $this->request->getPost("weighingFees"),
            "delivered_by" => $this->request->getPost("deliveredBy"),
            "wb_ticket_no" => $this->request->getPost("ticketNo"),
            "remarks" => $this->request->getPost("remarks"),
            "items_origin" => $this->request->getPost("origin"),
            "bags" => $this->request->getPost("bags"),
            "purpose_id" => $this->request->getPost("purpose"),
            "prepared_by" => $this->userData["id"],
        ];
        $grnId = $this->inventoryModel->saveNewGrnSummary($summaryData); //Returns grnId after saving in the grns table
        // Inventory details in the inventory table
        if ($grnId) {
            $inventoryData = [
                "transaction_type_id" => 3, //For GRN
                "transaction_id" => $grnId,
                "trans_date" => $grnDate,
                "client_id" => $supplier,
                "item_no" => 1,
                "grade_id" => $this->request->getPost("item"),
                "store_id" => 1,
                "qty_in" => $this->request->getPost("qty"),
            ];
            $saveInventory = $this->inventoryModel->saveNewGrnInventory($inventoryData);
            if ($saveInventory) {
                $sms["status"] = "Success";
            } else {
                $sms["status"] = "Fail";
            }
            return $this->response->setJSON($sms);
        }
    }

    // GRNs list
    public function grnList()
    {
        $startDate = $this->request->getPost("startDate");
        $endDate = $this->request->getPost("endDate");
        $supplier = $this->request->getPost("supplier");
        $data["grns"] = $this->inventoryModel->grnList($startDate, $endDate, $supplier);
        return $this->response->setJSON($data);
    }

    // Check GRN existence
    public function getGrnDetails()
    {
        $grnNo = $this->request->getPost("grn");
        $data["grnDetails"] = $this->inventoryModel->getGrnDetails($grnNo)[0];
        return $this->response->setJSON($data);
    }


    // 
}
