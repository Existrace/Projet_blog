<?php


abstract class Model
{
    /**
     * @var PDO
     */
    protected $_connexion;
    private $_host = "localhost";
    private $_bdd = "blog_jean";
    private $_user = "root";
    private $_password = "";

    /*// Propriétés contenant les informations de requêtes
    public $table;
    public $id;*/

    public function __construct() {
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->_host . ";dbname=" .
                    $this->_bdd, $this->_user, $this->_password);
            $this->_connexion->query("SET CHARACTER SET utf8");
        }
        catch (Exception $e){
            die("Erreur Bdd : " . $e->getMessage());
        }
    }

}