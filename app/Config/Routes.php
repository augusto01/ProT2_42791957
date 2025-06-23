<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Grupo para API
$routes->group('api', function($routes) {
    $routes->get('peleadores', 'ApiController::getPeleadores');
    $routes->post('login', 'ApiController::login');
});

// Rutas para páginas estáticas (si usas Views)

//registro de usuario
$routes->post('api/registro', 'AuthController::register');
$routes->get('quienes-somos', 'Home::quienesSomos');
$routes->get('login', 'Home::login');
$routes->get('registrarse', 'Home::registrarse');
$routes->get('eventos', 'Home::eventos');
$routes->get('config', 'ConfigController::getConfig');
