<?php

namespace ProjetBlog;

use Post;
use ProjetBlog\Services as S;

// Genère une constante contenant le chemin vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define('ROOT_PATH', __DIR__ . '/');

// Appelle le modèle et le contrôleur principal
require_once(ROOT . 'app/Model.php');
require_once(ROOT . 'app/Controller.php');

try
{
    // Lancement autoloader
    require "services/Loader.php";
    $loader = S\Loader::getInstance();
    $loader->init();
}
catch (\Exception $oE)
{
    echo $oE->getMessage();
}

// Démarre la session pour la connexion admin
session_start();

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

    if (method_exists($controller, $action)) {
        unset($param[0]);
        unset($param[1]);

        // On appelle la méthode
        call_user_func_array([$controller, $action], $param);
        //$controller->$action();

    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        require_once("views/404page.php");
    }
} else {
    // Si aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT . 'controllers/Post.php');

    // Instantiation du contrôleur
    $controller = new Post();

    $controller->index();

}



