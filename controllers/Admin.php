<?php

require_once("models/AdminUserManager.php");
require_once("models/PostManager.php");

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


    public function index() {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

            $postManager = new PostManager();
            // Récupération et affichage des articles dans la vue
            $posts = $postManager->getPosts();

            $this->render('index', ['idents' => $_SESSION, 'posts' => $posts]);
        }else{
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

    public function create()
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
            $this->render('create', ['idents' => $_SESSION]);
        }else{
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }

    }

    public function logout() {
       /* session_unset ();
        // Destruction de la session
        session_destroy ();

        $this->index();*/
    }
}