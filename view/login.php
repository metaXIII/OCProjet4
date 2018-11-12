<?php

$_SESSION['Auth'] = 0;
require "include/head.php";

use metaxiii\blog\Form;
use metaxiii\blog\UserDAO;

if (isset($_POST) && !empty($_POST)) {

    foreach ($_POST as $key => $value) {
        $_POST[$key] = strip_tags(htmlspecialchars($value));
    }
    $user = new UserDAO();
    $user->get($_POST);
}

$form = new Form();
?>


<div class="offset-lg-3 offset-2 col-lg-6 col-10 mt-5 bg-grey ml-auto mr-auto padding_login">
    <form action="" method="post">
        <?= $form->input("name"); ?>
        <?= $form->password("password"); ?>
        <?= $form->submit("Se connecter"); ?>
    </form>
</div>
<?php
require "include/footer.php";
?>
