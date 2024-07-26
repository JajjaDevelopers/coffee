<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Grade Categories
$routes->get('/', 'DashboardController::index');
$routes->get('/admin/coffee-grades', 'CoffeeGradesController::coffeeGrades');
$routes->post('/grades/categories', 'CoffeeGradesController::getCoffeeCategories');
$routes->post('/coffee/types', 'CoffeeGradesController::getCoffeeTypes');
$routes->post('/coffee/addCategory', 'CoffeeGradesController::addCategory');
// Grades
$routes->post('/grades/gradesList', 'CoffeeGradesController::getGrades');
