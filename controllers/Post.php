<?php

/* Améliorer avec spl_autoload_register */
require_once("models/PostManager.php");
require_once("models/CommentManager.php");


class Post extends Controller {

    /**
     * Fonction affichant tous les billets deblog
     * @param bool $logout
     */
    public function index($logout = false) {

        $postManager = new PostManager();

        // Récupération des billets de blog
        $posts = $postManager->getPosts();

        // Gère la déconnexion
        if($logout != false) {
            session_unset ();
            // Destruction de la session
            session_destroy ();
        }

        $this->render('index', compact("posts"));
    }

    /*
     * Fonction affichant un billet de blog selon son id
     * */
    public function show($slug, $ID_comment = null) {

        $postManager = new PostManager();
        $commentManager = new CommentManager();
        // Récupération du billet en paramètre (id)

        $post = $postManager->getPostBySlug($slug);
        $id =  $post["ID_post"];

        // Récupère les commentaires du post concerné
        $comments = $commentManager->getComments($id);

        // Si le lien pour le signalement d'un commentaire a été cliqué
        if ($ID_comment != null) {
            $commentManager->reportComment($ID_comment);
            $ID_comment = null;
            $this->show($slug);
        }

        // Récupération des données pour la création d'un commentaire
        if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['content'])){
            $email = $_POST['email'];
            $content = $_POST['content'];
            $commentManager->createComment($email, $content , $id);
            $comments = $commentManager->getComments($id);
            $this->render('show', compact("post", "comments"));
        }

        $this->render('show', compact("post", "comments"));
    }

}