<?php

namespace ProjetBlog\core\Router;

use Post;

/**
 * Class Router
 */
class Router
{
    /**
     * @param array $param
     */
    public function run(array $param) {

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
                require_once("app/views/404page.php");
            }
        } else {
            // Si aucun paramètre n'est défini
            // On appelle le contrôleur par défaut
            require_once(ROOT . '/app/controllers/Post.php');

            // Instantiation du contrôleur
            $controller = new Post();

            $controller->index();

        }
    }
}