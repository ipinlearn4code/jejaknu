<?php

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\RESTful\ResourceController;
// use App\Controllers\FrontController;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'FrontController::dashboard');


$routes->get('/daftarkader', 'FrontController::daftarkader');

$routes->get('/eventRutin', 'FrontController::eventRutin');
$routes->get('/eventSpesial', 'FrontController::eventSpesial');

$routes->get('/news', 'FrontController::news');
$routes->get('/artikel', 'FrontController::artikel');


$routes->get('/session-debug', 'AuthController::sessionDebug');
$routes->post('/registerProcess', 'AuthController::registerProcess');
$routes->post('/loginProcess', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// Route admin (cek role)
$routes->get('/datakader', 'AdminController::datakader', ['filter' => 'authAdmin']);
$routes->get('/dataeventspesial', 'AdminController::dataeventspesial');
$routes->get('/dataeventrutin', 'AdminController::dataeventrutin');
$routes->get('/datanews', 'AdminController::datanews');
$routes->get('/dataartikel', 'AdminController::dataartikel');


$routes->resource('cadre', ['controller' => 'CadreProfileController']);
$routes->resource('posts', [
    'controller' => 'PostController',
    // 'map' => [
    //     'myCustomAction' => 'myCustomAction'
    // ]
]);




