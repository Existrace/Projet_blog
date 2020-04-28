<?php

require_once("models/AdminUserManager.php");
require_once("models/PostManager.php");
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

                // Enregistrement des ident en tant que vaiable de session
                $_SESSION['login'] = $admin = $_POST['admin'];
                $_SESSION['pwd'] = $admin = $_POST['pass'];

                $this->index();

            } else {
                ECHO "Echec authentification";
            }
        }

        $this->render('login');
    }


    public function index()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

            $postManager = new PostManager();
            // Récupération et affichage des articles dans la vue
            $posts = $postManager->getPosts();

            $this->render('index', ['idents' => $_SESSION, 'posts' => $posts]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

    public function create()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

            // Création de l'article
            $postManager = new PostManager();
            // Récupération des données pour la création d'un article
            if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])) {

                // Récupération de l'id de l'admin connecté
                $adminManager = new AdminUserManager();

                $title = $_POST['title'];
                $content = $_POST['content'];
                $slug = Miscellaneous::slugify($title);
                $idAdmin = $adminManager->getIdUser($_SESSION['login']);

                $postManager->createPost($title, $content, $idAdmin[0], $slug);
                echo "Succès création article";
                $this->render("create");
            }

            $this->render('create', ['idents' => $_SESSION]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }

    }

    public function logout()
    {
        /* session_unset ();
         // Destruction de la session
         session_destroy ();

         $this->index();*/
    }
}