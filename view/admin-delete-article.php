<?php

use metaxiii\blog\ArticleDAO;

$deleteSlug = explode('/', $_GET['url']);
$deleteSlug = (str_replace("delete-", "", $deleteSlug[1]));

$delete = new ArticleDAO();
$delete->delete($deleteSlug);
