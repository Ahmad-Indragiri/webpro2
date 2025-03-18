<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CrudController::index');
$routes->get('crud/create', 'CrudController::create');
$routes->post('crud/store', 'CrudController::store');
$routes->get('crud/edit/(:num)', 'CrudController::edit/$1');
$routes->post('crud/update/(:num)', 'CrudController::update/$1');
$routes->get('crud/delete/(:num)', 'CrudController::delete/$1');

