<?php


class CommentManager
{
    /* Read */
    public function getComments() {
        $db = modelePDO::getPdo();
        return $db->query("SELECT Comment_Email, Comment_Content, Comment_Date, ID_post FROM comment");
    }

    public function getCommentById($id) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("SELECT ID_comment, Comment_Email, Comment_Content, Comment_Date, ID_post 
        FROM comment where ID_comment = ?");
        $req->execute(array($id));
        return $req->fetch();
    }

    /* Create */
    public function createComment($email, $content, $date, $idPost) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("INSERT INTO comment ( Comment_Email, Comment_Content, Comment_Date, ID_post)
        VALUES ('$email', '$content', '$date', '$idPost')");
        $db->exec($req);
    }

    /* Update */
    public function updateComment($id, $content, $date)  {
        $db = modelePDO::getPdo();
        $req = $db->prepare("UPDATE comment set 
        Comment_Content = '$content', Comment_Date = '$date' where ID_post = '$id'");
        $db->exec($req);
    }

    /* Delete */
    public function deleteComment($id) {
        $db = modelePDO::getPdo();
        return $db->query("DELETE FROM comment where ID_comment = '$id'");
    }
}