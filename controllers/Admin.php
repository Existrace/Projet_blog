<?php

require_once("models/AdminUserManager.php");

class Admin extends Controller
{
    public function index() {

        // Connexion administrateur
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin'])){
            $admin = $_POST['admin'];
            $pass = $_POST['pass'];

            $adminUserManager = new AdminUserManager();

            // Réussite connexion
            if($adminUserManager->getUser($admin, $pass)){
                echo "Connexion réussie";
                $this->render('create');

            }else {
                ECHO "Echec authentification";
            }

        }

        $this->render('index');
    }


    public function create() {


        $this->render('create');
    }
}