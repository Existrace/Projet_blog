<?php


class model
{
    /**
     * @var PDO
     */
    private static $pdo;
    private static $serveur = "mysql:host=localhost";
    private static $_bdd = "blog_jean";
    private static $_user = "root";
    private static $_mdp = "";

    private function __construct() {
        try{
            model::$pdo = new PDO(model::$serveur.';'.model::$_bdd, model::$_user, model::$_mdp);
            model::$pdo->query("SET CHARACTER SET utf8");
        }
        catch (Exception $e){
            die("Erreur Bdd : " . $e->getMessage());
        }

    }

    public static function getPdo(){
        if(model::$pdo==null){
            model::$pdo= new model();
        }
        return model::$pdo;
    }
}