<?php


class AdminUserEntity
{
    /*Attributs */
    private $_id;
    private $_username;
    private $_password;
    private $_email;

    /* Constructeur */
    public function __construct($id = null, $username = null, $password = null, $email = null) {
        $this->_id = $id;
        $this->_username = $username;
        // Il faut penser à hasher le mot de passe
        $this->_password = $password;
        $this->_email = $email;
    }


    /* Setters & Getters */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
 * @return mixed
 */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }


}