<?php

require_once("models/Entity/CommentEntity.php");
require_once("models/Manager/ManagerMaster.php");

class CommentManager extends ManagerMaster
{
    /* Récupère les commentaires d'un post passé en paramètre */
    public function getCommentsByPost($id_post)
    {
        $req = "SELECT * FROM comment WHERE ID_post = $id_post";
        $req = $this->bdd->query($req);
        return $req->fetchAll();
    }


    public function getAllComments()
    {
        $req = "SELECT * FROM comment ORDER BY flag_reporting DESC";
        $result = $this->bdd->query($req);

        // Tableau qui va contenir tous les commentaires
        $comments = [];

        foreach($result as $value){
            $comments[] = new CommentEntity($value['ID_comment'], $value['Nickname'],
                $value['Comment_Content'], $value['Comment_Date'], $value['ID_post'],
                $value['flag_reporting']);
        }

        return $comments;
    }


    public function createComment(CommentEntity $comment)
    {
        $sql = "INSERT INTO comment ( Nickname, Comment_Content, Comment_Date, ID_post)
        VALUES (:nickname, :content, :date, :idPost)";

        $req = $this->bdd->prepare($sql);

        $req->bindValue(':nickname', $comment->getNickname());
        $req->bindValue(':content', $comment->getContent());
        $req->bindValue(':date', $comment->getDateCreation());
        $req->bindValue(':idPost', $comment->getPost());

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->bdd->errorInfo();
        }
    }

    public function reportComment($id) {
        $sql = "UPDATE comment set flag_reporting = true where ID_comment = :id";

        $req = $this->bdd->prepare($sql);

        $req->bindValue(':id', $id);

        $modified = $req->execute();

        if(!$modified){
            echo "Erreur modification" . $this->bdd->errorInfo();
        }
    }

    public function deleteComment($id)
    {
        $req = "DELETE FROM comment where ID_comment = '$id'";
        $this->bdd->exec($req);
    }
}