<?php


class CommentManager extends Model
{

    public function getComments() {
        $req = "SELECT Comment_Email, Comment_Content, Comment_Date, ID_post FROM comment";
        $req = $this->_connexion->query($req);
        return $req->fetchAll();
    }

    public function getCommentById($id) {

        $req = $this->_connexion->prepare("SELECT ID_comment, Comment_Email, Comment_Content, Comment_Date, ID_post 
        FROM comment where ID_comment = ?");
        $req->execute(array($id));
        return $req->fetch();
    }

    public function createComment($email, $content, $date, $idPost) {
        $req = $this->_connexion->prepare("INSERT INTO comment ( Comment_Email, Comment_Content, Comment_Date, ID_post)
        VALUES ('$email', '$content', '$date', '$idPost')");
        $this->_connexion->exec($req);
    }

    public function updateComment($id, $content, $date)  {
        $req = "UPDATE comment set 
        Comment_Content = '$content', Comment_Date = '$date' where ID_post = '$id'";
        $this->_connexion->exec($req);
    }

    public function deleteComment($id) {
        $req = "DELETE FROM comment where ID_comment = '$id'";
        $this->_connexion->exec($req);
    }
}