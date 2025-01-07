<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Models\BuyersModel;

// General functions
class GeneralController extends BaseController
{
    use CommonData;
    protected $fpo;
    protected $db;
    public $buyersModel;
    public $monthNames;

    public function __construct()
    {
        $this->fpo = 1;
        $this->db = \Config\Database::connect();
        $this->buyersModel = new BuyersModel;
        $this->monthNames = [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        ];
    }

    // Month Names
    public function monthNames()
    {
        return $this->monthNames;
    }

    // Current accounting period for the fpo
    public function currentAccountingPeriod()
    {
        $builder = $this->db->query("SELECT acc_year_id, fpo, start_date, end_date
                    FROM accounting_years 
                    WHERE acc_year_id = (SELECT max(acc_year_id) FROM accounting_years WHERE fpo = '{$this->fpo}') ");
        $currentPeriod = $builder->getResultArray()[0];
        $dateFrom = new Time($currentPeriod["start_date"]);
        $dateTo = new Time($currentPeriod["end_date"]);
        $data["start_date"] = $dateFrom->toDateString();
        $data["end_date"] = $dateTo->toDateString();
        return $data;
    }

    // Quarterly dates breakdown.
    public function quarterlyPeriods()
    {
        $months = 3;
        $q = 1;
        $quarters = [];
        $startDate = new Time($this->currentAccountingPeriod()["start_date"]); //Start Date
        while ($q <= 4) {
            $endDate = $startDate->addMonths($months)->subDays(1);
            array_push($quarters, [
                "quarter" => "Q" . $q,
                "startDate" => $startDate->toDateString(),
                "endDate" => $endDate->toDateString()
            ]);
            $q++;
            $startDate = $endDate->addDays(1);
        }
        return $quarters;
    }

    // Projections of sales and purchases
    public function projections($startDate, $endDate)
    {
        $query = $this->db->query("SELECT range_from, range_to, sales_qty, avg_sales_price, purchase_qty, avg_purchase_price, remarks
            FROM projections
            WHERE fpo = '{$this->fpo}' 
            AND range_from >= '{$startDate}' AND range_to <= '{$endDate}'");
        return $query->getResultArray();
    }

    // 





    // 
}
