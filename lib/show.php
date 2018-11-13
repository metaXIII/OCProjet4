<?php

use metaxiii\blog\Article;
use metaxiii\blog\ArticleDAO;
use metaxiii\blog\Comment;
use metaxiii\blog\CommentDAO;
use metaxiii\blog\Database;
use metaxiii\blog\UserDAO;

function showAll($list)
{
    foreach ($list as $el) {
        $el = new Article($el);
        echo "<div class='col-12 bg-grey border rounded p-4 m-2'>";
        echo "<a href='{$el->getSlug()}' class='custom-link'><h3>{$el->getTitle()}</h3></a>";
        echo "<p>{$el->getContent()}</p>";
        echo "<div class='row'>";
        echo "<div class='col-6'>";
        echo "<a href='{$el->getSlug()}' class='btn btn-primary'>Lire l'article</a>";
        echo "</div>";
        echo "<div class='col-6'>";
        echo "<p class='text-right font-italic small red'>{$el->getDate()}</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}

function showAllAdmin($list)
{
    foreach ($list as $el) {
        $el = new Article($el);
        echo "<div class='col-12 border bg-grey rounded p-4 m-2'>";
        echo "<a href='edit-article/{$el->getSlug()}' class='custom-link'><h3>{$el->getTitle()}</h3></a>";
        echo "<p>{$el->getContent()}</p>";
        echo "<div class='row'>";
        echo "<div class='col-lg-6'>";
        echo "<a href='edit-article/{$el->getSlug()}' class='btn btn-success'>Modifier l'article</a>";
        echo "<a class='btn btn-danger' href='delete-{$el->getSlug()}'>Supprimer l'article</a>";
        echo "</div>";
        echo "<div class='col-lg-6'>";
        echo "<p class='text-right font-italic small red'>{$el->getDate()}</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}

function showCommentAllowed($data)
{
    foreach ($data as $el) {
        $el = new Comment($el);
        echo "<div class='bg-grey border rounded p-2 mt-2'>";
        echo "<p class='big font-weight-bold'>{$el->getUser()}</p>";
        echo "<p>{$el->getContent()}</p>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' value='{$el->getId()}' name='delete'>";
        echo "<button type='submit' class='btn btn-danger'>Signaler la publication</button>";
        echo "</form>";
        echo "</div>";
    }
}

function showCommentReported($list)
{
    if ($list) {
        foreach ($list as $el) {
            $el = new Comment($el);
            echo "<div class='col-12 border bg-grey rounded m-2 p-3'>";
            echo "<p class='big font-weight-bold'>{$el->getUser()}</p>";
            echo "<p>{$el->getContent()}</p>";
            echo "<a class='btn btn-danger' href='delete-comment-{$el->getId()}'>Supprimer</a>";
            echo "<a class='btn btn-primary' href='delete-comment-abort-{$el->getId()}'>Valider</a>";
            echo "</div>";
        }
    } else {
        echo "<p class='big red'>Vous n'avez aucun commentaire signalé</p>";
    }
}

function checkPostArticle()
{
    if (isset($_POST) && !empty($_POST)) {
        $action = new ArticleDAO();
        if (isset($_POST['url'])) {
            $action->update($_POST);
        } else {
            if ($_POST['Titre'] && $_POST['adminTextarea'] && !isset($_POST['url'])
                && !empty($_POST['Titre']) && !empty($_POST['adminTextarea'])) {
                $action->add($_POST);
                setFlash("L'article a bien été ajouté", "success");
                header("Location:" . ROOT . "admin");
                die();
            } else {
                setFlash("Il y a eu une erreur, des champs n'ont peut être pas été remplis ", "danger");
                header("location:" . ROOT . "admin/edit-article/");
                die();
            }
        }
    }
}

function checkPostComment()
{
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
}

function checkPostUser()
{
    if (isset($_POST) && !empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = strip_tags(htmlspecialchars($value));
        }
        $user = new UserDAO();
        $user->get($_POST);
    }
}
