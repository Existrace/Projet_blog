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

    /**
     * Comme une méthode ShowAll
     */
    public function moderatecomments()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login'])) {

            // Création d'une instance pdo
            $db = Model::getPdo();

            // Récupération des données pour la création d'un article
            $commentManager = new CommentManager($db);
            $postManager = new PostManager($db);
            $comments = $commentManager->getAllComments();

            // Récupération du titre de post du commentaire concerné
            foreach($comments as $value) {
                $numPost = $value->getPost();
                $post = $postManager->getPostById($numPost);
                $titlePost = $post->getTitle();
                $value->setPost($titlePost);
            }

            $this->render('moderatecomments', ['idents' => $_SESSION, 'comments' => $comments]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->renderError('errorsession');
        }
    }

    /*
     * Supprime un commentaire sélectionné
     */
    public function deleteComment($ID_comment) {

        // Création d'une instance pdo
        $db = Model::getPdo();

        $commentManager = new CommentManager($db);

        // Gestion suppression d'un commentaire
        if ($ID_comment != null) {
            // Suppression commentaire
            $commentManager->deleteComment($ID_comment);
            header('Location:/comment/moderatecomments');
        }
    }
}
