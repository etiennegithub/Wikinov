<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=tuto;charset=utf8", "root", "");
if(isset($_POST['pseudo'])AND isset($_POST['message'])AND !empty($_POST['pseudo'])AND !empty($_POST['message']))

{
    $pseudo = htmlspecialchars($_POST['pseudo']); // htmlspecialchars sert à empêcher les injections sql
    $message = htmlspecialchars($_POST['message']);
    $insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
    $insertmsg->execute(array($pseudo, $message));
}

?>

<html>
    <head>
        <title>Chat php</title>
        <meta charset=""utf-8">
    </head>
<body>
    <form method="post" action="">
        <input type="text" name="pseudo" placeholder="PSEUDO"  value="<?php
            if(isset($pseudo)) { echo $pseudo;} ?>" /><br/>
        <textarea type="text" name="message" placeholder="MESSAGE"></textarea><br/>
        <input type="submit" value="Envoyer" />
    </form>
<?php

$allmsg = $bdd ->query('SELECT * FROM chat ORDER BY id DESC'); //Ajouter LIMIT x, y   pour limiter le nombre de messages affichés
while($msg = $allmsg->fetch()) {
    ?>
    <b><?php echo $msg['pseudo']; ?> : </b>
    <?php echo $msg['message']; ?><br/>

    <?php
}
    ?>

</body>
</html>
