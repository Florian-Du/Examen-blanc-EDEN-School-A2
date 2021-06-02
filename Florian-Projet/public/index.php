<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Livres\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "MainController@index");
$router->get('/index/', "MainController@index");

$router->post('/filtrage/', "MainController@filtre");

$router->post('/404/', "MainController@erreur");

$router->run();
