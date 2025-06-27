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
    $routes->get('tienda', 'ProductoController::tienda');


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

//================================RUTAS DE USUARIOS====================================

    // Listar usuarios (página principal admin usuarios)
    $routes->get('usuarios/admin', 'UsuariosController::admin');

    // Mostrar formulario para crear usuario
    $routes->get('usuarios/crear', 'UsuariosController::crear');

    // Guardar nuevo usuario (POST)
    $routes->post('usuarios/guardar', 'UsuariosController::guardar');

    // Mostrar formulario para editar usuario
    $routes->get('usuarios/editar/(:num)', 'UsuariosController::editar/$1');

    // Actualizar usuario (POST)
    $routes->post('usuarios/actualizar/(:num)', 'UsuariosController::actualizar/$1');

    // Eliminar usuario
    $routes->get('usuarios/eliminar/(:num)', 'UsuariosController::eliminar/$1');










// Configuración
$routes->get('config', 'ConfigController::getConfig', ['as' => 'config']);