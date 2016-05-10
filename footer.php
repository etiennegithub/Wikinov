<?php

$membres_nbr = $bdd->query('SELECT id FROM membres Where confirme = 1');
$membres_nbr = $membres_nbr->rowCount();

if(isset($_COOKIE['accept-cookie'])){
    $showcookie = false;
}
else{
    $showcookie = true;
}
    require_once('')

?>