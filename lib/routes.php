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
$router->get('/logout', function () {
    include "view/logout.php";
});
$router->post('/login', function () {
    include "view/login.php";
});
$router->get('/admin', function () {
    include "view/admin.php";
});
$router->get('/admin/article', function () {
    include "view/admin-article.php";
});
$router->get('/admin/edit-article/', function () {
    include "view/admin-edit-article.php";
});
$router->get('/admin/edit-article/:slug', function () {
    include "view/admin-edit-article.php";
});
$router->post('/admin/edit-article/', function () {
    include "view/admin-edit-article.php";
});
$router->post('/admin/edit-article/:slug', function () {
    include "view/admin-edit-article.php";
});
$router->get('/admin/delete-comment-:slug', function () {
    include "view/admin-delete-comment.php";
});
$router->get('/admin/delete-:slug', function () {
    include "view/admin-delete-article.php";
});
$router->get('/admin/commentaires', function () {
    include "view/admin-comment.php";
});
$router->get('/:slug', function () {
    include('view/article.php');
});
$router->post('/:slug', function () {
    include('view/article.php');
});


$router->run();
