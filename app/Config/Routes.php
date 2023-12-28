<?php

use App\Controllers\ProductController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('product', ['controller' => '\App\Controllers\ProductController']);
$routes->group('api', function ($routes) {
    $routes->post('register', 'Register::index');
    $routes->post('login', 'Login::index');
    $routes->get('users', 'User::index', ['filter' => 'authFilter']);
});