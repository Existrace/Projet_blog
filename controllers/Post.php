<?php

/* Améliorer avec spl_autoload_register */
require_once("models/Manager/PostManager.php");
require_once("models/Manager/CommentManager.php");
require_once("models/Entity/PostEntity.php");


class Post extends Controller {

    /**
     * Fonction affichant tous les billets de blog
     */
    public function index() {

        // Création d'une instance pdo
        $db = Model::getPdo();
        // A chaque manager, on passera en paramètre l'instance de pdo

        $postManager = new PostManager($db);

        // Récupération des billets de blog
        $posts = $postManager->getPosts();

        $this->render('index', compact("posts"));
    }

    /*
     * Fonction affichant un billet de blog selon son id
     * */
    public function show($slug, $ID_comment = null) {

        // Création d'une instance pdo
        $db = Model::getPdo();

        // Appel des managers
        $postManager = new PostManager($db);
        $commentManager = new CommentManager($db);

        /** @var PostEntity $post */
        $post = $postManager->getPostBySlug($slug);

        /** @var CommentEntity $comments */
        $comments = $post->getCommentaires();

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

        // Création d'une instance pdo
        $db = Model::getPdo();

        $postManager = new PostManager($db);
        // Gestion suppression d'un post
        if ($ID_post != null) {
            // Suppression d'un post
            $postManager->deletePost($ID_post);
            header('Location:/admin/index');
        }
    }

}