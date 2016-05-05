<?php
require "include/header.php";
require 'include/basededonne.php';
require_once 'include/fonction.php';
log_only();

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    /*Securisation de la varible entrer en nombre*/
    /*$getid = intval($_GET['id']);*/
    $req = $db -> prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$_GET['id']]);
    $user = $req-> fetch();
}
?>
<div class="container">
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
    <h1>Statut social<?=$user->statutsocial?></h1>
    <a href="<?=$user->lien?>" target="_blank" style="font-size: 30px"><?=$user->lien?></a>
    <h1>Adresse email: <?=$user->email?></h1>
    <h1>Date de création du compte: <?=$user->confirmed_at?></h1>
    <h1>Statut: <?=$user->statut?></h1>

</div>
<?php require 'include/footer.php'; ?>