<?php
require_once '../include/fonction.php';
require '../include/basededonne.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
log_only();
/*
 * $slugsecu = 'mon-super-slug';

$q=$db->prepare('SELECT * FROM posts WHERE slug = :slug');
$q->execute(['slug' => $slugsecu]);
$post = $q->fetch();*/
$slugsecu = 'mon-super-slug';
$slugsecu_1 = 'php';
$slugsecu_2 = 'slug';

$q=$db->prepare('SELECT * FROM posts WHERE slug = :slug');
$q->execute(['slug' => $slugsecu]);
$post = $q->fetch();

$q=$db->prepare('SELECT * FROM posts WHERE slug = :slug');
$q->execute(['slug' => $slugsecu_1]);
$post_1 = $q->fetch();

$q=$db->prepare('SELECT * FROM posts WHERE slug = :slug');
$q->execute(['slug' => $slugsecu_2]);
$post_2 = $q->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIKINOV la platforme de l'innovation!">
    <meta name="author" content="GROUPE YNOV">
    <meta name="theme-color" content="#FF2C5A">
    <title>Acceuil | Wiki</title>
    <link rel="stylesheet" href="/site/boostrap/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />
    <!--
<link rel="stylesheet" href="./css/footer-distributed-with-address-and-phones.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="css/stylefooter.css">
-->
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
                <li class="active"><a href="">Home</a></li>
                <li><a href="../topic.php">Topic</a></li>
                <li><a href="chat.php">Chat Public</a></li>
                <li><a href="">Chat Privé</a></li>
                <li><a href="./account.php">Profil</a></li>
                <li><a href="modifprof.php">Modifier mes information</a></li>
                <li><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                <li><a href="../pages/logout.php">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/wiki/images/home/1.gif" alt="...">
            </a>
        </div><div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/wiki/images/home/1.gif" alt="...">
            </a>
        </div><div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/wiki/images/home/1.gif" alt="...">
            </a>
        </div><div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/wiki/images/home/1.gif" alt="...">
            </a>
        </div>
    </div>
    <br>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">14</span>
            Cras justo odio
        </li>
    </ul>
    <div class="panel panel-primary">
        <div class="panel-body">
            Sujet 1 :<a href="http://127.0.0.1/forum2/topic.php?p=posts.view&slug=mon-super-slug"><?= $post->name; ?></a>
        </div>
        <div class="panel-footer"><h2><?= $post->content; ?></h2></div>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">14</span>
            Cras justo odio
        </li>
    </ul>
    <div class="panel panel-success">
        <div class="panel-body">
            Sujet 2 :<a href="http://127.0.0.1/forum2/topic.php?p=posts.view&slug=php"><?= $post_1->name; ?></a>
        </div>
        <div class="panel-footer"><h2><?= $post_1->content; ?></h2></div>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">14</span>
            Cras justo odio
        </li>
    </ul>
    <div class="panel panel-success">
        <div class="panel-body">
            Sujet 3 :<a href="http://127.0.0.1/forum2/topic.php?p=posts.view&slug=slug"><?= $post_2->name; ?></a>
        </div>
        <div class="panel-footer"><h2><?= $post_2->content; ?></h2></div>
    </div>
</div>
<blockquote class="blockquote-reverse">
    <p>YNOV EST LE LEADER FRANÇAIS DES FORMATIONS AUX MÉTIERS DU NUMÉRIQUE.</p>
    <small>Groupe YNOV<cite title="Source Title">Source Title</cite></small>
</blockquote>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/wiki/js/bootstrap.min.js"></script>
<script src="../js/scrolling-nav.js"></script>
</body>
</html>
