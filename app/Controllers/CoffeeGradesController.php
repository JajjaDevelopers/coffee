<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GradesModel;

class CoffeeGradesController extends BaseController
{
    protected $fpo;
    public $gradesModel;
    public function __construct()
    {
        $this->fpo = 1; //shall be made dynamic based on login details
        $this->gradesModel = new GradesModel;
    }
    public function coffeeGrades()
    {
        $data['pageTitle'] = "Coffee Grades";
        $data['coffeeTypes'] = $this->gradesModel->getCoffeeTypes();
        return view('coffee/coffeeGrades', $data);
    }
    // Get Coffee Types
    public function getCoffeeTypes()
    {
        $data["coffeeTypes"] = $this->gradesModel->getCoffeeTypes();
        return $this->response->setJSON($data);
    }

    // Get coffee grades
    public function getCoffeeCategories()
    {
        $data["categories"] = $this->gradesModel->getCoffeeCategories($this->fpo);
        return $this->response->setJSON($data);
    }
    // 
}
