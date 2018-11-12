<?php

use metaxiii\blog\ArticleDAO;
use metaxiii\blog\Form;

include "include/head.php";

checkPostArticle();


$url = $_GET['url'];
if ($url === "admin/edit-article/") {
    $form = new Form();
    echo "<form action='#' method='post' class='col-8 m-auto'>";
    echo $form->input("Titre");
    echo $form->textarea("adminTextarea");
    echo $form->submit("Créer l'article");
    echo "</form>";
} else {
    $url = str_replace("admin/edit-article/", '', $url);
    $article = new ArticleDAO();
    $result = $article->get($url);
    $form = new Form();
    echo "<form action='#' method='post' class='col-8 m-auto'>";
    echo $form->input("Titre", $result['title']);
    echo $form->textarea("adminTextarea", $result['content']);
    echo $form->hidden($url);
    echo $form->submit("Modifier l'article");
    echo "</form>";
}
?>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=h255kxsxrmcj12dy73l52tggv8oddf006x3ee8y9pjtph0kc"></script>
    <script>
        tinymce.init({
            selector: '#adminTextarea'
        })
    </script>

<?php
require "include/footer.php";
