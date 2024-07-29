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
        $categories = $this->gradesModel->getCoffeeCategories($this->fpo);
        for ($x = 0; $x < count($categories); $x++) {
            $categories[$x]["qty"] = $this->gradesModel->categoryQtyBalance($this->fpo, $categories[$x]["category_id"])[0]["balance"];
        }
        $data["categories"] = $categories;
        return $this->response->setJSON($data);
    }
    // Add categories
    public function addCategory()
    {
        $coffeeType = $this->request->getPost("coffeeType");
        $categoryname = $this->request->getPost("categoryName");
        $data = [
            "fpo" => $this->fpo,
            "category_name" => $categoryname,
            "type_id" => $coffeeType
        ];
        $addCategory = $this->gradesModel->addCategory($data);
        if ($addCategory) {
            $sms["sms"] = "success";
        } else {
            $sms["sms"] = "fail";
        }
        return $this->response->setJSON($sms);
    }

    // Get grades list
    public function getGrades()
    {
        $grades = $this->gradesModel->getGrades($this->fpo);
        for ($x = 0; $x < count($grades); $x++) {
            // fetch grade balances
            $gradeId = $grades[$x]["grade_id"];
            $grades[$x]["balance"] = $this->gradesModel->gradeQtyBalance($this->fpo, $gradeId)[0]["balance"];
        }
        $data["gradesList"] = $grades;
        return $this->response->setJSON($data);
    }


    // 
}
