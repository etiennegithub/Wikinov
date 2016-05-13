<?php
require '../include/fonction.php';
require_once '../include/basededonne.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
log_only();

/*
 * si post n'existe pas et qu'il est vide
 * non
 * sinon
 * bad
 *
 * readonly
 * information vue par tout le monde
 * avatar pero
 *
 * */

if(!empty($_POST)){
    $errormodif = array();
    /*
     * $mdp = htmlspecialchars($_POST['password_anc']);
     *Toujours la meme question pour le verification du mot de passe avec password_verify
     */
    $mdpmodifn = htmlspecialchars($_POST['password']);
    $mdpmodifn2 = htmlspecialchars($_POST['password_confirm']);
    $mdptaille = strlen($_POST['password']);

    $reqq = $db->prepare('SELECT * FROM users WHERE id = :id');
    $reqq ->execute(['id' => $_SESSION['auth']->id]);
    $userr = $reqq->fetch();

    if(password_verify($_POST['password_anc'],$userr->password)){
        if($mdptaille > 8){
            $mdpsec2 =strlen($_POST['password']);
            if ($_POST['password'] != $_POST['password_confirm']){
                $_SESSION['flash']['danger'] = "Les mot de passes ne correspondent pas";
            }else if ($_POST['password'] = $_POST['password_confirm']){
                $user_id = $_SESSION['auth']->id;
                $passwordnew = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $db->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$passwordnew, $user_id]);
                $_SESSION['flash']['success'] = "Le mot de passe a été mise a jour";
            }

        }else{
            $errormodif['password'] = "Le mot de passe doit faire au moins 9 caractére";
        }
    }else{
        $errormodif['ancienpassword'] = "L'ancien mot de passe ne corrspond pas";
    }
}
?>

<!--

Possibilité de changer le pseudo le mail etc...
Nom Statut Numéro de télephonelocalisation date d'anniversaire
Hommes ou femmes age nationalité taille religion Courriel lien célibataire"

Information vue par tout le monde
Information qu'il est possible de modifié

-->
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
            <a class="navbar-brand" href="">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="">Topic</a></li>
                <li><a href="chat.php">Chat Public</a></li>
                <li><a href="">Chat Privé</a></li>
                <li><a href="account.php">Profil</a></li>
                <li><a href="modifprof.php">Modifier mes information</a></li>
                <li class="active"><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                <li><a href="../pages/logout.php">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<?php require "../include/flash.php"; ?>
<div class="container">
    <br>
    <?php if(!empty($errormodif)):?>

        <div class="alert alert-danger">
            <p>Vous n'avez pas remplis le formulaire correctement</p>
            <ul>
                <?php foreach($errormodif as $err): ?>
                    <li><?= $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php endif; ?>
    <form action="" method="post">
        <label for="Ancienmdp">Ancien mot de passe</label>
        <div class="form-group">
            <input class ="form-control" id="Ancienmdp" type="password" name="password_anc" placeholder="Ancien mot de passe"/>
        </div>

        <label for="newmdp">Nouveau mot de passe</label>
        <div class="form-group">
            <input class ="form-control" id="newmdp" type="password" name="password" placeholder="Changer de mot de passe"/>
        </div>

        <label for="confirmnewmdp">Confirmation du nouveau mot de passe</label>
        <div class="form-group">
            <input class="form-control" id="confirmnewmdp" type="password" name="password_confirm" placeholder="Confrimation du mot de passe">
        </div>
        <button class="btn btn-primary classdecentragelol">Changer mot de passe</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/wiki/js/bootstrap.min.js"></script>
</body>
</html>