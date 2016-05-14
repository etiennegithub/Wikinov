<?php
require_once '../include/fonction.php';
require_once '../include/basededonne.php';
log_only();
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);

*/
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
$req = $db->prepare('SELECT * FROM users WHERE id = :id');
$req->execute(['id' => $_SESSION['auth']->id]);
$user = $req->fetch();

$_SESSION['auth'] = array();
$_SESSION['auth'] = $user;
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
    <title>Profil de <?= $_SESSION['auth']->username ?></title>
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
            <a class="navbar-brand" href="">Wikinov</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="">Topic</a></li>
                    <li><a href="chat.php">Chat Public</a></li>
                    <li><a href="">Chat Privé</a></li>
                    <li class="active"><a href="./account.php">Profil</a></li>
                    <li><a href="modifprof.php">Modifier mes information</a></li>
                    <li><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                    <li><a href="../pages/logout.php">Deconnexion</a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<?php require "../include/cookie.php"; ?>
<?php
require '../include/flash.php';
/*
 * trouver un autre moyen lol
 * */
require_once '../include/basededonne.php';
$req_1 = $db->prepare('SELECT avatar FROM users WHERE id = ?');
$req_1->execute([$_SESSION['auth']->id]);
$avatar_1 = $req_1->fetch();
$avatar_name_file = $avatar_1->avatar;
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/wiki/img_avatar/newup/<?= $avatar_name_file ?>" class="classdecentragelol avatartaille" alt="">
            <?php
            $monfichier = fopen('compteur.txt', 'r+');
            $pages_vues = fgets($monfichier);
            $pages_vues += 1; // On augmente de 1 ce nombre de pages vues
            fseek($monfichier, 0); // On remet le curseur au début du fichier
            fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
            fclose($monfichier);
            echo '<p class="classdecentragelol">Cet profil a été vue ' . $pages_vues . ' fois !</p>';
            fclose($monfichier);
            ?>
            <h1 class="classdecentragelol">Pseudo :<?= $_SESSION['auth']->username ?></h1>
            <h1 class="classdecentragelol">Nom :<?= $_SESSION['auth']->nom ?></h1>
            <h1 class="classdecentragelol">Prénom :<?= $_SESSION['auth']->prenom ?></h1>
            <h1 class="classdecentragelol">Mail: <?= $_SESSION['auth']->email ?></h1>
            <h1 class="classdecentragelol">Date de validation <?= $_SESSION['auth']->confirmed_at ?></h1>
            <h1 class="classdecentragelol">Description : <br><?= $_SESSION['auth']->desciption ?></h1>
            <h1 class="classdecentragelol">Lien Linkdin: <a href="<?= $_SESSION['auth']->desciption ?>" target="_blank">Linkedin</a></h1>
            <h1 class="classdecentragelol">Lien twitter: <a href="<?= $_SESSION['auth']->desciption ?>" target="_blank">Twitter</a></h1>
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
