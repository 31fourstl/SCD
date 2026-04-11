<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ----------------------------------------------------------------
// Frontend (public)
// ----------------------------------------------------------------
$routes->get('/', 'Home::index');

// ----------------------------------------------------------------
// Admin – authentication (no filter)
// ----------------------------------------------------------------
$routes->get('admin/login',   'Admin\AuthController::login');
$routes->post('admin/login',  'Admin\AuthController::loginPost');
$routes->get('admin/logout',  'Admin\AuthController::logout');

// ----------------------------------------------------------------
// Admin – protected routes (require login)
// ----------------------------------------------------------------
$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    // Redirect /admin → /admin/drops
    $routes->get('/', 'Admin\DropsController::index');

    // Drops CRUD
    $routes->get('drops',              'Admin\DropsController::index');
    $routes->get('drops/create',       'Admin\DropsController::create');
    $routes->post('drops/store',       'Admin\DropsController::store');
    $routes->get('drops/edit/(:num)',  'Admin\DropsController::edit/$1');
    $routes->post('drops/update/(:num)', 'Admin\DropsController::update/$1');
    $routes->post('drops/delete/(:num)', 'Admin\DropsController::delete/$1');
});
