<?php
require_once '../include/fonction.php';
log_only_first();
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*
 * $2a$06$boQTUrC8R5ReGf5Eh8R8te8UOerTG9icz4pJ8.TCk2UisvF7rwk8W
 * */
if (!empty($_POST)) {
    $error_1 = array();

    $description_secu = htmlspecialchars($_POST['description_name']);
    $lienlinkdin = htmlspecialchars($_POST['lien_link']);
    $lientwitter = htmlspecialchars($_POST['lien_twitter']);
    $mdpmodifn = htmlspecialchars($_POST['mdp_1']);
    $mdpmodifn2 = htmlspecialchars($_POST['mdp_2']);
    $mdptaille = strlen($_POST['mdp_1']);

    $description_nombre = strlen($description_secu);
    $lienlinkdin_taille = strlen($lienlinkdin);
    $lientwitter_taille = strlen($lientwitter);

    if ($description_nombre > 10) {
        $error_1['taille_desc'] = "la description ne doit pas depassr 255";
    }

    if ($lienlinkdin_taille > 10) {
        $error_1['taille_linkdi'] = "le lien link ne doit pas depassr 255";
    }

    if ($lientwitter_taille > 10) {
        $error_1['taille_twitter'] = "le lien twitter ne doit pas depassr 255";
    }

    if (empty($error_1)) {
        require_once '../include/basededonne.php';
        $reqq = $db->prepare('SELECT * FROM users WHERE id = :id');
        $reqq->execute(['id' => $_SESSION['auth']->id]);
        $userr = $reqq->fetch();
        if (!empty($_POST['mdp_old'])){
            if (password_verify($_POST['mdp_old'], $userr->password)) {
                if ($mdptaille > 8) {
                    $mdpsec2 = strlen($_POST['mdp_1']);
                    if ($_POST['mdp_1'] != $_POST['mdp_2']) {
                        $_SESSION['flash3']['danger'] = "Les mot de passes ne correspondent pas";
                    } else if ($_POST['mdp_1'] = $_POST['mdp_2']) {

                        $user_id = $_SESSION['auth']->id;
                        $passwordnew = password_hash($_POST['mdp_1'], PASSWORD_BCRYPT);
                        $reqq_2 = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
                        $reqq_2->execute([$passwordnew, $user_id]);

                        $reqq_3 = $db->prepare('UPDATE users SET desciption = ?, lienlinkdin = ?, linktiwtter = ? WHERE id = ?');
                        $reqq_3->execute([$description_secu, $lienlinkdin, $lientwitter, $user_id]);

                        $_SESSION['flash3']['success'] = "Le mot de passe a été mise a jour";
                        
                        header('Location: firstlog_avatar.php');
                        exit();
                    }
                } else {
                    $_SESSION['flash3']['danger'] = "Le mot de passe doit faire au moins 9 caractére";
                }
            } else {
                $_SESSION['flash3']['danger'] = "L'ancien mot de passe ne corrspond pas";
            }
        }else{
            header('Location: firstlog_avatar.php');
        }
    }
}
/*
 *avatar_name_file
 * de base dans la base de donnée c'est juste  le l(username en varch avatar
 * ensuite
 * pour lors de l'affichage on donne le chemin avec la valeur de avart_name_file qui
 * est dans la base de donne
 * plus l'extension qui viens juste de se faire upload
 *
 * de tout les façon ça sera a rien vue que final on ne vas pas rest sur la page
 * du coup il faut penser  a l'affichage et l'uplead sur une autres pagess
 *
 * bah enfaite on reprends le truc du haut
 *
 *
 * pour la copie faut voir comment faire aprés c'est important
 * faire le truc des cookie un bonne fois pour toute
 *penser a faire une fonction et le mettre sur tout les pages lol
 *
 * sinscrirre sur le forum de https://www.primfx.com/ pour demander le truc des notifcation push par email
 *
 *
 * verifier dans le post si il ya un @suiv suivie d'un nom bas verifier s'il est dans la base de donne et la envoyer
 * une mail a l'adress mail qui correspond au nom d'utilisateur
 *
 *
 * demander pour la protection des dossier avec htacces et demanderr pourquoi chez moi ça marche pas (si oui)
 *
 * */
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
    <title>Première connexion</title>
    <link rel="stylesheet" href="../css/boostrap/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />
</head>
<body>
<div class="container center_all">
    <img src="../images/logo.jpg" alt="Logo ynov" title="Logo ynov" class="animated jello img-responsive logoynov">
    <a href="../pages/logout.php" class="classdecentragelol">Deconnexion</a>
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
    <h1 class="classdecentragelol">VOTRE PROFIL</h1>
    <br>
    <div class="form-group">
        <label for="label_nom">Nom</label>
        <input readonly id="label_nom" type="text" name="username" class="form-control" value="<?php echo $_SESSION['auth']->nom; ?>" />
    </div>

    <div class="form-group">
        <label for="label_prenom">Prénom</label>
        <input readonly id="label_prenom" type="text" name="" class="form-control" value="<?php echo $_SESSION['auth']->prenom; ?>"/>
    </div>

    <div class="form-group">
        <label for="label_email">Email</label>
        <input readonly id="label_email" type="email" name="" class="form-control" value="<?php echo $_SESSION['auth']->email; ?>"/>
    </div>

    <form action="" method="POST">
        <div class="form-group">
            <label for="comment">Description* : (255 caractères maximum)</label>
            <textarea class="form-control" rows="5" id="comment" name="description_name"><?= (!empty($description_secu))?$description_secu:'' ?></textarea>
        </div>

        <div class="form-group">
            <label for="">Lien Linkdin</label>
            <input id="label_email" type="text" name="lien_link" class="form-control" placeholder="https://fr.linkedin.com/nom_dutilisateur" value="<?= (!empty($lienlinkdin))?$lienlinkdin:'' ?>"/>
        </div>

        <div class="form-group">
            <label for="">Lien Twitter</label>
            <input id="label_email" type="text" name="lien_twitter" class="form-control" placeholder="https://twitter.com/nom_dutilisateur" value="<?= (!empty($lienlinkdin))?$lienlinkdin:'' ?>"/>
        </div>

        <div class="form-group">
            <label for="">Ancien mot de passe</label>
            <input id="label_email" type="text" name="mdp_old" class="form-control" value=""/>
        </div>

        <div class="form-group">
            <label for="">Nouveau mot de passe</label>
            <input id="label_email" type="text" name="mdp_1" class="form-control" value=""/>
        </div>

        <div class="form-group">
            <label for="">Retaper votre mon de passe</label>
            <input id="" type="text" name="mdp_2" class="form-control" value=""/>
        </div>

        <button type="submit" class="btn btn-primary classdecentragelol">Enregistrer</button>
        <br>
        <br>
        <br>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
</body>
</html>
