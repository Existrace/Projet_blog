<?php

require("modelePDO.php");

class PostManager
{
    /* Read */
    public function getPosts() {
        $db = modelePDO::getPdo();
        return $db->query("SELECT title, Post_Content, Post_Date FROM Post");
    }

    public function getPostsById($id) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("SELECT title, Post_Content, Post_Date FROM post where ID_post = ?");
        $req->execute(array($id));
        return $req->fetch();
    }

    public function createPosts($title, $content, $date, $author) {
        $db = modelePDO::getPdo();
        $req = $db->prepare("INSERT INTO post (title, post_content, post_date, id_admin)
        VALUES ('$title', '$content', '$date', '$author')");
    }

    public function updatePosts($id, $title, $content)  {
        $db = modelePDO::getPdo();
        $req = $db->prepare("UPDATE post set 
        title = '$title', Post_Content = '$content' where ID_post = '$id'");
    }

    public function deletePosts($id) {
        $db = modelePDO::getPdo();
        return $db->query("DELETE FROM post where ID_post = '$id'");

    }


}