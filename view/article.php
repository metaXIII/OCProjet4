<?php

use metaxiii\blog\ArticleDAO;
use metaxiii\blog\CommentDAO;
use metaxiii\blog\Form;

require "include/head.php";
$urlparse = explode('/', rtrim($_GET['url'], '/'));
$url = end($urlparse);

$list = new ArticleDAO();
$listAll = $list->get($url);

$form = new Form();
var_dump($listAll);

if (isset($_POST) && !empty($_POST)) {
    $action = new CommentDAO();
    $action->add($_POST);
}
?>

<div class="container mt-5 pt-5">
    <h1><?= $listAll['title'] ?></h1>
    <p><?= $listAll['content'] ?></p>
    <p class="text-right small">Publié le <?= $listAll['date'] ?></p>


    <h2>Commentaires</h2>
    <form action="#" method="post" class="col-6 m-auto">
        <?= $form->input("name") ?>
        <?= $form->textarea("commentaire"); ?>
        <?= $form->hidden($listAll['id']) ?>
        <?= $form->submit("Publier") ?>
    </form>
</div>


<?php require "include/footer.php" ?>
