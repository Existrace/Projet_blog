<?php

require_once("models/Manager/CommentManager.php");

class Comment extends Controller
{
    /*
    Méthode appellée dans la vue post/show
    */
    public function createcomments($slug, $ID_post) {
        $commentManager = new CommentManager();
        // Récupération des données pour la création d'un commentaire
        if(isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['content'])){
            $nickname = $_POST['nickname'];
            $content = $_POST['content'];
            $commentManager->createComment($nickname, $content , $ID_post);
            $commentManager->getCommentsByPost($ID_post);

            // Reviens à l'article initial (Contrôleur post)
            header('Location:/post/show/'.$slug);
        }
    }
}