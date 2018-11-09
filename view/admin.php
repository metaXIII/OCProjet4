<?php

use metaxiii\blog\CommentDAO;

require "include/head.php";
/**
 * Must return flash if needed
 */
checkComment();
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <a href="admin/article" class="custom-link-admin offset-2 col-4 bloc btn btn-primary">
            <span class="bloc-text">Articles</span>
        </a>
        <a href="admin/commentaires" class="custom-link-admin offset-2 col-4 bloc btn btn-primary">
            <span class="bloc-text">Commentaires</span>
        </a>
    </div>
</div>
