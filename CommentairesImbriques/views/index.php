<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <!-- Message flash -->

        <?php if(isset($_SESSION['slim.flash'])): ?>

            <?php  foreach($_SESSION['slim.flash'] as $type => $message): ?>

                    <div class="alert alert-<?= $type; ?>">

                        <p><?= $message; ?></p>

                    </div>

            <?php  endforeach; ?>

        <?php  endif; ?>

        <?php $comments = new App\Comments($app->pdo); ?>

        <?php foreach($comments->findAllWithChildren(1) as $comment); ?>

            <?php  require('comment.php'); ?>

        <?php endforeach; ?>

        <form action="" id="form_comment" method="post">

            <input type="hidden" name="parent_id" value="0" id="parent_id">

            <h4>Poster un commentaire</h4>

            <div class="form-group">

                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Votre commentaire"></textarea>

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary">Commenter</button>

            </div>

        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootsrap/3.3.4/js/bootsrap.min.js"></script>

<   <script src="js/app.js"></script>

</body>
</html>