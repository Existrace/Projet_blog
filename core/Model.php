<?php

/*
    Cette classe sert à créer une instance de PDO
    Pour être appellée dans les contrôleurs
    pour avoir accès à la base de données
*/
class Model
{
    public static PDO $myBd;
    /* Attributs propres à la connexion de la base de donnéesv*/
    private static string $_host = "localhost";
    private static string $_bdd = "blog_jean";
    private static string $_user = "root";
    private static string $_password = "";

    /* Cette méthode a besoin d'être appllée (sans instantiation de la classe)
    pour avoir accès à la base de données
    */
    static function getPdo()
    {
        try {
            self::$myBd = new PDO("mysql:host=" . self::$_host . ";dbname=" .
                self::$_bdd, self::$_user, self::$_password);
            self::$myBd->query("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            die("Erreur Bdd : " . $e->getMessage());
        }

        return self::$myBd;
    }


}