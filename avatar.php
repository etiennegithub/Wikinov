<?php

function upload($index,$destination,$extension=false,$maxsize=false,$size=false){
    if (empty($_FILES[$index]) || $_FILES[$index]["error"] > 0){
        echo "erreur";
        return false;
    }
    $ext = strtolower(substr(strrchr($_FILES[$index]["name"],"."),1));
    /*pas avec le point dont un substr donc que l'extension
    mettre en minuscule
    echo $ext."<br>";
    */
    if ($extension != false && !in_array($ext, $extension)){
        /*si se n'est pas dans le tableau*/
        echo "extention nonnn";
        return false;
    }
    /*retourne la dernier occurence d'un resultat*/

    if ($maxsize != false && $_FILES[$index]["size"] > $maxsize){
        echo "poids rop grand";
        return false;
    }
    $dimension = getimagesize($_FILES[$index]['tmp_name']);
    var_dump($dimension);
    if ($size!= false && $dimension[0] > $size[0] || $dimension[1] > $size[1]){
        echo "dimmention de ouf gros";
        return false;
    }
    return move_uploaded_file($_FILES[$index]['tmp_name'], $destination.mt_rand(0,1000).$_FILES[$index]['name']);
    /*$chemin = "testup/".$_SESSION['id'].".".$extensionUpload;

    $update = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                    $update->execute(array(
                        'avatar' => $_SESSION['id'].".".$extensionUpload,
                        'id' => $_SESSION['id']
                    ));
    */
}

if (!empty($_POST['submit'])){
    var_dump($_FILES);
    if (upload("avatar","avatar/", array("png","jpg","gif","bmp"),102400,array(200,200)) == true){
        echo "upload ok";
    }
}

?>
<form method="post" action="" enctype="multipart/form-data">
    <div>
        <label for="avatar">Votre avatar: </label>
        <input type="file" name="avatar" id="avatar">
        <br>
        <input type="submit" value="Envoyer" name="submit">
    </div>
</form>