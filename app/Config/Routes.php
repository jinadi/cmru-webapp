<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->resource('assignment', ['controller' => 'Assignment', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('officer', ['controller' => 'Officer', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('item', ['controller' => 'Item', 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('user', ['controller' => 'User']);//, 'only' => ['index', 'show', 'create', 'update', 'delete']]);
$routes->resource('report', ['controller' => 'Report']);//, 'only' => ['index', 'show', 'create', 'update', 'delete']]);

$routes->get('/', 'Mainapp::index');
$routes->get('/home', 'Mainapp::home');

$routes->get('/officers', 'Mainapp::addofficer');
$routes->get('/officers/add', 'Mainapp::addofficer');
$routes->get('/officers/edit', 'Mainapp::editofficer');
$routes->get('/items', 'Mainapp::additem');
$routes->get('/items/add', 'Mainapp::additem');
$routes->get('/items/edit', 'Mainapp::edititem');
$routes->get('/assignments', 'Mainapp::addassignment');
$routes->get('/assignments/add', 'Mainapp::addassignment');
$routes->get('/assignments/edit', 'Mainapp::editassignment');
$routes->get('/reports', 'Mainapp::inventory');
$routes->get('/reports/inventory', 'Mainapp::inventory');


$routes->post('/user/login', 'User::login');
$routes->post('/officer/create', 'Officer::create');
$routes->post('/officer/(:num)', 'Officer::update/$1');
$routes->delete('/officer/(:num)', 'Officer::delete/$1');
$routes->post('/item/create', 'Item::create');
$routes->post('/item/(:num)', 'Item::update/$1');
$routes->delete('/item/(:num)', 'Item::delete/$1');
$routes->post('/assignment/create', 'Assignment::create');
$routes->post('/assignment/(:num)', 'Assignment::update/$1');
$routes->delete('/assignment/(:num)', 'Assignment::delete/$1');
