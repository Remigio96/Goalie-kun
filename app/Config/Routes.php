<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas AuthController.php
$routes->get('login', 'AuthController::loginForm', ['filter' => 'guest']);
$routes->post('login', 'AuthController::login', ['filter' => 'guest']);

$routes->get('register', 'AuthController::registerForm', ['filter' => 'guest']);
$routes->post('register', 'AuthController::register', ['filter' => 'guest']);

$routes->get('logout', 'AuthController::logout');

// Rutas DashboardController.php
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);