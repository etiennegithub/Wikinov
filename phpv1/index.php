<?php
require_once 'include/fonction.php';

cookie_token();

log_re();

$pseudo = htmlspecialchars($_POST['username']);
/*
 *
 * $mdppswd = htmlspecialchars($_POST['password']);
 * Nornamlement on n'a pas bessoin de sécurisé
 * l'entrer vue qu'on utilise une fonction de php
 * password_verify
 *
 * */
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'include/basededonne.php';
    $req = $db->prepare('SELECT * FROM users WHERE (username = :username OR email = :username)');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION ['flash']['success']= "Vous etes maintenant connécté";
        if($_POST['remember']){
            $cookie_token = str_random(250);
            $db->prepare('UPDATE users SET cookie_token = ? WHERE id = ?')->execute([$cookie_token, $user->id]);
            setcookie('cookie', $user->id . '==' . $cookie_token . sha1($user->id .'pffaucuneeideedecle'), time() + 60 * 60 * 24 *7);
        }
        header('Location: account.php');
        exit();
    }else{
        $_SESSION['flash']['danger']= 'Identificant ou mot de passe incorrect!<br>Veuillez verifier que votre email se termine bien par @ynov.com';
    }
}else{
    $_SESSION['flash']['info']= 'Seule les étudiant d\'YNOV on le droit de se connecter <br> Veuillez remplir correctement tous cahmps complet ! <br>';
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
        <title>Wikinov | Connexion</title>
        <link rel="stylesheet" href="./css/boostrap/bootswatch/bootstrap.min.css">
        <link rel="stylesheet" href="./css/footer-distributed-with-address-and-phones.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/stylefooter.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
        <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
        <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />

        <!--
<link rel="stylesheet" href="../css/style.css">
-->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->
    </head>

    <body>
        <div class="container">
            <img src="./images/wiki.png" alt="logo wiki" title="Logo wiki" class="animated jello img-responsive logowiki">
            <img src="./images/logo.jpg" alt="Logo ynov" title="Logo ynov" class="animated jello img-responsive logoynov">
            <?php require "include/flash.php"; ?>
            <form action="" method="POST">
                <br>
                <div class="container">
                    <div class="form-group">
                        <label for="pseudo_label">Pseudo ou email</label>
                        <input id="pseudo_label" type="text" name="username" class="form-control" value="<?= (!empty($pseudo))?$pseudo:'' ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="motdepasse_label">Mot de passe <a href="pages/forget.php">(Mot de passe oublié)</a></label>
                        <input id="motdepasse_label" type="password" name="password" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="remember" value="1"> Se seouvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary classdecentragelol">Se connecter</button>
                </div>
                <!--<input type="text" name="username" class ="form-control" required/> Pour forcer l'entrer des valeur-->
            </form>
            <br>
        </div>
        <?php require "./include/footer.php"?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/jquery.easing.min.js"></script>
        <script src="js/konami.js"></script>
    </body>
</html>

