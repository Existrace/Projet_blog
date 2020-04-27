<?php



class Admin extends Controller
{
    public function index() {

        // Ici, connexion administrateur
        // Essai récupération données formulaire

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])){
            echo "Eureka !";
            echo $_POST['admin'];
            echo $_POST['pass'];
        }

        $this->render('index');
    }

    public function create() {


        $this->render('create');
    }
}