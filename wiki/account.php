<?php
require_once 'include/fonction.php';

log_only();
/*
 *
 *On inclue le header et le footer
 *On fait appel a la fontion qui autorise l'acces a une page
 *On afficher les information de l'utilisateur que l'on veux bien affiché
 *Readonly
 *Information vue par tout le monde
 *Avatar pero
 *On inclue le footer
 *
 *
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIKINOV la platforme de l'innovation!">
    <meta name="author" content="GROUPE YNOV">
    <meta name="theme-color" content="##FF2C5A">
    <title>Mon compte</title>
    <link rel="stylesheet" href="./css/boostrap/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
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
            <a class="navbar-brand" href="">Project name</a>
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
                    <li><a href="./account.php">Profil</a></li>
                    <li><a href="./pages/logout.php">Deconnexion</a></li>
                <?php else: ?>
                    <li><a href="./pages/login.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php require 'include/flash.php'; ?>
<div class="container">
    <h1>Bonjour <?= $_SESSION['auth']->username ?></h1>
    <h1>Votre ID : <?= $_SESSION['auth']->id ?></h1>
    <h1>Mail: <?= $_SESSION['auth']->email ?></h1>
    <h1>Date de validation <?= $_SESSION['auth']->confirmed_at ?></h1>
</div>
<?php require "./include/footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
</body>
</html>