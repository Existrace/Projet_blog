<?php

require_once("models/Manager/AdminUserManager.php");
require_once("models/Manager/PostManager.php");
require_once("models/Manager/CommentManager.php");
require_once("Services/Miscellaneous.php");

class Admin extends Controller
{
    public function login()
    {
        // Connexion administrateur
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])) {
            $admin = $_POST['admin'];
            $pass = $_POST['pass'];

            $adminUserManager = new AdminUserManager();

            // Si les identifiants existent dans la base de données
            if ($adminUserManager->getUser($admin, $pass)) {

                // Enregistrement de l'ident en tant que vaiable de session
                $_SESSION['login'] = $admin = $_POST['admin'];

                header('Location:/admin/index');

            } else {
                ECHO "Echec authentification";
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        // Gère la déconnexion
        session_unset();
        // Destruction de la session
        session_destroy();

        // Redirection accueil principale
        header('Location:/post/index');

    }

    public function index()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login'])) {

            $postManager = new PostManager();
            // Récupération et affichage des articles dans la vue
            $posts = $postManager->getPosts();

            $this->render('index', ['idents' => $_SESSION, 'posts' => $posts]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

    public function moderatecomments($ID_comment = null)
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login'])) {

            // Récupération des données pour la création d'un article
            $commentManager = new CommentManager();
            $comments = $commentManager->getAllComments();

            // Gestion suppression d'un commentaire
            if ($ID_comment != null) {
                // Suppression commentaire
                $commentManager->deleteComment($ID_comment);
                $this->moderatecomments();
            }

            $this->render('moderatecomments', ['idents' => $_SESSION, 'comments' => $comments]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }


    /*
        Méthode pour créer un article en mode admin
     */
    public function create()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login'])) {

            // Création de l'article
            $postManager = new PostManager();
            // Récupération des données pour la création d'un article
            if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                // Récupération de l'id de l'admin connecté
                $adminManager = new AdminUserManager();

                $title = $_POST['title'];
                $content = $_POST['content'];
                $slug = Miscellaneous::slugify($title);
                $image = $_POST['image'];
                $idAdmin = $adminManager->getIdUser($_SESSION['login']);

                $postManager->createPost($title, $content, $idAdmin[0], $slug, $image);
                // Redirection accueil principale
                header('Location:/admin/index');
            }

            $this->render('create', ['idents' => $_SESSION]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

    public function update($ID_post)
    {
        if (isset($_SESSION['login'])) {

            $postManager = new PostManager();

            // Récupération des données pour la modification d'un article
            if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                // Modification d'un article

                $title = $_POST['title'];
                $content = $_POST['content'];
                $slug = Miscellaneous::slugify($title);
                $image = $_POST['image'];

                $postManager->updatePost($ID_post, $title, $content, $slug, $image);
                //echo "Succès modification article";
                // Redirection accueil principale
                header('Location:/admin/index');
            }

            // Il faut retrouver l'article à modifier
            $post = $postManager->getPostById($ID_post);

            $this->render("update", compact("post"));

        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

}