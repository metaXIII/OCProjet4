<?php

use metaxiii\blog\ArticleDAO;

require "include/head.php";

$list = new ArticleDAO();
$listAll = $list->getAll();
?>

    <main role="main" class="main">
        <div class="row">
            <div class="col-lg-8 p-4">
                <h1>Derniers articles</h1>
                <?php
                showAll($listAll);
                ?>
            </div>
            <div class="col-lg-4 p-4 text-center">
                <h2>Qui suis-je ?</h2>
                <img src="public/image/profil.jpg" alt="ma photo de profil" class="profil_image">
                <p class="font-weight-bold">Acteur et écrivain, née le 16 novembre 1990</p>
                <p>Message de l'auteur du site :</p>
                <p class="bg-grey font-italic p-2 border rounded">
                    Bonjour ! <br>
                    Merci à tous mes lecteurs de visiter mon site, vous trouverez sur celui-ci en avant première les
                    chapitres à paraitre dans mon prochain roman "Billet simple pour l'Alaska". <br>
                    Ce site a vocation à remercier tous mes lecteurs pour leur fidélité et récolter vos impressions sur
                    ce
                    futur projet, page après page, chapitre après chapitre. <br>
                    N'hésitez pas à y laisser vos impressions dans les pages concernées !
                    <br>
                    Merci pour votre soutien !
                </p>
            </div>
        </div>
    </main>

<?php require "include/footer.php";


