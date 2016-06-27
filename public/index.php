<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/setup.php';

use Nourhan\Controllers;
use Nourhan\Router;

$router = new Router\Router();

$router->get('/', 'MainController', 'home');
$router->get('/admin', 'MainController', 'admin');
$router->post('/admin', 'MainController', 'upload');

////See inside $router
//echo "<pre>";
//print_r($router);

$router->submit();


