<?php

require("modelePDO.php");

class PostManager
{
    /* Read */
    public function getPosts() {
        $db = modelePDO::getPdo();
        return $db->query("SELECT title, Post_Content, Post_Date FROM Post");
    }

    public function getPostById($id) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("SELECT title, Post_Content, Post_Date FROM post where ID_post = ?");
        $req->execute(array($id));
        return $req->fetch();
    }

    /* Create */
    public function createPost($title, $content, $date, $author) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("INSERT INTO post (title, post_content, post_date, id_admin)
        VALUES ('$title', '$content', '$date', '$author')");
        $db->exec($req);
    }

    /* Update */
    public function updatePost($id, $title, $content)  {
        $db = modelePDO::getPdo();
        return $db->query("UPDATE post set 
        title = '$title', Post_Content = '$content' where ID_post = '$id'");
    }

    /* Delete */
    public function deletePost($id) {
        $db = modelePDO::getPdo();
        return $db->query("DELETE FROM post where ID_post = '$id'");
    }
}