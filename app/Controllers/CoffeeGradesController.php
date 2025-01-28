<?php

namespace App\Controllers;

use App\Models\GradesModel;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;


class CoffeeGradesController extends BaseController
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
    public function coffeeGrades()
    {
        // $data['pageTitle'] = "Coffee Grades";
        $page_title = "Coffee Grades";
        $commonData = $this->commonData();
        $coffeeTypes = $this->gradesModel->getCoffeeTypes();
        return view('coffee/coffeeGrades', compact('page_title', 'commonData', 'coffeeTypes'));
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
        $gradeId = $this->request->getPost("gradeId");
        $grades = $this->gradesModel->getGrades($this->fpo, $gradeId, "");

        // for ($x = 0; $x < count($grades); $x++) {
        //     // fetch grade balances
        //     $gradeId = $grades[$x]["grade_id"];
        //     $grades[$x]["balance"] = $this->gradesModel->gradeQtyBalance($this->fpo, $gradeId)[0]["balance"];
        // }
        $data["gradesList"] =  $grades;
        return $this->response->setJSON($data);
    }

    // Search grades
    public function searchGrades()
    {
        $searchKey = $this->request->getGet("search");
        $list = [];
        $grades = $this->gradesModel->getGrades($this->fpo, "", $searchKey);
        for ($x = 0; $x < count($grades); $x++) {
            $list[$x]["id"] = $grades[$x]["grade_id"];
            $list[$x]["text"] = $grades[$x]["grade_name"];
        }
        $data["results"] = $list;
        return $this->response->setJSON($data);
    }

    // Get coffee groups
    public function gradeGroupsList()
    {
        $data["groupsList"] = $this->gradesModel->gradeGroupsList($this->fpo);
        return $this->response->setJSON($data);
    }

    // Add grade
    public function addGrade()
    {
        if (!$this->validate($this->validation->getRuleGroup("coffeeGradeRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["sms" => $validationErrors]);
        }
        $grdData = [
            "grade_code" => $this->request->getPost("grdCode"),
            "grade_name" => $this->request->getPost("grdName"),
            "category_id" => $this->request->getPost("grdCatId"),
            "unit" => $this->request->getPost("grdUnit"),
            "group_id" => $this->request->getPost("grdGroup")
        ];
        $addGrade = $this->gradesModel->addGrade($grdData);
        if ($addGrade) {
            $data["sms"] = "success";
        } else {
            $data["sms"] = "fail";
        }
        return $this->response->setJSON($data);
    }

    // Preview Grades
    public function gradePreview()
    {
        $grdId = $this->request->getPost("grdId");
        $data["grade"] = $this->gradesModel->gradeDetails($grdId)[0];
        return $this->response->setJSON($data);
    }


    // 
}
