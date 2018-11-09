<?php

use metaxiii\blog\Article;

function showAll($list)
{
    foreach ($list as $el) {
        $el = new Article($el);
        echo "<div class='col-12 border rounded bg-success p-4 m-2'>";
        echo "<a href='{$el->getSlug()}' class='custom-link'><h3>{$el->getTitle()}</h3></a>";
        echo "<a href='{$el->getSlug()}' class='custom-link'><p>{$el->getContent()}</p></a>";
        echo "<div class='row'>";
        echo "<div class='col-6'>";
        echo "<a href='{$el->getSlug()}' class='custom-link text-white'>
                <button class='btn btn-primary'>Lire l'article</button>
                </a>";
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
        echo "<a href='edit-article/{$el->getSlug()}' class='custom-link'><p>{$el->getContent()}</p></a>";
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
