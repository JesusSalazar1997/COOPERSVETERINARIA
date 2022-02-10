<?php
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\PropiedadController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

//Zona privada
$router->get('/admin',[PropiedadController::class, 'index']);
$router->get('/propiedades/crear',[PropiedadController::class, 'crear']);
$router->post('/propiedades/crear',[PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar',[PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class, 'eliminar']);


//Zona pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/servicios', [PaginasController::class, 'servicios']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);


//Login y Autenticacion

$router->get('/login',[LoginController::class, 'login'] );
$router->post('/login',[LoginController::class, 'login'] );
$router->get('/logout',[LoginController::class, 'logout'] );

$router->comprobarRutas();

?>