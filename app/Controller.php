<?php

/*
 * Contrôleur de base
*/
abstract class Controller {

    /* Moyen d'améliorer avec spl_autoload_register */
    public function loadModel($model) {
        include_once(ROOT.'models/'.$model.'.php');
        $this->$model = new $model();
    }

    /*
     * Fonction permettant la rendu des vues
     */
    public function render($view, $data = []) {
        extract($data);

        // Démarre le buffer de sortie pour le chargement des vues
        ob_start();

        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$view.'.php');

        /** @var string $content */
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'views/layout/default.php');

    }
}