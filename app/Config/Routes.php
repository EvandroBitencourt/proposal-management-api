<?php

use App\Controllers\Api\V1\CustomerController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('api/v1', ['namespace' => ''], static function ($routes) {
    $routes->resource('customer', ['controller' => CustomerController::class, 'except' => 'new, edit']);
});
