<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WIKINOV la platforme de l'innovation!">
    <meta name="author" content="GROUPE YNOV">
    <meta name="theme-color" content="#FF2C5A">
    <title>Première connexion</title>
    <link rel="stylesheet" href="../css/boostrap/bootswatch/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/stylefirstlog.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/x-icon" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.ico" />
    <link rel="icon" type="image/png" href="https://www.ynov.com/wp-content/uploads/2014/01/favicon1.png" />
</head>
<body>
<div class="container center_all">
    <img src="../images/logo.jpg" alt="Logo ynov" title="Logo ynov" class="animated jello img-responsive logoynov">
    <form action="" method="POST">
        <div class="container">
            <img src="/site/images/avatar.png" alt="" class="classdecentragelol">
            <!-- avatar generer aléatoirement php -->
            <br>
            <label for="icone">Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
            <input type="file" name="icone" id="icone" class="classdecentragelol"/><br />
            <!-- le remplacer par celui generer aléatoirement php -->

            <div class="form-group">
                <label for="">Nom</label>
                <input id="label_email" type="text" name="username" class="form-control" value=""/>
            </div>

            <div class="form-group">
                <label for="">Prénom</label>
                <input id="" type="text" name="" class="form-control" value=""/>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input id="" type="email" name="" class="form-control" value=""/>
            </div>

            <form role="form">
                <div class="form-group">
                    <label for="comment">Description :</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </form>

            <div class="form-group">
                <label for="">Lien Linkdin</label>
                <input id="label_email" type="text" name="" class="form-control" value=""/>
            </div>

            <div class="form-group">
                <label for="">Lien Twitter</label>
                <input id="label_email" type="text" name="" class="form-control" value=""/>
            </div>

            <div class="form-group">
                <label for="">Modifier votre mot de passe</label>
                <input id="label_email" type="text" name="" class="form-control" value=""/>
            </div>

            <div class="form-group">
                <label for="">Retaper votre mon de passe</label>
                <input id="" type="text" name="" class="form-control" value=""/>
            </div>
            <button type="submit" class="btn btn-primary classdecentragelol">Enrégistrer</button>
            <br>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
</body>
</html>