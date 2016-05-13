<div class="panel panel-default">

    <div class="panel-body">

        <p><?= htmlentities($comment->content); ?></p>

        <p class="text-right">

            <a href="<?=$app->urlfor('comments.delete', ['id' => $comment->id]); ?>" class="btn btn-danger">Supprimer</a>

            <button class="btn btn-default reply" data-id="<?= $comment->id; ?>">Répondre</button> <!-- encrage commentaire -->

        </p>

    </div>

</div>

<div style="margin-left: 50px;">

    <?php if(isset($comment->children)): ?>

        <?php foreach($comment->children as $comment): ?>

            <?php require('comment.php'); ?>

        <?php  endforeach; ?>

    <?php  endif; ?>

</div>
