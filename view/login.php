<?php
require "include/head.php";

use metaxiii\blog\Form;
if (isset($_POST) && !empty($_POST)){
    var_dump($_POST);
}

$form = new Form();
?>


    <div class="offset-lg-3 offset-2 col-lg-6 col-10 mt-5 bg-grey ml-auto mr-auto p-5">
        <form action="#" method="post">
            <?= $form->input("name"); ?>
            <?= $form->password("password"); ?>
            <?= $form->submit(); ?>
        </form>
    </div>

<?php require "include/footer.php";
