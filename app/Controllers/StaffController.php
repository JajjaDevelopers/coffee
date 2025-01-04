<?php

namespace App\Controllers;

use App\Libraries\Password;
use App\Models\StaffModel;
use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;

class StaffController extends BaseController
{
    use CommonData;
    protected $staff;

    public function __construct()
    {
        $this->staff = new StaffModel();
    }

    /**
     * Retrieves all staff information
     *
     * @return void
     */
    public function index()
    {
        //
        $staff = $this->staff
            ->select('id, fname, lname, middle_name, email, phone, address, role')
            ->findAll();
        $page_title = 'Staff View';
        $commonData = $this->commonData();
        return view('staff/index_view', compact('staff', 'commonData', 'page_title'));
    }

    public function store()
    {
        if (!$this->validate(Services::validation()->getRuleGroup("addStaffRules"))) {
            $validationErrors = $this->validator->listErrors();
            $this->response->setStatusCode(422);
            return $this->response->setJSON(["error" => $validationErrors]);
        }

        $staffInformation = $this->request->getPost();
        unset($staffInformation['csrf_test_name']);
        $staffInformation['password'] = Password::hash($staffInformation['password']);
        if ($this->staff->insert($staffInformation)) {
            return $this->response->setStatusCode(201) // 201 Created
                ->setJSON([
                    'status' => true,
                    'message' => 'Staff member saved successfully!',
                ]);
        } else {
            return $this->response->setStatusCode(400) // 400 Bad Request
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to save staff member.',
                    'errors' => $this->staff->errors(),
                ]);
        }
    }
    public function edit($staffId)
    {
        $staff = $this->staff->find($staffId);
        if (!$staff) {
            return $this->response->setJSON(['error' => 'Staff member not found.'], ResponseInterface::HTTP_NOT_FOUND);
        }

        $view = view('staff/edit_view', compact('staff'));
        return $this->response->setJSON(['view' => $view]);
    }
    public function update($staffId) {}
}
