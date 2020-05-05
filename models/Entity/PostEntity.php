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
    public function getDateCreation()
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

}