<?php

use metaxiii\blog\ArticleDAO;
$list = new ArticleDAO();
$listAll = $list->getAll();


require "include/head.php";
?>

<main role="main" class="main">
    <div class="row">
        <div class="col-12 bg-secondary p-4">
            <h1>Gestion des articles</h1>
            <a href="edit-article/" class="btn btn-primary">Ajouter un article</a>
            <?php
                showAllAdmin($listAll);
            ?>
        </div>
    </div>
</main>
