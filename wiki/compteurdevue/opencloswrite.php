<?php
$monfichier = fopen('compteur.txt', 'r+');
$pages_vues = fgets($monfichier);
$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
fclose($monfichier);
echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
fclose($monfichier);
?>
 

