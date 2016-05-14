<?php
require_once '../include/fonction.php';
require '../include/flash.php';
require_once '../include/basededonne.php';
log_only();

error_reporting(E_ALL);
ini_set("display_errors", 1);

$req = $db->prepare('SELECT * FROM users WHERE id = :id');
$req->execute(['id' => $_SESSION['auth']->id]);
$user = $req->fetch();

if (!empty($_POST)) {
    $error_1 = array();

    $description_secu = htmlspecialchars($_POST['description_name']);
    $lienlinkdin = htmlspecialchars($_POST['lien_link']);
    $lientwitter = htmlspecialchars($_POST['lien_twitter']);

    $description_nombre = strlen($description_secu);
    $lienlinkdin_taille = strlen($lienlinkdin);
    $lientwitter_taille = strlen($lientwitter);

    if ($description_nombre > 255) {
        $error_1['taille_desc'] = "la description ne doit pas depassr 255";
    }

    if ($lienlinkdin_taille > 255) {
        $error_1['taille_linkdi'] = "le lien link ne doit pas depassr 255";
    }

    if ($lientwitter_taille > 255) {
        $error_1['taille_twitter'] = "le lien twitter ne doit pas depassr 255";
    }

    if (empty($error_1)) {

        if (!empty($_POST['mdp_old'])){
            if (password_verify($_POST['mdp_old'], $user->password)) {

                $user_id = $_SESSION['auth']->id;

                $reqq_5 = $db->prepare('UPDATE users SET desciption = ?, lienlinkdin = ?, linktiwtter = ? WHERE id = ?');
                $reqq_5->execute([$description_secu, $lienlinkdin, $lientwitter, $user_id]);
                $_SESSION['flash4']['success'] = "Profil bien update ma gueule";
                header('Location: /wiki/pages/modifprof.php');
                $_SESSION['auth'] = array();
                $_SESSION['auth'] = $user;
            } else {
                $_SESSION['flash4']['danger'] = "Mauvais mot de passe mec";
            }
        }

    }
}
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
                    <li><a href="./account.php">Profil</a></li>
                    <li class="active"><a href="modifprof.php">Modifier mes information</a></li>
                    <li><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                    <li><a href="../pages/logout.php">Deconnexion</a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/wiki/img_avatar/newup/<?= $user->avatar; ?>" class="classdecentragelol avatartaille" alt="">
            <h1 class="classdecentragelol">Pseudo : <?= $user->username; ?></h1>
            <h1 class="classdecentragelol">Nom : <?= $user->nom; ?></h1>
            <h1 class="classdecentragelol">Prénom : <?= $user->prenom; ?></h1>
            <h1 class="classdecentragelol">Mail: <?= $user->email; ?></h1>
            <h1 class="classdecentragelol">Date de validation: <?= $user->confirmed_at; ?></h1>
            <h1 class="classdecentragelol">Description : <br><?= $user->desciption; ?></h1>
            <h1 class="classdecentragelol">Lien Linkdin: <a href="<?= $user->lienlinkdin; ?>" target="_blank">Linkedin</a></h1>
            <h1 class="classdecentragelol">Lien twitter: <a href="<?=  $user->linktiwtter; ?>" target="_blank">Twitter</a></h1>
        </div>
        <div class="col-md-6">

            <?php require "../include/flash.php"; ?>
            <?php if(!empty($error_1)):?>

                <div class="alert alert-danger">
                    <p>Vous n'avez pas remplis les formulaire correctement</p>
                    <p>-----------------------------------------------------</p>
                    <ul>
                        <?php foreach($error_1 as $err): ?>
                            <li class="classdecentragelol"><?= $err; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>

            <br>
            <div class="form-group">
                <label for="label_nom">Nom</label>
                <input readonly id="label_nom" type="text" name="username" class="form-control" value="<?= $user->nom; ?>" />
            </div>

            <div class="form-group">
                <label for="label_prenom">Prénom</label>
                <input readonly id="label_prenom" type="text" name="" class="form-control" value="<?= $user->prenom; ?>"/>
            </div>

            <div class="form-group">
                <label for="label_email">Email</label>
                <input readonly id="label_email" type="email" name="" class="form-control" value="<?= $user->email; ?>"/>
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="comment">Description* : (255 caractères maximum)</label>
                    <textarea class="form-control" rows="5" id="comment" name="description_name"><?= $user->desciption; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Lien Linkdin</label>
                    <input id="label_email" type="text" name="lien_link" class="form-control" placeholder="https://fr.linkedin.com/nom_dutilisateur" value="<?= $user->lienlinkdin; ?>"/>
                </div>

                <div class="form-group">
                    <label for="">Lien Twitter</label>
                    <input id="label_email" type="text" name="lien_twitter" class="form-control" placeholder="https://twitter.com/nom_dutilisateur" value="<?=  $user->linktiwtter; ?>"/>
                </div>

                <label for="avatar">Icône du fichier (JPG, PNG , GIF ou BMP | max. 25 Mo) :</label><br />
                <input type="file" name="avatar" id="avatar" class="classdecentragelol"/>

                <div class="form-group">
                    <label for="">Ancien mot de passe</label>
                    <input id="label_email" type="text" name="mdp_old" class="form-control" value=""/>
                </div>
        </div>

        <button type="submit" class="btn btn-primary classdecentragelol">Enregistrer</button>
        <br>
        <br>
        <br>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
</body>
</html>