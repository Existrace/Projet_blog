<?php

class Comment extends Controller
{
    /*
    Méthode appellée dans la vue post/show
    */
    public function createcomments($slug, $ID_post) {

        // Création d'une instance pdo
        $db = Model::getPdo();
        $commentManager = new CommentManager($db);

        // Récupération des données pour la création d'un commentaire
        if(isset($_POST['submit']) && !empty($_POST['nickname']) && !empty($_POST['content'])){
            $nickname = htmlspecialchars($_POST['nickname']);
            $content = htmlspecialchars($_POST['content']);
            $date = date('Y-m-d G-H-s');

            // Création d'un objet Comment
            $comment = new CommentEntity(null, $nickname, $content, $date, $ID_post, 0);

            $commentManager->createComment($comment);
            $commentManager->getCommentsByPost($ID_post);

            // Reviens à l'article initial (Contrôleur post)
            header('Location:/post/show/'.$slug);
        }
    }
}