<?php


class Post extends Controller {

    /* Action qui affiche la liste des articles */
    public function index() {
        $this->loadModel("PostManager");
        echo "Bienvenue sur l'accueil";
    }
}