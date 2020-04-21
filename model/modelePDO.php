<?php


class modelePDO
{
    /**
     * @var PDO
     */
    private static $pdo;
    private static $serveur = "mysql:host=localhost";
    private static $_bdd = "blog_jean";
    private static $_user = "root";
    private static $_mdp = "";

    private function __construct(){
        modelePDO::$pdo = new PDO(modelePDO::$serveur.';'.modelePDO::$_bdd, modelePDO::$_user, modelePDO::$_mdp);
        modelePDO::$pdo->query("SET CHARACTER SET utf8");
    }

    public static function getPdo(){
        if(modelePDO::$pdo==null){
            modelePDO::$pdo= new modelePDO();
        }
        return modelePDO::$pdo;
    }


}