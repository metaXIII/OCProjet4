<?php

require "include/head.php";
checkComment();
?>

    <div class="container mt-5 pt-5">
        <div class="row">
            <a href="admin/article" class="col-lg-4 col-10 offset-1 offset-lg-0 bloc btn btn-primary mb-1">
                <span class="bloc-text">Articles</span>
            </a>
            <a href="admin/commentaires" class="offset-lg-4 col-lg-4 col-10 offset-1 bloc btn btn-primary">
                <span class="bloc-text">Commentaires</span>
            </a>
        </div>
    </div>

<?php
require "include/footer.php";
