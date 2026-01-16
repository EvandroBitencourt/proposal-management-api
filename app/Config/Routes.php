<?php

use App\Controllers\Api\V1\CustomerController;
use App\Controllers\Api\V1\ProposalController;
use App\Controllers\Api\V1\ProposalWorkflowController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('api/v1', ['namespace' => ''], static function ($routes) {

    $routes->resource('proposal', ['controller' => ProposalController::class, 'except' => 'new, edit']);

    $routes->resource('customer', ['controller' => CustomerController::class, 'except' => 'new, edit']);

    $routes->post(
        'proposal/(:num)/submit',
        [ProposalWorkflowController::class, 'submit']
    );

    $routes->get(
        'proposal/(:num)/auditoria',
        [ProposalController::class, 'audit']
    );
});
