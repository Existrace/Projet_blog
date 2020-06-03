<?php

use ProjetBlog\Services\Utils;

require_once("services/Utils.php");

/**
 * Contrôleur gérant la connexion et le lien avec les contrôleurs
 * de Post et Comment
 */
class Admin extends Controller
{
    public function login()
    {
        // Connexion administrateur
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])) {
            $login = htmlspecialchars($_POST['admin']);
            $pass = htmlspecialchars($_POST['pass']);
            // Création d'une instance pdo
            $db = Model::getPdo();

            $adminUserManager = new AdminUserManager($db);

            // Si les identifiants existent dans la base de données
            if ($adminUserManager->verifyUser($login)) {
                // Récupération d'une instance d'AdminUser correspondant au login
                $admin = $adminUserManager->getUser($login);
                if(password_verify($pass, $admin->getPassword())) {
                    // Enregistrement de l'ident en tant que variable de session
                    $_SESSION['login'] = $login;

                    header('Location:/admin/index');
                }else{
                    echo "Le mot de passe ne correspond pas.";
                }
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

            // Création d'une instance pdo
            $db = Model::getPdo();

            $postManager = new PostManager($db);
            // Récupération et affichage des articles dans la vue
            $posts = $postManager->getPosts();

            $this->render('index', ['idents' => $_SESSION, 'posts' => $posts]);
        } else {
            // Sinon, interdire l'accès à la page
            $this->render('errorsession');
        }
    }

}
