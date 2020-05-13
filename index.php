<?php

namespace ProjetBlog;

use ProjetBlog\core\Router\Router;
use ProjetBlog\Services as S;

// Genère une constante contenant le chemin vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Appelle le modèle et le contrôleur principal
require_once(ROOT . 'core/Model.php');
require_once(ROOT . 'core/Controller.php');
require_once(ROOT . 'core/Manager.php');
require_once(ROOT . 'core/Router.php');


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

// Démarre le routeur
$router = new Router();
$router->run($param);



