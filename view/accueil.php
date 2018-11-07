<?php

use metaxiii\blog\ArticleDAO;

require "include/head.php";

$list = new ArticleDAO();
$listAll = $list->getAll();
?>

<main role="main" class="main">
    <div class="row">
        <div class="col-8 bg-secondary p-4">
            <h1>Derniers articles</h1>
            <?php
                showAll($listAll);
            ?>
        </div>
        <div class="col-4 bg-danger p-4">
            <h2>Qui suis-je ?</h2>
        </div>
    </div>
</main>


