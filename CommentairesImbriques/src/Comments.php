<?php


namespace App;


class Comments
{

    private $pdo;

    private $comments_by_id

    public function __construct(\PDO $pdo){

        $this->pdo = $pdo;

    }


    public function findAllWithChildren($post_id){

        $req = $this->pdo->prepare('SELECT * FROM comments WHERE post_id = ?');

        $req->execute([$post_id]);

        $comments = $req->fetchAll();

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
        $this->comments_by_id = $comments_by_id; //derniere modif 50:57
        return $comments;

    }



    // supprime un commentaires et ses enfants
    public function delete($id){

        $req = $this->pdo->prepare('SELECT * FROM comments WHERE id = ?');

        $req->execute([$id]);

        $comments = $req->fetch();


        //supprime le commentaire

        $this->pdo->prepare('UPDATE FROM comments WHERE id = ?')->execute([$id]);

        //Monte les enfants

        $this->pdo->prepare('UPDATE comments SET parent_id = ? WHERE parent_id = ?')->execute([$comment->parent_id, $comment->id]);


    }

    public function deleteWithChildren($id){

        $req = $this->pdo->prepare('SELECT * FROM comments WHERE id = ?');

        $req->execute([$id]);

        $comments = $req->fetch();

        $comments = $this->findAllWithChildren($comment->post_id);


        //supprime le commentaire

        $this->pdo->prepare('UPDATE FROM comments WHERE id = ?')->execute([$id]);

        //Monte les enfants

        $this->pdo->prepare('UPDATE comments SET parent_id = ? WHERE parent_id = ?')->execute([$comment->parent_id, $comment->id]);



    }
}