<?php


class CommentManager extends Model
{
    /* Récupère les commentaires d'un post passé en paramètre */
    public function getComments($id_post)
    {
        $req = "SELECT * FROM comment WHERE ID_post = $id_post";
        $req = $this->_connexion->query($req);
        return $req->fetchAll();
    }


    public function getAllComments()
    {
        $req = "SELECT ID_comment, Nickname, Comment_Content, Comment_Date, flag_reporting, title 
        FROM comment
        INNER JOIN post ON comment.ID_post = post.ID_post ORDER BY flag_reporting DESC, title";
        $req = $this->_connexion->query($req);
        return $req->fetchAll();
    }


    public function createComment($nickname, $content, $idPost)
    {
        $sql = "INSERT INTO comment ( Nickname, Comment_Content, Comment_Date, ID_post)
        VALUES (:nickname, :content, NOW(), :idPost)";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':nickname', $nickname);
        $req->bindValue(':content', $content);
        $req->bindValue(':idPost', $idPost);

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->_connexion->errorInfo();
        }
    }

    public function reportComment($id) {
        $sql = "UPDATE comment set flag_reporting = true where ID_comment = :id";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':id', $id);

        $modified = $req->execute();

        if(!$modified){
            echo "Erreur modification" . $this->_connexion->errorInfo();
        }
    }

    public function deleteComment($id)
    {
        $req = "DELETE FROM comment where ID_comment = '$id'";
        $this->_connexion->exec($req);
    }
}