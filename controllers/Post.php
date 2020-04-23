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
    public function show($id) {

        $postManager = new PostManager();
        // Récupération du billet en paramètre (id)
        $post = $postManager->getPostById($id);

        $this->render('show', compact("post"));
    }
}