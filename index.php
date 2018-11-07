<?php

use metaxiii\blog\Autoloader;
use metaxiii\blog\Router;

include 'lib/list.php';
require 'class/Autoloader.php';

Autoloader::register();

$router = new Router($_GET['url']);

$router->get('/', function () {
    include "view/accueil.php";
});
$router->get('article/:slug', function () {
    include 'view/article.php';
});
$router->get('error', function () {
    include "view/error404.php";
});

$router->run();
?>

<?php //include "lib/debug.php"; ?>
<?php //include "include/footer.php";
//
//


//$router->get('/posts', function () {
//    echo "tous les articles";
//});
//$router->get('/404', function () {
//   echo "there was an error";
//});
//

//$form = new Form();
//echo $form->input("aze");
//echo $form->input("aze");
//echo $form->submit();
//
?>
