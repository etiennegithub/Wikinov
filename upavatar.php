<?php

    if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
        $taillemax = 2097152;/*2mega*/
        $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
        if ($_FILES['avatar']['size'] <= $taillemax){
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
            if (in_array($extensionUpload, $extensionValides)){
                $chemin = "testup/".".".$extensionUpload;
                /*$chemin = "testup/".$_SESSION['id'].".".$extensionUpload;*/
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                if ($resultat){
                    /*UPDATE membres SET avatar = ? WHERE id = :id*/
                    echo "nice";
                }else{
                    $msg = "erreur dinmporation";
                }

            }else{
                $msg = "jpeg jpg gif png";
            }
        }else{
            echo $msg = "pas depasser 2 mega";
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Avatar</title>
    </head>
    <body>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="avatar"/>
            <br>
            <br>
            <input type="submit" value="Valider">
        </form>
    <?php
        $msg ="test";
        echo $msg;
    ?>
    </body>
</html>