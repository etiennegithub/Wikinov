<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Formulaire de Contact</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="WIKINOV la platforme de l'innovation!">
        <meta name="author" content="GROUPE YNOV">
        <meta name="theme-color" content="#FF2C5A">
        <title>Wikinov | Connexion</title>
        <link rel="stylesheet" href="../css/boostrap/bootswatch/bootstrap.min.css">
        <link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
    <br>
    <br>
    <br>
    <?php

    if(!empty($_POST)) {
        var_dump($_POST);
    }
    ?>
    <div class="container">
        <div class="row-centered mt mb">
            <form action="post_contact.php" method="post">

                <div class="col-lg-6 col-lg-offset-3">

                    <?php if(array_key_exists('errors',$_SESSION)):?>

                        <div class="alert alert-danger">

                            <?= implode('<br>',$_SESSION['errors']);?>

                        </div>

                    <?php endif; ?>

                    <?php if(array_key_exists('success',$_SESSION)):?>

                        <div class="alert alert-success">

                            <p>Votre Formulaire a bien été envoyé</p>

                        </div>

                    <?php endif; ?>
<!--
                    <p class="formulairedecontact">Formulaire de contact</p>
-->
                    <div class="form-group">
                        <label for="inputname">
                            <p>Votre nom</p>
                        </label>

                        <div class="input-group">
                            <input required type="text" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name']: '';?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                        </div>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="inputemail">
                            <p>Votre Email</p>
                        </label>

                        <div class="input-group">
                            <input required type="text" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email']: '';?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                        </div>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="inputmessage">
                            <p>Votre message</p>
                        </label>

                        <div class="input-group">
                            <textarea required  id="inputmessage" rows="8" name="message" class="form-control" maxlength="1000" ><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message']: '';?></textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                        </div>
                        <br>
                    </div>

                    <div class="g-recaptcha" data-sitekey=""></div>
                    <br>
                    <!-- button en orange-->
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        <p class="envy">Envoyer</p>
                    </button>

                    <br />
                    <br />

                </div>

            </form>
        </div>
    </div>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </html>
<?php
unset($_SESSION['inputs']);
unset($_SESSION['errors']);
unset($_SESSION['success']);
?>