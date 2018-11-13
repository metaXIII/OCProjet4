<?php

use metaxiii\blog\Form;

$_SESSION['Auth'] = 0;
checkPostUser();
$form = new Form();
require "include/head.php";


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
