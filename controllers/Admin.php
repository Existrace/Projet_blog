<?php



class Admin extends Controller
{
    public function index() {

        // Ici, connexion administrateur
        // Essai récupération données formulaire

        var_dump($_POST);
        var_dump($_POST['admin']);


        if (isset($_POST['submit'])) {
            echo "Yes";
        }else{
            echo "Nope";
        }

        $this->render('index');
    }

    public function create() {

        
        $this->render('create');
    }
}