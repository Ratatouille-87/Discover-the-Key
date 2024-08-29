<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nivel1', 'GameController::nivel1');
$routes->get('nivel2', 'GameController::nivel2');
$routes->get('vitoria', 'GameController::vitoria');
$routes->post('verificar', 'GameController::verificar');
$routes->post('nivel2', 'GameController::nivel2');
$routes->post('nivel1', 'GameController::nivel1');


