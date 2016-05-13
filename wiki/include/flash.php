<?php
require_once 'fonction.php';
dem_session();
/*
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
*/
?>
<?php if(isset($_SESSION['flash'])):?>

    <?php foreach($_SESSION['flash'] as $type => $message):?>
        <div class="container">
            <!-- bordel ça marche pas -->
            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
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
            <!-- bordel ça marche pas -->
            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
            <div class="alert alert-<?= $type; ?>">

                <?= $message2; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash2"]); ?>
<?php endif; ?>

<?php if(isset($_SESSION['flash3'])):?>

    <?php foreach($_SESSION['flash3'] as $type => $message3):?>
        <div class="container">
            <!-- bordel ça marche pas -->
            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
            <div class="alert alert-<?= $type; ?>">

                <?= $message3; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash3"]); ?>
<?php endif; ?>

<?php if(isset($_SESSION['flash4'])):?>

    <?php foreach($_SESSION['flash4'] as $type => $message4):?>
        <!-- bordel ça marche pas -->
        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
        <div class="alert alert-<?= $type; ?>">

            <?= $message4; ?>

        </div>
    <?php endforeach; ?>

    <?php unset($_SESSION["flash4"]); ?>
<?php endif; ?>
