<?php

if(isset($_POST['content']) && !empty($_POST['content'])) {

    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id']: 0;


    if($parent_id != 0) {

        $req = $app->pdo->prepare('SELECT id FROM comments WHERE id = ?');

        $req->execute([$parent_id]);

        $comment = $req->fetch();

        if($comment == false){

            throw new Exception('Ce parent n\'existe pas');

        }
    }


    $req = $app->pdo->prepare('INSERT INTO commens SET content = ?, parent_id = ?');

    $req->execute([$_POST['content'], $parent_id]);

    $app->flash('success', 'Merci pour votre commentaire');

}

else {

    $app->flash('danger', 'vous n\'avez rien posté');

}

$app->response->redirect($app->urlFor('home'));

?>