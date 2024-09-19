<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tokotas/simple-json', 'TokoTas::showSimpleJson');
$routes->get('tokotas/data-tokotas', 'TokoTas::getTokoTasJson');
$routes->get('tokotas/hapus/(:num)', 'TokoTas::delete/$1'); 