<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\PasswordReset;
use App\Controllers\StaffController;
use App\Controllers\BuyersController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//login
$routes->get('/', [AuthController::class, 'index']);
$routes->post('/', [AuthController::class, 'login']);
$routes->get('/logout', [AuthController::class, 'logout']);


//password reset
$routes->get('/password-reset/request', [PasswordReset::class, 'request']);
$routes->post('/password-reset/send-reset-link', 'PasswordReset::sendResetLink');
$routes->get('/password-reset/reset/(:segment)', 'PasswordReset::reset/$1');
$routes->post('/password-reset/update-password', 'PasswordReset::updatePassword');

// Grade Categories
// $routes->get('/', 'DashboardController::index');

$routes->get('/home', [DashboardController::class, 'index']);
$routes->get('/admin/coffee-grades', 'CoffeeGradesController::coffeeGrades');
$routes->post('/grades/categories', 'CoffeeGradesController::getCoffeeCategories');
$routes->post('/coffee/types', 'CoffeeGradesController::getCoffeeTypes');
$routes->post('/coffee/addCategory', 'CoffeeGradesController::addCategory');
// Grades
$routes->post('/grades/gradesList', 'CoffeeGradesController::getGrades');
$routes->post('/grades/addGrade', 'CoffeeGradesController::addGrade');
$routes->get('/grades/search', 'CoffeeGradesController::searchGrades');
// Groups
$routes->post('/grades/groupsList', 'CoffeeGradesController::gradeGroupsList');

// Suppliers and Purchases
$routes->get('/suppliers', 'SuppliersController::index');
$routes->post('/suppliers/list', 'SuppliersController::suppliersList');
$routes->get('/suppliers/list', 'SuppliersController::searchSuppliers'); //Search suppliers
$routes->get('/valuations', 'SuppliersController::deliveriesView');
$routes->post('/suppliers/deliveryValuations', 'SuppliersController::deliveryValuations');
$routes->post('/suppliers/addSupplier', 'SuppliersController::addSupplier');
$routes->post('/suppliers/editSupplier', 'SuppliersController::editSupplier');
$routes->post('/delivery/saveValuation', 'SuppliersController::newValuation');
$routes->post('/valuation/preview', 'SuppliersController::valuationDetails');
$routes->post('/valuation/modify', 'SuppliersController::editValuation');
$routes->get('/valuation/print', 'SuppliersController::printValuationReport');

// Buyers and Sales/
$routes->get('/buyers', 'BuyersController::buyers');
$routes->post('/buyers/buyersList', 'BuyersController::buyersList');
$routes->get('/buyers/search', 'BuyersController::searchBuyers');
$routes->post('/buyers/addBuyer', 'BuyersController::addBuyer');
$routes->post('/buyer/edit', 'BuyersController::editBuyer');
$routes->get('/sales', 'BuyersController::salesPage');
$routes->post('/sales/saveSalesReport', 'BuyersController::newSalesReport');
$routes->post('/sales/salesReports', 'BuyersController::salesReports');
$routes->post('/saleReport/editData', 'BuyersController::editSalesReportData');
$routes->post('/salesReport/saveAdjusted', 'BuyersController::saveAdjustedSalesReport');
$routes->get('/sales/report/(:num)', 'BuyersController::salesReport/$1');


// General
$routes->get('/admin/countriesList', 'BuyersController::countriesList');

// Dashboard Metrics
$routes->post('/sales/salesByType', 'DashboardController::previousSales');

// Reports
$routes->get('/reports/sales/customers', 'BuyersController::customerSalesReportFilter'); //Sales report filter
$routes->post('/reports/sales/customers', 'BuyersController::customerSalesReport');
$routes->get('/reports/sales/monthly', 'BuyersController::monthlySalesReportView'); //Sales report filter
$routes->post('/reports/sales/monthly', [BuyersController::class, 'monthlySalesReport']); //Sales report filter
//staff
$routes->get('/staff/view', [StaffController::class, 'index']);
$routes->post('/staff/store', [StaffController::class, 'store']);
