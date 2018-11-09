<?php

use metaxiii\blog\ArticleDAO;
use metaxiii\blog\Form;

include "include/head.php";

if (isset($_POST) && !empty($_POST)) {
    var_dump($_POST);
    $action = new ArticleDAO();
    if (isset($_POST['url'])) {
        $action->update($_POST);
    } else {
        if ($_POST['Titre'] && $_POST['adminTextarea'] && !isset($_POST['url'])) {
            $action->add($_POST);
        }
    }
}


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

