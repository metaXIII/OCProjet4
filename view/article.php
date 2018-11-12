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

if (isset($_POST) && !empty($_POST)) {
    //Suppression de commentaire
    $action = new CommentDAO();
    if (isset($_POST['delete'])) {
        $action->report($_POST['delete']);
        unset($_POST);
        setFlash("Le message a bien été signalé, merci !", "danger");
        header("location:" . ROOT . $_GET['url']);
        die();
    } else {
        $action->add($_POST);
        unset($_POST);
        setFlash("Le message a bien été ajouté, merci !", "success");
        header("location:" . ROOT . $_GET['url']);
        die();
    }
}
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


<?php require "include/footer.php" ?>
