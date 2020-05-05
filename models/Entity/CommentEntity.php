<?php


class CommentEntity
{
    /*Attributs */
    private $_id;
    private $_nickname;
    private $_content;
    private $_date;
    private $_post;
    private $_flag;

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
    public function getNickname()
    {
        return $this->_nickname;
    }

    /**
     * @param $email
     */
    public function setNickname($email)
    {
        $this->_nickname = $email;
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
    public function getPost()
    {
        return $this->_post;
    }

    /**
     * @param $post
     */
    public function setPost($post)
    {
        $this->_post = $post;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->_flag;
    }

    /**
     * @param $flag
     */
    public function setFlag($flag)
    {
        $this->_flag = $flag;
    }


}