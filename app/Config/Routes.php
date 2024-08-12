<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//login
$routes->get('/', [AuthController::class, 'index']);
$routes->get('/logout', [AuthController::class, 'logout']);
$routes->post('login', [AuthController::class, 'login']);
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
// Groups
$routes->post('/grades/groupsList', 'CoffeeGradesController::gradeGroupsList');

// Suppliers and Purchases
$routes->get('/suppliers', 'SuppliersController::index');
$routes->post('/suppliers/list', 'SuppliersController::suppliersList');
$routes->get('/deliveries', 'SuppliersController::deliveriesView');
$routes->post('/suppliers/deliveries', 'SuppliersController::deliveries');
$routes->post('/suppliers/addSupplier', 'SuppliersController::addSupplier');
