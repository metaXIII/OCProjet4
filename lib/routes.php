<?php

use metaxiii\blog\Router;

$router = new Router($_GET['url']);
$router->get('/', function () {
    include "view/accueil.php";
});
$router->get("/error", function () {
    include "view/error404.php";
});
$router->get('/login', function () {
    include "view/login.php";
});
$router->post('/login', function () {
    include "view/login.php";
});
$router->get('/:slug', function () {
    include ('view/article.php');
});

$router->run();
