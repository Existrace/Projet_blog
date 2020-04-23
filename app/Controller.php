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
        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$view.'.php');

    }
}