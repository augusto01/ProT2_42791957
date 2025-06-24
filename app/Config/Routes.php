<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index', ['as' => 'home']);
// Grupo API
$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    // Peleadores
    $routes->get('peleadores', 'ApiController::getPeleadores', ['as' => 'api.peleadores']);
    
    // Autenticación
    $routes->post('login', 'ApiController::login', ['as' => 'api.login']);
    $routes->post('registro', 'AuthController::register', ['as' => 'api.registro']);
});

// Rutas de páginas estáticas
$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('quienes-somos', 'Home::quienesSomos', ['as' => 'quienes-somos']);
    $routes->get('login', 'Home::login', ['as' => 'login']);
    $routes->get('registrarse', 'Home::registrarse', ['as' => 'registrarse']);
    $routes->get('eventos', 'Home::eventos', ['as' => 'eventos']);
});

// Configuración
$routes->get('config', 'ConfigController::getConfig', ['as' => 'config']);