<?php

$comments = new \App\Comments($app->pdo);

$comments->delete($id);

$app->flash('success', '')


$app->flash('succes', 'Le commentaire à bien été supprimé');

$app->response->redirect($app->urlFor('home'));

?>