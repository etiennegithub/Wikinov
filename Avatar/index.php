<?php
/*
    require ('avatar.php');
    create('comgio', 10, 600);
*/
require ('avatarClass.php');
$avatar = new Avatar('comgio', 10, 600);
$avatar->save('avatar.png');
/** penser a mettre un chemin de sauvegard de l'image

    $avatar->display();
    pas tres parique
 * */
echo $avatar->base64();
?>

<!-- on peux la retourner depuis la base 64-->
<img src="<?= $avatar->base64() ?>" alt=""/>
<!-- on peux la retourner depuis la sauvegard-->
<img src="avate.png" alt="">
<!-- pas suporter sur le vieu IE-->

