<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'MakananController::index');

// CRUD Makanan Routes
$routes->group('makanan', function ($routes) {
    $routes->get('/', 'MakananController::index');
    $routes->get('create', 'MakananController::create');
    $routes->post('store', 'MakananController::store');
    $routes->get('detail/(:num)', 'MakananController::show/$1');
    $routes->get('edit/(:num)', 'MakananController::edit/$1');
    $routes->post('update/(:num)', 'MakananController::update/$1');
    $routes->get('delete/(:num)', 'MakananController::delete/$1');
    $routes->post('delete/(:num)', 'MakananController::delete/$1');
});
