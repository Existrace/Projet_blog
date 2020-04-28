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

    public function countComments($id_post)
    {
        $req = "SELECT COUNT(*) FROM comment WHERE ID_post = $id_post";
        $req = $this->_connexion->query($req);
        return $req->fetch();
    }

    public function createComment($email, $content, $idPost)
    {
        $sql = "INSERT INTO comment ( Comment_Email, Comment_Content, Comment_Date, ID_post)
        VALUES (:email, :content, NOW(), :idPost)";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':email', $email);
        $req->bindValue(':content', $content);
        $req->bindValue(':idPost', $idPost);

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->_connexion->errorInfo();
        }
    }


    public function deleteComment($id)
    {
        $req = "DELETE FROM comment where ID_comment = '$id'";
        $this->_connexion->exec($req);
    }
}