<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    use CommonData;
    public function index()
    {
        $page_title = "Home";
        $commonData = $this->commonData();
        return view('dashboard/index', compact('page_title','commonData'));
    }
}
