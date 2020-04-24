<?php
// Genère une constante contenant le chemin vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Appelle le modèle et le contrôleur principal
require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');

// Séparation des paramètres pour les mettre dans le tableau $params
$param = explode('/', $_GET['p']);

// Si au moins un paramètre existe
if ($param[0] != "") {
    // Sauvegarde le premier paramètre dans controller
    // ucfirst met la première lettre en majuscule
    $controller = ucfirst($param[0]);

    // Sauvegarde le deuxième paramètre dans $action
    //S'il existe, sinon index
    $action = isset($param[1]) ? $param[1] : 'index';

    // appelle du contrôleur concerné
    require_once(ROOT . 'controllers/' . $controller . '.php');

    // Instanciation du contrôleur
    $controller = new $controller();

    /*if(isset($_POST['email']) && isset($_POST['comment'])) {
        $controller->show($_POST['email'],$_POST['comment']);
    }*/

    if (method_exists($controller, $action)) {
        unset($param[0]);
        unset($param[1]);

        // On appelle la méthode
        call_user_func_array([$controller, $action], $param);
        //$controller->$action();

    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
} else {
    // Si aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT . 'controllers/Post.php');

    // Instantiation du contrôleur
    $controller = new Post();

    $controller->index();

}



