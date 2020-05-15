<?php

namespace ProjetBlog\core\Router;


/**
 * Class Router
 */
class Router
{
    /**
     * Tableau associatif des routes
     * @var array
     */
    protected array $routes = [];

    /**
     * Paramètres des routes matchées
     * @var array
     */
    protected array $params = [];

    public function __construct()
    {
        // Récupération des routes existantes
        /*
         * TODO : Voir s'il faut tablir les routes dans config
         * JE NE SAIS PAS ENCORE GERER LES PARAMTRES SUR LES ROUTES
         * ENLEVER TOUS LES PARAMETRES ?? COGITER ENCORE
         * */
    }


    /**
     * Ajout d'une route
     * @param $route
     * @param $param
     */
    public function add($route, $param) {
        // Converti la route avec une regex
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1/>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $param;
    }

    /**
     * Match la route avec les routes existantes,
     * paramétrant les paramètres si une route est trouvée
     * @return bool
     */
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // Parcours les routes existantes
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if(is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {
            // Chemin à vérifier
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    // Déterminer par la suite...
                    // Error 404
                }
            } else {
                // Error 404
            }
        } else {
            // Error 404
        }
    }










   /* public function run(array $param) {

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
    }*/
}