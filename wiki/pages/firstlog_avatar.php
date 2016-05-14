<?php
require_once '../include/fonction.php';
require ('../class/avatarClass.php');
log_only_first();
error_reporting(E_ALL);
ini_set("display_errors", 1);
$username_auth = $_SESSION['auth']->username;
$avatar_name_file = $_SESSION['auth']->avatar;
$chemin_img_html = "../img_avatar/newup/".$avatar_name_file;
$chemin_default = "../img_avatar/default/".$avatar_name_file;
$avatar = new Avatar($username_auth, 10, 600);
$avatar->save($chemin_img_html);
$avatar->save($chemin_default);
$error = array();

if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
    $taillemax = 25000000;/*en octet ma gueule 1 kil-- 1000 1mo ----- 1000000 1go ----- 1000000000*/
    $extensionValides = array('jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'ico');
    if ($_FILES['avatar']['size'] <= $taillemax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
        if (in_array($extensionUpload, $extensionValides)){
            /*$chemin = "../img_avatar/newup/".$_SESSION['auth']->username.".".$extensionUpload;*/
            $chemin = "../img_avatar/newup/".$_SESSION['auth']->username.".".$extensionUpload;
            /*$chemin = "testup/".$_SESSION['id'].".".$extensionUpload;*/
            $file = $_FILES['avatar']['tmp_name'];
            $newfile = '../img_avatar/oldup/'.$_SESSION['auth']->username.mt_rand(0,10000).".".$extensionUpload;
            copy($file, $newfile);
            /*
             *
             *faire une seconde copy
             *si ça ne marche pas remettre la copy
             *dans
             * fileinfo
             * */
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
            /*
             *enter username+format dze l'image
             * */
            $user_id = $_SESSION['auth']->id;
            $user_name = $_SESSION['auth']->nom;
            /*
             $new_bd_name_img = $user_name.".".$extensionUpload;
            */
            $new_bd_name_img = $_SESSION['auth']->username.".".$extensionUpload;

            require_once '../include/basededonne.php';

            $req = $db->prepare('UPDATE users SET avatar= ? WHERE id = ?');
            $req->execute([$new_bd_name_img, $user_id]);

            $req_1 = $db->prepare('SELECT avatar FROM users WHERE id = ?');
            $req_1->execute([$_SESSION['auth']->id]);

            $avatar_1 = $req_1->fetch();

            $avatar_name_file = $avatar_1->avatar;

            $chemin_img_html = "../img_avatar/newup/".$avatar_name_file;


            if ($resultat){
                /*
                $update = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                $update->execute(array(
                    'avatar' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                ));
                */
                //petit truc mesquin lol j'avai envie de faire ça
                $monfichier = fopen('nomfichier.txt', 'a+');
                $nomfichier = $_FILES['avatar']['name'].' ';
                fputs($monfichier, $nomfichier);
                fclose($monfichier);
            }else{
                $error['importation'] = "Erreur au niveau de l'importation";
            }

        }else{
            $error['format_img'] = "Vous ne pouvez uploder que des images de format jpeg jpg gif png ou bmp";
        }
    }else{
        $error['taille_img'] = "La taille de l'images ne peux pas depasser 25Mo";
    }
}

if (isset($_POST['suivant']) AND $_POST['suivant']=='suivant_name'){
    require_once '../include/basededonne.php';
    $boool_first= 1;
    $req_2 = $db->prepare('UPDATE users SET firstlog_bool= ? WHERE id = ?');
    $req_2->execute([$boool_first,$_SESSION['auth']->id]);
    header('Location: /wiki/pages/account.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIKINOV la platforme de l'innovation!">
    <meta name="author" content="GROUPE YNOV">
    <meta name="theme-color" content="#FF2C5A">
    <title>Première connexion | Avatar</title>
    <link rel="stylesheet" href="../css/boostrap/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />
</head>
<body>
<div class="container center_all">
    <a href="../pages/logout.php" class="classdecentragelol">Deconnexion</a>
    <?php if(!empty($error)):?>

        <div class="alert alert-danger">
            <p>Vous n'avez pas remplis les formulaire correctement</p>
            <p>-----------------------------------------------------</p>
            <ul>
                <?php foreach($error as $err): ?>
                    <li class="classdecentragelol"><?= $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php endif; ?>
    <div class="container">
        <img src="../images/logo.jpg" alt="Logo ynov" title="Logo ynov" class="animated jello img-responsive logoynov">
        <br>
        <form action="" method="POST">
            <button type="submit" name="suivant" value="suivant_name" class="btn btn-primary classdecentragelol">Suivant</button>
        </form>
        <br>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <img src="<?= $chemin_img_html; ?>" alt="" class="classdecentragelol avatartaille">
            <p class="classdecentragelol">Ce avatar est unique et a été generer aléatoirement!</p>
            <p class="classdecentragelol">Vous avez aussi la possibilité de changer ce avatar!</p>
            <br>
            <!-- avatar generer aléatoirement php -->
            <br>
            <label for="icone">Icône du fichier (JPG, PNG , GIF ou BMP | max. 25 Mo) :</label><br />
            <input type="file" name="avatar" id="avatar" class="classdecentragelol"/>
            <br>
            <button type="submit" class="btn btn-primary classdecentragelol">Changer l'avatar</button>
            <br>
            <!-- le remplacer par celui generer aléatoirement php -->
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
</body>
</html>
