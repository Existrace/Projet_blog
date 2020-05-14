<?php


class PostEntity
{
    /*Attributs */
    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_user;
    private $_slug;
    private $_image;
    private ?array $_commentaires = [];

    /* Constructeur */
    public function __construct($id, $title, $contenu, $dateCreation,
                                $user = null, $slug = null, $image = null, $commentaires = null)
    {
        $this->_id = $id;
        $this->_title = $title;
        $this->_content = $contenu;
        $this->_date = $dateCreation;
        $this->_user = $user;
        $this->_slug = $slug;
        $this->_image = $image;
        $this->_commentaires = $commentaires;
    }


    /* Setters & Getters */

    /**
     * @return mixed
     */
    public function getId(){
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
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->_content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->_slug;
    }

    /**
     * @param $slug
     */
    public function setSlug($slug)
    {
        $this->_slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }


    /**
     * @return array|null
     */
    public function getCommentaires(){
        return $this->_commentaires;
    }

    /**
     * @param $commentaires
     */
    public function setCommentaires($commentaires)
    {
        $this->_commentaires[] = $commentaires;
    }

    /* Méthodes */


    /**
     * Retourne le nombre de commentaires d'un article
     * @return int
     */
    public function getNumberCommentaires(){
        return count($this->_commentaires);
    }

}