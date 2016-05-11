<?php
if(isset($_COOKIE['accept_cookie'])){
    $showban_cookie = false;
}else{
    $showban_cookie = true;
}
?>
<?php if($showban_cookie): ?>
    <div class="container">
        <div class="cookie_banner">
            <p class="cookie_banner_txt">En poursuivant votre navigation, vous acceptez le dépôt de cookies tiers destinés à améliorer votre experience utilisateur <a href="/wiki/include/accept_cookie.php" class="btn btn-warning">Valider</a></p>
        </div>
    </div>
<?php else: ?>
    <p></p>
<?php endif; ?>
