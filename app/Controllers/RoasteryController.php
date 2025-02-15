<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GradesModel;
use App\Models\InventoryModel;
use CodeIgniter\Config\Services;
use App\Controllers\Traits\CommonData;
use App\Models\RoasteryModel;
use CodeIgniter\HTTP\ResponseInterface;


class RoasteryController extends BaseController
{
    use CommonData;
    protected $fpo;
    public $gradesModel;
    public $validation;
    public $userData;
    public $inventoryModel;
    public $roasteryModel;

    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->userData = $this->CommonData()["user"];
        $this->gradesModel = new GradesModel;
        $this->inventoryModel = new InventoryModel;
        $this->validation = Services::validation();
        $this->roasteryModel = new RoasteryModel;
    }

    // Receive goods in the roastery unit. "Receiving Book"
    public function receiveGoods()
    {
        $page_title = "Goods Received";
        $commonData = $this->commonData();
        return view("/roastery/receivingBook", compact('page_title', 'commonData'));
    }

    // Get roastery receiving items
    public function roasteryReceivingItems()
    {
        $data["grnsList"] = $this->roasteryModel->roasteryReceivingItems();
        return $this->response->setJSON($data);
    }

    // Save roastery item receiving
    public function saveRoasteryItemReceiving()
    {
        $grn = $this->request->getPost("grn");
        $date = $this->request->getPost("date");
        $moisture = $this->request->getPost("moisture");
        // Weigh bridge GRN Data
        $grnData = $this->inventoryModel->getGrnDetails($grn)[0];
        $gradeId = $grnData["grade_id"];
        $qty = $grnData["qty"];
        $summaryData = [
            "grn_date" => $date,
            "grn_id" => $grn,
            "book_no" => $this->request->getPost("bookNo"),
            "remarks" => $this->request->getPost("remarks"),
            "prepared_by" => $this->userData["id"]
        ];
        // Save summary
        $receiptId = $this->roasteryModel->saveRoasteryReceivingSummary($summaryData); //Get the book_id
        // Inventory details
        $inventoryData = [
            [
                "transaction_type_id" => 4,
                "transaction_id" => $receiptId,
                "trans_date" => $date,
                "client_id" => $grnData["supplierId"],
                "item_no" => 1,
                "grade_id" => $gradeId,
                "store_id" => 1, //Coffee moving out to the roastery section
                "qty_out" => $qty,
                "qty_in" => 0,
                "currency_id" => 1,
                "price" => 0,
                "exch_rate" => 1,
                "moisture" => $moisture
            ],
            [
                "transaction_type_id" => 4,
                "transaction_id" => $receiptId,
                "trans_date" => $date,
                "client_id" => $grnData["supplierId"],
                "item_no" => 2,
                "grade_id" => $gradeId,
                "store_id" => 2, //Coffee moving in to the roastery section
                "qty_out" => 0,
                "qty_in" => $qty,
                "currency_id" => 1,
                "price" => 0,
                "exch_rate" => 1,
                "moisture" => $moisture
            ]
        ];
        // Save inventory details
        $saveInventory = $this->roasteryModel->saveRoasteryReceivingInventory($inventoryData);
        if ($saveInventory) {
            $data["status"] = "SUCCESS";
        } else {
            $data["status"] = "FAIL";
        }
        return $this->response->setJSON($data);
    }

    // Available Roastery GRNs not yet received
    public function availableRoasteryGrns()
    {
        $customer = $this->request->getPost("customer");
        $data["grns"] = $this->roasteryModel->availableRoasteryGrns($customer);
        return $this->response->setJSON($data);
    }

    // 
}
