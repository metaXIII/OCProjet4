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


//$db = Database::getPdo();
//$request = "SELECT * from article";
//$result = $db->query($request);

//var_dump($result->fetch());
//
$router = new Router($_GET['url']);
$router->get('/', function () {
    include "view/accueil.php";
});
$router->get('/:slug', function ($slug) {
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
