<?php

use metaxiii\blog\CommentDAO;

$deleteSlug = explode('/', $_GET['url']);
$deleteSlug = (str_replace("delete-comment-", "", $deleteSlug[1]));

$delete = new CommentDAO();
if (strpos($deleteSlug, "abort") !== false) {
    $deleteSlug = str_replace("abort-", "", $deleteSlug);
    $delete->rehabilited($deleteSlug);
} else {
    $delete->delete($deleteSlug);
}
