<?php
require_once '../include/fonction.php';
require_once '../include/basededonne.php';
log_only();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if(isset($_POST['message'])AND !empty($_POST['message']))

{
    $pseudo = $_SESSION['auth']->username;
    $message = htmlspecialchars($_POST['message']);
    $insertmsg = $db->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
    $insertmsg->execute(array($pseudo, $message));
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
            <a class="navbar-brand" href="">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="">Topic</a></li>
                <li class="active"><a href="chat.php">Chat Public</a></li>
                <li><a href="">Chat Privé</a></li>
                <li><a href="./account.php">Profil</a></li>
                <li><a href="modifprof.php">Modifier mes information</a></li>
                <li><a href="motdepasse.php">Modifier mon mot de passe</a></li>
                <li><a href="../pages/logout.php">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
<form method="post" action="">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Message</h3>
            </div>
            <div class="panel-body">
                <?php
                $allmsg = $db ->query('SELECT * FROM chat LIMIT 0,50'); //Ajouter LIMIT x, y   pour limiter le nombre de messages affichés ORDER BY id DESC
                /*debug($message_msg);*/
                while ($message_msg = $allmsg->fetch()) {
                    echo "<br>";
                    $message_msg_username = $message_msg->pseudo;
                    $message_msg1 = $message_msg->message;

                    echo $message_msg_username." :";
                    echo " ".$message_msg1;
                    /*
                    http://127.0.0.1/wiki/pages/profil.php?pseudo=comgiov
                    */
                }
                ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="form-group">
            <label for="comment">Message</label>
            <textarea class="form-control" rows="5" type="text" name="message" placeholder="MESSAGE"></textarea><br/>
            <input class="btn btn-primary classdecentragelol" type="submit" value="Envoyer" />
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
</body>
</html>
