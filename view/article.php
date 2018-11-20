<?php

use metaxiii\blog\ArticleDAO;
use metaxiii\blog\CommentDAO;
use metaxiii\blog\Form;

$urlparse = explode('/', rtrim($_GET['url'], '/'));
$url = end($urlparse);

$list = new ArticleDAO();
$listAll = $list->get($url);
$listComment = new CommentDAO();
$listAllComment = $listComment->getComment($listAll['id']);

$form = new Form();

checkPostComment();
require "include/head.php";

?>
<div class="container mt-5 pt-2">
    <div>
        <h1><?= $listAll['title'] ?></h1>
        <p><?= $listAll['content'] ?></p>
        <p class="text-right small">Publié le <?= $listAll['date'] ?></p>
    </div>
    <h2>Commentaires :</h2>
    <?php showCommentAllowed($listAllComment) ?>
    <form action="#" method="post">
        <?= $form->input("name") ?>
        <?= $form->textarea("commentaire"); ?>
        <?= $form->hidden($listAll['id']) ?>
        <?= $form->submit("Publier") ?>
    </form>
</div>


<?php
require "include/footer.php";
