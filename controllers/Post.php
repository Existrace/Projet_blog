<?php

/* Améliorer avec spl_autoload_register */
require_once("models/PostManager.php");
require_once("models/CommentManager.php");

class Post extends Controller {

    /**
     * Fonction affichant tous les billets deblog
     */
    public function index() {
        $postManager = new PostManager();
        // Récupération des billets de blog
        $posts = $postManager->getPosts();

        $this->render('index', ['posts' => $posts]);
    }

    /*
     * Fonction affichant un billet de blog selon son id
     * */
    public function show($slug) {

        $postManager = new PostManager();
        $commentManager = new CommentManager();
        // Récupération du billet en paramètre (id)

        $post = $postManager->getPostBySlug($slug);
        $id =  $post["ID_post"];

        // Récupère les commentaires du post
        $comments = $commentManager->getComments($id);

        // Essaye de récupérer les données du formulaire de commentaire
        if (isset($_POST["submit"])) {
            echo "truc";
        }

        $this->render('show', compact("post", "comments"));
    }
}