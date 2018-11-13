<?php

use metaxiii\blog\CommentDAO;

$list = new CommentDAO();
$listAll = $list->getReportComment();
require "include/head.php";
?>
    <main role="main" class="main">
        <div class="row">
            <div class="col-12 padding_comment">
                <h1>Gestion des commentaires</h1>
                <?php
                showCommentReported($listAll);
                ?>
            </div>
        </div>
    </main>
<?php
require "include/footer.php";
