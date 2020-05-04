<?php

/* Améliorer avec spl_autoload_register */
require_once("models/PostManager.php");
require_once("models/CommentManager.php");


class Post extends Controller {

    /**
     * Fonction affichant tous les billets deblog
     * @param bool $logout
     */
    public function index() {

        $postManager = new PostManager();

        // Récupération des billets de blog
        $posts = $postManager->getPosts();

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

        $this->render('show', compact("post", "comments"));
    }


    /**
     * @param $ID_post
     */
    public function deletepost($ID_post) {

        $postManager = new PostManager();
        // Gestion suppression d'un post
        if ($ID_post != null) {
            // Suppression commentaire
            $postManager->deletePost($ID_post);
            header('Location:/admin/index');
        }
    }

}