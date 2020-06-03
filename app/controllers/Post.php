<?php

use ProjetBlog\Services\Utils;
require_once("services/Utils.php");

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

    /*
       Méthode pour créer un article en mode admin
    */
    public function create()
    {
        if (isset($_SESSION['login'])) {
            if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                // Création d'une instance pdo
                $db = Model::getPdo();
                $adminManager = new AdminUserManager($db);
                $postManager = new PostManager($db);

                date_default_timezone_set('Europe/Paris');

                // Récupération des données du formulaire
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $date = date('Y-m-d G-H-s');
                $idAdmin = $adminManager->getUser($_SESSION['login'])->getId();
                $slug = Utils::slugify($title);
                $image = htmlspecialchars($_POST['image']);

                $post = new PostEntity(null, $title, $content, $date, $idAdmin, $slug, $image);
                $postManager->createPost($post);

                header('Location:/admin/index');
            }
            $this->render('create', ['idents' => $_SESSION]);
        }
    }

    public function update($ID_post)
    {

        // Création d'une instance pdo
        $db = Model::getPdo();
        $adminManager = new AdminUserManager($db);
        $postManager = new PostManager($db);

        if (isset($_SESSION['login'])) {
            // Récupération des données pour la modification d'un article
            if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                // Modification d'un article
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $date = date('Y-m-d G-H-s');
                $idAdmin = $idAdmin = $adminManager->getUser($_SESSION['login'])->getId();
                $slug = Utils::slugify($title);
                $image = htmlspecialchars($_POST['image']);

                // Objet post à mettre à jour
                $postToUpdate = new PostEntity($ID_post, $title, $content, $date, $idAdmin, $slug, $image);
                // Récupération du post à modifier
                /** @var PostEntity $post */

                $postManager->updatePost($postToUpdate);
                // Redirection accueil principale
                header('Location:/admin/index');
            }

            // A TRANSFORMER EN OBJET
            // Il faut retrouver l'article à modifier
            $post = $postManager->getPostById($ID_post);

            $this->render("update", compact("post"));

        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }
}
