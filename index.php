<?php
use metaxiii\blog\Autoloader;

require 'class/Database.php';
include 'lib/list.php';
require 'class/Autoloader.php';

Autoloader::register();


//$form = new Form();
//echo $form->input("aze");
//echo $form->input("aze");
//echo $form->submit();

require "lib/routes.php";
?>

<?php //include "lib/debug.php"; ?>
<?php //include "include/footer.php"; ?>
