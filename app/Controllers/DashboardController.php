<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;


class DashboardController extends BaseController
{
    use CommonData;
    public function index()
    {
        $page_title = "Home";
        $commonData = $this->commonData();
        return view('dashboard/index', compact('page_title', 'commonData'));
    }

    // Last 30 days purchases
    public function purchases30()
    {
        $startDate = "";
    }

    // 
}
