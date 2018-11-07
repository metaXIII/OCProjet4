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

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= ROOT ?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <?= isset($_SESSION['user']) ?
                        '<a class="nav-link" href="login">Se déconnecter</a>' :
                        '<a class="nav-link" href="login">Se connecter</a>';
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

