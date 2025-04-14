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
$routes->get('pages/contact', 'Pages::contact');
$routes->get('pages/about', 'Pages::about');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login_action', 'Auth::login_action'); // nanti untuk validasi login
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register_action', 'Auth::register_action');


