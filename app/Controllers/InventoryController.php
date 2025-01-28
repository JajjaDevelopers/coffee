<?php

namespace App\Controllers;

use App\Models\GradesModel;
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
    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->gradesModel = new GradesModel;
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



    // 
}
