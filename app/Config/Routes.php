<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::login');

// Authentication Routes
$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::authenticate');
$routes->get('register', 'UserController::register');
$routes->post('register', 'UserController::store');
$routes->get('logout', 'UserController::logout');

// Customer Dashboard
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);

// Profile Management
$routes->get('profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->get('profile/edit', 'ProfileController::edit', ['filter' => 'auth']);
$routes->post('profile/update', 'ProfileController::update', ['filter' => 'auth']);
$routes->get('profile/delete', 'ProfileController::delete', ['filter' => 'auth']);

// Admin Routes
$routes->group('admin', ['filter' => ['auth', 'admin']], function($routes) {
    $routes->get('dashboard', 'AdminController::index');

    // Package Management
    $routes->get('packages', 'AdminController::packages');
    $routes->get('packages/create', 'AdminController::createPackage');
    $routes->post('packages/store', 'AdminController::storePackage');
    $routes->get('packages/edit/(:num)', 'AdminController::editPackage/$1');
    $routes->post('packages/update/(:num)', 'AdminController::updatePackage/$1');
    $routes->get('packages/delete/(:num)', 'AdminController::deletePackage/$1');
});