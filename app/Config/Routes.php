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

$routes->post('login/process', 'AuthController::loginProcess');
$routes->get('logout', 'AuthController::logout');


// Rutas de páginas estáticas
$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('quienes-somos', 'Home::quienesSomos', ['as' => 'quienes-somos']);
    $routes->get('login', 'Home::login', ['as' => 'login']);
    $routes->get('registrarse', 'Home::registrarse', ['as' => 'registrarse']);
    $routes->get('eventos', 'Home::eventos', ['as' => 'eventos']);
});


// Rutas de artículos
    // Vista para clientes
    $routes->get('productos', 'ProductoController::tienda');

    // Vista para administradores
    $routes->get('productos/admin', 'ProductoController::tiendaAdmin');
    $routes->get('productos/crear', 'ProductoController::crear');
    $routes->post('productos/guardar', 'ProductoController::guardar');
    $routes->get('productos/editar/(:num)', 'ProductoController::editar/$1');
    $routes->post('productos/actualizar/(:num)', 'ProductoController::actualizar/$1');
    $routes->get('productos/eliminar/(:num)', 'ProductoController::eliminar/$1');
    
    // Mostrar formulario para crear producto (GET)
    $routes->get('productos/crear', 'ProductoController::crear');

    // Guardar producto nuevo (POST)
    $routes->post('productos/guardar', 'ProductoController::guardar');







// Configuración
$routes->get('config', 'ConfigController::getConfig', ['as' => 'config']);