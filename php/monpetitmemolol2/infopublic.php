<?php
require "include/headerparm.php";
require 'include/basededonne.php';
require_once 'include/fonction.php';
log_only();
$req = $db -> prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$_SESSION['auth']->id]);
$user = $req-> fetch();
/*
debug($user);
*/
/*
 * UPDATE users SET password = ? WHERE id = ?'
 * */
/*
 * photo uploader
 * */
?>
<div class="container">
    <h1></h1>
    <img src="/forum2/avatar/domo.jpg" alt="">
    <h1>ID: <?=$user->id?></h1>
    <h1>Pseudo: <?=$user->username?></h1>
    <h1>Numéro de tel: <?=$user->numérotel?></h1>
    <h1>Date d'anniversaire: <?=$user->dateaniv?></h1>
    <h1>Sexe: <?=$user->sexe?></h1>
    <h1>Âges: <?=$user->age?> ans</h1>
    <h1>Nationalités: <?=$user->nation?></h1>
    <h1>Taille: <?=$user->taille?></h1>
    <h1>Région: <?=$user->religion?></h1>
    <h1>Statut social <?=$user->statutsocial?></h1>
    <a href="<?=$user->lien?>" target="_blank" style="font-size: 30px"><?=$user->lien?></a>
    <h1>Adresse email: <?=$user->email?></h1>
    <h1>Date de création du compte: <?=$user->confirmed_at?></h1>
    <h1>Statut: <?=$user->statut?></h1>
    <br>
    <br>
    <br>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
        </div>
    </div>
    <br>
    <br>
    <form action="" method="POST">
        <h1>Modification du profil !</h1>
        <br>
        <br>
        <div class="form-group">
            <label for="">Pseudo</label>
            <input required type="text" name="" class ="form-control" value="<?=$user->username?>"/>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input required type="email" name="" class ="form-control" value="<?=$user->email?>"/>
        </div>

        <div class="form-group">
            <label for="">Numéro de tel</label>
            <input required type="email" name="" class ="form-control" value="<?=$user->numérotel?>"/>
        </div>

        <div class="form-group">
            <label for="">Date d'anniversaire</label>
            <input required type="" name="" class ="form-control" value="<?=$user->dateaniv?>"/>
        </div>

        <div class="form-group">
            <label for="">Sexe</label>
            <input required type="" name="" class ="form-control" value="<?=$user->sexe?>"/>
        </div>

        <div class="form-group">
            <label for="">Âges</label>
            <input required type="" name="" class ="form-control" value="<?=$user->age?>"/>
        </div>

        <div class="form-group">
            <label for="">Nationalités</label>
            <input required type="" name="" class ="form-control" value="<?=$user->nation?>"/>
        </div>

        <div class="form-group">
            <label for="">Taille</label>
            <input required type="" name="" class ="form-control" value="<?=$user->taille?>"/>
        </div>

        <div class="form-group">
            <label for="">Région</label>
            <input required type="" name="" class ="form-control" value="<?=$user->religion?>"/>
        </div>

        <div class="form-group">
            <label for="">Statut social</label>
            <input required type="" name="" class ="form-control" value="<?=$user->statutsocial?>"/>
        </div>

        <div class="form-group">
            <label for="">Lien</label>
            <input required type="" name="" class ="form-control" value="<?=$user->lien?>"/>
        </div>

        <div class="form-group">
            <label for="">Statut</label>
            <input required type="" name="" class ="form-control" value="<?=$user->statut?>"/>
        </div>
        <label for=""></label>
        <form id="upload_form" enctype="multipart/form-data" method="post">
            <input type="file" name="champsFichier" id="champsFichier"><br>
        </form>
        <button type="submit" class="btn btn-primary">Modifié</button>
    </form>
</div>
</div>
<?php require 'include/footer.php'; ?>
