<?php
use metaxiii\blog\Autoloader;
use metaxiii\blog\Database;
use metaxiii\blog\Router;

require 'class/Database.php';
include 'lib/list.php';
require 'class/Autoloader.php';

Autoloader::register();


//$form = new Form();
//echo $form->input("aze");
//echo $form->input("aze");
//echo $form->submit();

$router = new Router($_GET['url']);
$router->get('/', function () {
    include "view/accueil.php";
});
$router->get("/error", function () {
   include "view/error404.php";
});
$router->get('/login', function () {
    include "view/login.php";
});
$router->get('/:slug', function () {
    include ('view/article.php');
});

//$router->get('/posts', function () {
//    echo "tous les articles";
//});
//$router->get('/404', function () {
//   echo "there was an error";
//});
//
$router->run();
?>

<?php //include "lib/debug.php"; ?>
<?php //include "include/footer.php"; ?>
