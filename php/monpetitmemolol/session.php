<?php if(isset($_SESSION['flash'])):?>

    <?php foreach($_SESSION['flash'] as $type => $message):?>
        <div class="container">
            <div class="alert alert-<?= $type; ?>">

                <?= $message; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash"]); ?>

<?php endif; ?>

<?php if(isset($_SESSION['flash2'])):?>

    <?php foreach($_SESSION['flash2'] as $type => $message2):?>
        <div class="container">
            <div class="alert alert-<?= $type; ?>">

                <?= $message2; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash2"]); ?>
<?php endif; ?>