<?php

use App\Controllers\ProductController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('product', ['controller' => '\App\Controllers\ProductController']);
