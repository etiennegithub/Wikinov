<?php


namespace App;


class Comments
{

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;

    }


    public function findAllWichChildren(){

        $comments = $this->pdo->query('SELECT * FROM comments')->fetchAll();

        $comments_by_id = [];

        foreach($comments as $comment){

            $comments_by_id[$comment->id] = $comment;

        }

        foreach($comments as $k => $comment){

            if($comment->parent_id != 0){

                $comments_by_id[$comment->parent_id]->children[] = $comment;

                unset($comments[$k]);

            }

        }

        return $comments;

    }

}