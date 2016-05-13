<?php
require_once '../include/fonction.php';
require_once '../include/basededonne.php';
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
log_only();
*/

$getpseudo = "admin";
if (isset($_GET['pseudo'])){

    $getpseudo_1 = htmlspecialchars($_GET['pseudo']);

    $req = $db->prepare('SELECT * FROM users WHERE username = :pseudo');
    $req->execute(['pseudo' => $getpseudo_1]);
    $user_1 = $req->fetch();

    $verif_username = $user_1->username;

    if ($getpseudo_1 = $verif_username) {

        $getpseudo = htmlspecialchars($_GET['pseudo']);
    }else{
        $getpseudo = "admin";
    }

}

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
$req = $db->prepare('SELECT * FROM users WHERE username = :pseudo');
$req->execute(['pseudo' => $getpseudo]);
$user = $req->fetch();
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
    <title>Profil de <?= $user->username ?></title>
    <link rel="stylesheet" href="../css/boostrap/bootswatch/bootstrap.min.css">
    <!--
    <link rel="stylesheet" href="./css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="css/stylefooter.css">
    -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />
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
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="">Topic</a></li>
                    <li><a href="chat.php">Chat Public</a></li>
                    <li><a href="">Chat Privé</a></li>
                    <li><a href="./account.php">Profil</a></li>
                    <li><a href="modifprof.php">Modifier mes information</a></li>
                    <li><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                    <li><a href="../pages/logout.php">Deconnexion</a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<?php require "../include/cookie.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/wiki/img_avatar/newup/<?= $user->avatar?>" class="classdecentragelol avatartaille" alt="">
            <h1 class="classdecentragelol">Pseudo :<?= $user->username ?></h1>
            <h1 class="classdecentragelol">Nom :<?= $user->nom ?></h1>
            <h1 class="classdecentragelol">Prénom :<?= $user->prenom ?></h1>
            <h1 class="classdecentragelol">Mail: <?= $user->email ?></h1>
            <h1 class="classdecentragelol">Date de validation <?= $user->confirmed_at ?></h1>
            <h1 class="classdecentragelol">Description : <br><?= $user->desciption ?></h1>
            <h1 class="classdecentragelol">Lien Linkdin: <a href="" target="_blank">Linkedin</a></h1>
            <h1 class="classdecentragelol">Lien twitter: <a href="" target="_blank">Twitter</a></h1>
        </div>
        <div class="col-md-6">
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Article crée</div>
                <div class="panel-body">
                    <p class="classdecentragelol">Web</p>
                    <a href="" class="classdecentragelol">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la</a>
                    <br>
                    <p class="classdecentragelol">Web</p>
                    <a href="" class="classdecentragelol">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la</a>
                    <br>
                    <p class="classdecentragelol">Web</p>
                    <a href="" class="classdecentragelol">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la</a>
                    <br>
                    <a href="" class="classdecentragelol">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la</a>
                </div>
                <div class="panel-footer classdecentragelol">~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
</body>
</html>