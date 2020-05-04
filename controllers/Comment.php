<?php

require_once("models/CommentManager.php");

class Comment extends Controller
{
    /*
    Méthode appellée dans la vue post/show
    */
    public function createcomments($slug, $ID_post) {
        $commentManager = new CommentManager();
        // Récupération des données pour la création d'un commentaire
        if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['content'])){
            $email = $_POST['email'];
            $content = $_POST['content'];
            $commentManager->createComment($email, $content , $ID_post);
            $commentManager->getComments($ID_post);

            // Reviens à l'article initial (Contrôleur post)
            header('Location:/post/show/'.$slug);
        }
    }
}