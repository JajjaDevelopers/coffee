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
    public function saveRoasteryItemReceiving() {}

    // Available Roastery GRNs not yet received
    public function availableRoasteryGrns()
    {
        $customer = $this->request->getPost("customer");
        $data["grns"] = $this->roasteryModel->availableRoasteryGrns($customer);
        return $this->response->setJSON($data);
    }

    // 
}
