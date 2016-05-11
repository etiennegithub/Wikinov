<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'include/fonction.php';
require_once 'include/basededonne.php';

$req = $db->prepare('SELECT avatar FROM users WHERE id = ?');
$req->execute([1]);
$avatar_update = $req->fetch();
debug($avatar_update);
var_dump($avatar_update->avatar);
echo  $avatar_update->avatar;
/*
echo $avatar_update["avatar"];
*/
/*
$avatar[]->avatar;
*/
/*
$req_1 = $db->prepare('SELECT avatar FROM users WHERE id = ?');
$req_1->execute([1]);
$avatar_1 = $req_1->fetch();
echo  $avatar_1->avatar;
*/