<?php
require_once 'iinclude/fonction.php';
require_once 'session.php';
session_start();

log_re();

if(!empty($_POST)) {

    $error = array();
    require 'iinclude/basededonne.php';
    $pseudo = htmlspecialchars($_POST['username']);
    $pseudotaille =strlen($_POST['username']);

    if($pseudotaille <=50) {
        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
            $error['username'] = "Votre pseudo n'est pa valide (a-z A-Z 0-9)";
        }else {
            $req = $db->prepare('SELECT id FROM users WHERE username = ?');
            $req->execute([$_POST['username']]);
            $user = $req->fetch();/*recuperer le premier enregistrement*/
            if ($user) {
                $error['username'] = "ce nom d'utilisateur est déja utiliser";
            }
        }
    }else{
        $error['username'] = "Dépasse 50";
    }

    /* true si ou false non si ca ne valide pas on n'a l'erreur*/
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['emailconfirm']);

    if ($email == $email2) {

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "votre email n'est pas valide";
        } else {
            $req = $db->prepare('SELECT id FROM users WHERE email = ?');
            $req->execute([$_POST['email']]);
            $user = $req->fetch();/*recuperer le premier enregistrement*/
            if ($user) {
                $error['email'] = "Ce mail est déja utiliser";
            }
        }
    }else{
        $error['mail'] = "Les deux mails ne corresponde pas";
    }

    $mdpsec =strlen($_POST['password']);

    /*
    if(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password']) && !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password_confirm'])) {
    }else{
        $error['password'] = "a-zA-Z0-9";
    }
    */

    if ($mdpsec > 8) {
        if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
            $error['password'] = "Vos mot de passe ne correspond pas";
        }
    } else {
        $error['password'] = "Le mot de passe doit être faire au moins 9 caractére";
    }


    if (empty($error)) {
        $req = $db->prepare("INSERT INTO users SET username = ?, mdp = ?, email = ?, confirmation_token = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['username'], $password, $_POST['email'], $token ]);
        $user_id = $db->lastInsertId();
        /*
                $message = "Afin de valider votre compte merci de cliquer sur ce lien \r\n http://127.0.0.1/forum2/confirm.php?id=$user_id&token=$token";
        // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
                $message = wordwrap($message, 70, "\r\n");
                mail('$_POST[\'email\']', 'Valiation', $message);

        mail($_POST['email'],'confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien \n\nhttp://127.0.0.1/forum2/confirm.php?id=$user_id&token=$token");
        */
        $_SESSION['flash']['success']='Votre compte a bién été crée! un email de confirmation vous a été envoyé';
        header('Location: login.php');
        exit();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php if(!empty($error)):?>

    <div class="alert alert-danger">
        <p>Vous n'avez pas remplis le formulaire correctement</p>
        <ul>
            <?php foreach($error as $err): ?>
                <li><?= $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<form action="" method="post">
    <input type="text" name="nom" placeholder="Nom" value="<?= (!empty($nom))?$nom:'' ?>"/>
    <br>
    <br>
    <input type="text" name="prenom" placeholder="prenom" value="<?= (!empty($prenom))?$prenom:'' ?>"/>
    <br>
    <br>
    <input type="text" name="username" placeholder="Pseudo" value="<?= (!empty($username))?$username:'' ?>"/>
    <br>
    <br>
    <input type="email" name="email" placeholder="Email" value="<?= (!empty($email))?$email:'' ?>"/>
    <br>
    <br>
    <input type="email" name="emailconfirm" placeholder="Email" value="<?= (!empty($emailconfirm))?$emailconfirm:'' ?>"/>
    <br>
    <br>
    <input type="password" name="password" placeholder="Mot de passe"/>
    <br>
    <br>
    <input type="password" name="password_confirm" placeholder="Confirmation"/>
    <br>
    <br>
    <button type="submit" class="button" name="forminscription">Je m'inscris</button><br>
</form>
</body>
</html>