<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog pour écrivain</title>
    <link rel="stylesheet" href="<?= ROOT ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ROOT ?>css/style.css" type="text/css">
</head>

<body>

<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= ROOT ?>">Accueil</a>

        <div class="navbar-collapse flex-row-reverse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <?= userIsConnected() ?
                        '<a class="nav-link" href="' . ROOT . 'admin">Espace d\'administration</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="'. ROOT .'logout">Se déconnecter</a>' :
                        '<a class="nav-link" href="'. ROOT .'login">Se connecter</a>';
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

<?= flash() ?>

