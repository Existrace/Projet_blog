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

    public function moderatecomments($ID_comment = null)
    {
        // Vérifier si un administrateur est connecté
        if (isset($_SESSION['login'])) {

            // Création d'une instance pdo
            $db = Model::getPdo();

            // Récupération des données pour la création d'un article
            $commentManager = new CommentManager($db);
            $postManager = new PostManager($db);
            $comments = $commentManager->getAllComments();

            // Récupération du titre de post du commentaire concerné
            foreach($comments as $value) {
               $numPost = $value->getPost();
               $post = $postManager->getPostById($numPost);
               $titlePost = $post->getTitle();
               $value->setPost($titlePost);
            }

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
                $date = htmlspecialchars(date('Y-m-d G-H-s'));
                $idAdmin = htmlspecialchars($adminManager->getUser($_SESSION['login']));
                $slug = Miscellaneous::slugify($title);
                $image = htmlspecialchars($_POST['image']);

                $post = new PostEntity(null, $title, $content, $date, $idAdmin[0], $slug, $image);
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
                $date = htmlspecialchars(date('Y-m-d G-H-s'));
                $idAdmin = htmlspecialchars($adminManager->getUser($_SESSION['login']));
                $slug = Miscellaneous::slugify($title);
                $image = htmlspecialchars($_POST['image']);

                // Objet post à mettre à jour
                $postToUpdate = new PostEntity($ID_post, $title, $content, $date, $idAdmin[0], $slug, $image);
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