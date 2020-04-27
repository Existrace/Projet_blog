<?php


class CommentManager extends Model
{
    /* Récupère les commentaires d'un post passé en paramètre */
    public function getComments($id_post) {
        $req = "SELECT * FROM comment WHERE ID_post = $id_post";
        $req = $this->_connexion->query($req);
        return $req->fetchAll();
    }

    public function countComments($id_post) {
        $req = "SELECT COUNT(*) FROM comment WHERE ID_post = $id_post";
        $req = $this->_connexion->query($req);
        return $req->fetch();
    }

    public function createComment($email, $content, $idPost) {
        $comments = $this->_connexion->prepare("INSERT INTO comment ( Comment_Email, Comment_Content, Comment_Date, ID_post)
        VALUES ('$email', '$content', NOW(), '$idPost')");
        return $comments->execute(array($email, $content, $idPost));
    }


    public function deleteComment($id) {
        $req = "DELETE FROM comment where ID_comment = '$id'";
        $this->_connexion->exec($req);
    }
}