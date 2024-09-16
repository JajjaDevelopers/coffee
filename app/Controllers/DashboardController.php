<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Models\BuyersModel;


class DashboardController extends BaseController
{
    use CommonData;
    protected $fpo;
    protected $db;
    public $buyersModel;

    public function __construct()
    {
        $this->fpo = 1;
        $this->db = \Config\Database::connect();
        $this->buyersModel = new BuyersModel;
    }

    public function index()
    {
        $page_title = "Home";
        $commonData = $this->commonData();
        return view('dashboard/index', compact('page_title', 'commonData'));
    }

    // Annual Sales by coffee type
    public function previousSales()
    {
        $builder = $this->db->query("SELECT acc_year_id, fpo, start_date, end_date
                    FROM accounting_years WHERE acc_year_id =(SELECT max(acc_year_id))
                    AND fpo = '{$this->fpo}'");
        $currentPeriod = $builder->getResultArray()[0];
        $dateFrom = new Time($currentPeriod["start_date"]);
        $dateTo = new Time($currentPeriod["end_date"]);
        $data["currentDate"] = new Time("now");
        $allSales = $this->buyersModel->previousSales($this->fpo, $dateFrom, $dateTo, "");
        // Categorizing sales by coffee type
        $robustaQty = 0;
        $robustaValue = 0;
        $arabicaQty = 0;
        $arabicaValue = 0;
        // Categorizing sales by market - Local and Exports
        $localQty = 0;
        $localValue = 0;
        $exportQty = 0;
        $exportValue = 0;
        for ($x = 0; $x < count($allSales); $x++) {
            // Coffee type filtering
            $type = $allSales[$x]["type_name"];
            $qty = $allSales[$x]["salesQty"];
            $value = $allSales[$x]["salesValue"];
            if ($type == "Robusta") {
                $robustaQty += $qty;
                $robustaValue += $value;
            } else if ($type == "Arabica") {
                $arabicaQty += $qty;
                $arabicaValue += $value;
            }
            // Market share filtering
            $marketSeg = $allSales[$x]["market"];
            if ($marketSeg == "Local") {
                $localQty += $qty;
                $localValue += $value;
            } else if ($marketSeg == "Export") {
                $exportQty += $qty;
                $exportValue += $value;
            }
        }
        // Response Data
        // Coffee Types
        $data["robustaQty"] = $robustaQty;
        $data["robustaValue"] = $robustaValue;
        $data["arabicaQty"] = $arabicaQty;
        $data["arabicaValue"] = $arabicaValue;
        // Market Share
        $data["localQty"] = $localQty;
        $data["localValue"] = $localValue;
        $data["exportQty"] = $exportQty;
        $data["exportValue"] = $exportValue;
        // $data["sales"] = $allSales;
        return $this->response->setJSON($data);
    }

    // 
}
