<?php

use metaxiii\blog\CommentDAO;

session_start();

function flash () {
    if (isset($_SESSION['Flash'])) {
        extract($_SESSION['Flash']);
        unset($_SESSION['Flash']);
        return "<div class='col-10 m-auto alert alert-$type'>$message</div>";
    }
}

function setFlash($message, $type = 'success') {
    $_SESSION['Flash']['message'] = $message;
    $_SESSION['Flash']['type'] = $type;
}

function checkComment() {
    $comment = new CommentDAO();
    $comment = $comment->checkComment();
    if ($comment > 1)
        echo "<div class='toHide col-10 m-auto alert alert-danger'>Vous avez des commentaires à modérer</div>";
    else if ($comment === 1)
        echo "<div class='toHide col-10 m-auto alert alert-danger'>Vous avez un commentaire à modérer</div>";
    else
        echo "<div class='toHide col-10 m-auto alert alert-success'>Aucun commentaire à modérer</div>";
}

function userIsConnected () {
    return isset($_SESSION['Auth']) && $_SESSION['Auth'];
}
