<?php

use MVC\Router;
use Controllers\APIController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\AsesorController;
use Controllers\ClienteController;
use Controllers\CotizacionController;
use Controllers\GarantiaController;
use Controllers\GarantiasController;
use Controllers\UsuariosController;
use Controllers\ProductosController;    

require_once __DIR__ .'/../includes/app.php';

$router = new Router();

//Iniciar Sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);

//Cerrar Sesion
$router->get('/logout', [LoginController::class, 'logout']);

//PAGINAS PRIVADAS
//Administrador
$router->get('/admin', [AdminController::class, 'index']);
$router->post('/admin', [AdminController::class, 'index']);

//Asesor
$router->get('/asesor', [AsesorController::class, 'index']);
$router->post('/asesor', [AsesorController::class, 'index']);

//Productos
$router->get('/productos', [ProductosController::class, 'index']);
$router->get('/api/busqueda', [APIController::class, 'busqueda']);
$router->get('/api/productos', [APIController::class, 'productos']);
$router->get('/generar-pdf', [ProductosController::class, 'pdf']);
$router->get('/crear', [ProductosController::class, 'crear']);
$router->post('/crear', [ProductosController::class, 'crear']);
$router->get('/editar-producto', [ProductosController::class, 'editar']);
$router->post('/editar-producto', [ProductosController::class, 'editar']);

//Usuarios
$router->get('/usuarios', [UsuariosController::class, 'index']);
$router->get('/api/usuarios', [APIController::class, 'usuarios']);
$router->get('/crear-usuario', [UsuariosController::class, 'crear']);
$router->post('/crear-usuario', [UsuariosController::class, 'crear']);
$router->get('/editar', [UsuariosController::class, 'editar']);
$router->post('/editar', [UsuariosController::class, 'editar']);

//Clientes
$router->get('/clientes', [ClienteController::class, 'index']);
$router->get('/api/clientes', [APIController::class, 'clientes']);
$router->get('/editar-cliente', [ClienteController::class, 'editar']);
$router->post('/editar-cliente', [ClienteController::class, 'editar']);
$router->get('/crear-cliente', [ClienteController::class, 'crear']);
$router->post('/crear-cliente', [ClienteController::class, 'crear']);

/* *Cotizaciones*

*Index y paginas de muestra* */

$router->get('/cotizaciones', [CotizacionController::class, 'index']);
$router->get('/api/buscarClientes', [APIController::class, 'buscarClientes']);
$router->get('/api/buscarProductos', [APIController::class, 'buscarProductos']);
$router->get('/api/temporal',[APIController::class, 'temporal']);
$router->post('/api/temporal',[APIController::class, 'temporal']);
$router->get('/api/buscarTemporal',[APIController::class, 'buscarTemporal']);



/* *Garantias* */
$router->get('/garantias', [GarantiasController::class, 'index']);
$router->get('/crear-garantia', [GarantiasController::class, 'crear']);
$router->post('/crear-garantia', [GarantiasController::class, 'crear']);
$router->get('/garantia', [GarantiasController::class, 'garantia']);

//Api Para garantias
$router->get('/api/garantia', [GarantiaController::class, 'index']);
$router->post('/api/garantia', [GarantiaController::class, 'crear']);
$router->post('/api/garantia/actualizar', [GarantiaController::class, 'actualizar']);


//Comprobar las rutas
$router->comprobarRutas();