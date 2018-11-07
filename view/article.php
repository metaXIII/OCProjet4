<?php

use metaxiii\blog\ArticleDAO;

require "include/head.php";
$urlparse = explode('/',rtrim($_GET['url'], '/'));
$url = end($urlparse);

$list = new ArticleDAO();
$listAll = $list->get($url);

var_dump($listAll);
