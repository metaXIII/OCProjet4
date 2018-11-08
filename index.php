<?php
use metaxiii\blog\Autoloader;

require 'class/Database.php';
include 'lib/list.php';
require 'class/Autoloader.php';

Autoloader::register();

require "lib/routes.php";
?>

<?php //include "lib/debug.php"; ?>
<?php //include "include/footer.php"; ?>
