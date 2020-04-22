<?php

/* Améliorer avec spl_autoload_register*/
require_once("models/PostManager.php");
require_once("models/CommentManager.php");

class Post extends Controller {

    /* Action qui affiche la liste des billets de blogs  */
    public function index() {
        $postManager = new PostManager();
        // Récupération des billets de blog
        $posts = $postManager->getPosts();

        $this->render('index', ['posts' => $posts]);
    }
}