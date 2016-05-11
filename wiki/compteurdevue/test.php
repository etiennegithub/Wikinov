<?php
// 1 : on ouvre le fichier
$monfichier = fopen('t.txt', 'a+');

/*
 2 : on fera ici nos opérations sur le fichier...
r lecture seule
r+ tecture et ecriture
a ouvre et si non crée
a+ ouvre crée lecture ecriure
*/

$ligne = fgets($monfichier);
//ne lis que la premier lignes arrête la lecture au premier saut de ligne
//echo $ligne;


//fputs($monfichier, 'u_u-');//ecrase la lignes qui suit
//fseek($monfichier, 0);//retour au debut de la ligne//si ouvert en  a ou a+ donc pas bessoin
//fputs($monfichier, '0');


echo $ligne;
fclose($monfichier);
// 3 : quand on a fini de l'utiliser, on ferme le fichier
?>
