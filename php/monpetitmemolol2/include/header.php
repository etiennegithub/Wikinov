<?php
require_once 'fonction.php';
dem_session();
/*
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="/forum2/avatar/1.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forum</title>
    <link rel="stylesheet" href="css/boostrapcyborg.css">
    <!--
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
    -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Forum</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['auth'])): ?>
                    <li>
                        <a href="../forum2/account.php">Mon compte</a>
                    </li>
                    <!--
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    -->
                    <li><a href="messpriv.php">Message privé</a></li>
                    <li><a href="infopublic.php">Mes Infromation public</a></li>
                    <li><a href="motdepasse.php">Mot de passe</a></li>
                    <li><a href="logout.php">Deconnexion</a></li>
                <?php else: ?>
                    <li><a href="register.php">Inscription</a></li>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Bienvenue sur le Forum</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <?php if(isset($_SESSION['auth'])): ?>
                <p>Vous êtes bien connecté</p>
            <?php else: ?>
                <p><a class="btn btn-primary btn-lg" href="/forum2/login.php" role="button">Connecte vous pour publié un commentaire &raquo;</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['flash'])):?>

    <?php foreach($_SESSION['flash'] as $type => $message):?>
        <div class="container">
            <div class="alert alert-<?= $type; ?>">

                <?= $message; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash"]); ?>

<?php endif; ?>

<?php if(isset($_SESSION['flash2'])):?>

    <?php foreach($_SESSION['flash2'] as $type => $message2):?>
        <div class="container">
            <div class="alert alert-<?= $type; ?>">

                <?= $message2; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash2"]); ?>
<?php endif; ?>
