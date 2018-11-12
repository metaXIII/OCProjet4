<?php

use metaxiii\blog\Article;
use metaxiii\blog\Comment;
use metaxiii\blog\CommentDAO;
use metaxiii\blog\Database;

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
        echo "<div class='col-12 border rounded bg-success p-4 m-2'>";
        echo "<a href='edit-article/{$el->getSlug()}' class='custom-link'><h3>{$el->getTitle()}</h3></a>";
        echo "<p>{$el->getContent()}</p>";
        echo "<div class='row'>";
        echo "<div class='col-6'>";
        echo "<a href='edit-article/{$el->getSlug()}' class='btn btn-primary'>Modifier l'article</a>";
        echo "<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>";
        echo "<a class='btn btn-danger' href='delete-{$el->getSlug()}'>Supprimer l'article</a>";
        echo "</div>";
        echo "<div class='col-6'>";
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
