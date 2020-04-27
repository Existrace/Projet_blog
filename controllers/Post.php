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

        $post_data = file_get_contents('php://input');

        /*if (isset($_POST['submit']))
        {
            if (isset($_POST['email'], $_POST['content'])) {
                $email = $_POST['email'];
                $content = $_POST['content'];
                // Création d'un commentaire
                $commentManager->createComment($email, $content , $id);
            }
        }*/

        $this->render('show', compact("post", "comments"));
    }

    /*public function addComment($email, $content, $idPost) {

        $commentManager = new CommentManager();

        $comment = $commentManager->createComment($email, $content, $idPost);
    }*/
}