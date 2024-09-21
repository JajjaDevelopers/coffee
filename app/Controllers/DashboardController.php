<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Controllers\BaseController;
use App\Controllers\Traits\CommonData;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use App\Models\BuyersModel;
use App\Models\SuppliersModal;
use App\Controllers\GeneralController;


class DashboardController extends BaseController
{
    use CommonData;
    protected $fpo;
    protected $db;
    public $buyersModel;
    public $supplierModel;
    public $generalFunctions;

    public function __construct()
    {
        $this->fpo = 1;
        $this->db = \Config\Database::connect();
        $this->buyersModel = new BuyersModel;
        $this->supplierModel = new SuppliersModal;
        $this->generalFunctions = new GeneralController;
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
        $currentPeriod = $this->generalFunctions->currentAccountingPeriod();
        $dateFrom = new Time($currentPeriod["start_date"]);
        $dateTo = new Time($currentPeriod["end_date"]);
        // Getting months
        $secondMonth = $dateFrom->addMonths(0);
        $monthlySales = [];
        $cummulativeSales = 0;
        for ($x = 0; $x < 12; $x++) {
            $monthNumber = $dateFrom->addMonths($x)->getMonth();
            $details["month"] = $this->generalFunctions->monthNames()[$monthNumber] . " " . $dateFrom->addMonths($x)->getYear();
            // Query starting date
            $monthStart = $dateFrom->addMonths($x)->toDateString();
            // Query ending date
            $monthEnd = $dateFrom->addMonths($x + 1)->subDays(1)->toDateString();
            // Getting sales based on the date range
            $monthSales = $this->buyersModel->previousSales($this->fpo, $monthStart, $monthEnd, "");
            $sQty = 0;
            $sValue = 0;
            for ($i = 0; $i < count($monthSales); $i++) {
                $sQty += $monthSales[$i]["salesQty"];
                $sValue += $monthSales[$i]["salesValue"];
            }
            $details['actualSalesQty'] = $sQty;
            $details['actualSalesValue'] = $sValue;
            $cummulativeSales += $sValue;
            $details["cummulativeSalesValue"] = $cummulativeSales;
            // Getting purchases based on the date ranges
            $pQty = 0;
            $pValue = 0;
            $monthPurchases = $this->supplierModel->previousPurchases($this->fpo, $monthStart, $monthEnd, "");
            for ($y = 0; $y < count($monthPurchases); $y++) {
                $pQty += $monthPurchases[$y]["purchaseQty"];
                $pValue += $monthPurchases[$y]["purchaseValue"];
            }
            $details["actualPurchaseQty"] = $pQty;
            $details["actualPurchaseValue"] = $pValue;
            array_push($monthlySales, $details);
        }
        $data["currentDate"] = $secondMonth->toDateString();
        $data["allMonthSales"] = $monthlySales;
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

        // Quarterly sales
        $allQuarterSales = [];
        $quarters = $this->generalFunctions->quarterlyPeriods();
        for ($x = 0; $x < count($quarters); $x++) {
            $robustQSales = 0;
            $arabicaQSales = 0;
            $quarterId = $quarters[$x]["quarter"];
            $startDate = $quarters[$x]["startDate"];
            $endDate = $quarters[$x]["endDate"];
            $quarterSales = $this->buyersModel->previousSales($this->fpo, $startDate, $endDate, "");
            for ($i = 0; $i < count($quarterSales); $i++) {
                $type = $quarterSales[$i]["type_name"];
                $qty = $quarterSales[$i]["salesQty"];
                $value = $quarterSales[$i]["salesValue"];
                if ($type == "Robusta") {
                    $robustQSales += $value;
                } else if ($type == "Arabica") {
                    $arabicaQSales += $value;
                }
            }
            array_push($allQuarterSales, [
                "quarter" => $quarterId,
                "robustaSales" => $robustQSales,
                "arabicaSales" => $arabicaQSales
            ]);
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
        $data["quarters"] = $allQuarterSales;
        // $data["sales"] = $allSales;
        return $this->response->setJSON($data);
    }

    // 
}
