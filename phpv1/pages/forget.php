<?php
if(!empty($_POST) && !empty($_POST['email'])){
    require_once '../include/basededonne.php';
    require_once '../include/fonction.php';
    $req = $db->prepare('SELECT * FROM users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset_token = str_random(60);
        $db->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token,$user->id]);
        $_SESSION ['flash']['success']= "Le lien a éte envoyé par email";
        mail($_POST['email'],'reeeu de mot de passe',"ergareg \n\nhttp://127.0.0.1/forum2/reset.php?id=($user->id)&token=$reset_token");
        header('Location: login.php');
        exit();
    }else{
        $_SESSION['flash']['danger']= 'Aucun compte ne corresponds à ce email';
    }
}else{
    $_SESSION['flash']['danger']= 'Remplir tous les champs!';
}
?>

<?php require "../include/flash.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIKINOV la platforme de l'innovation!">
    <meta name="author" content="GROUPE YNOV">
    <meta name="theme-color" content="##FF2C5A">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../css/boostrapcyborg.css">
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
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <h1>Mot de passe oublié</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Email</label>
            <input required type="email" name="email" class="form-control"/>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
<?php require "./include/footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
</body>
</html>
