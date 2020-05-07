<?php

require_once("models/Manager/ManagerMaster.php");
require_once("models/Entity/PostEntity.php");

/*
 *  Manager qui s'occupe de la gestion de l'entité Post
 *  */
class PostManager extends ManagerMaster
{

    public function getPosts() {
        // Récupération de tous les posts
        $req = "SELECT * FROM post";
        $result = $this->bdd->query($req);
        // Tableau qui va contenir tous les posts
        $posts = [];

        // Récupération des commentaires de chaque post
        $commentManager = new CommentManager( $this->bdd);
        foreach($result as $value){
            $comments = $commentManager->getCommentsByPost($value['ID_post']);
            $posts[] = new PostEntity($value['ID_post'], $value['title'], $value['Post_Content'], $value['Post_Date'], $value['ID_Admin'],
            $value['slug'], $value['image'], $comments);
        }

        // Retourne un tableau d'objet Post
        return $posts;
    }

    public function getPostById($id) {
        $req = $this->bdd->prepare("SELECT * FROM post where ID_post = ?");
        $req->execute(array($id));
        $data = $req->fetch();

        // Récupération des commentaires du post
        $commentManager = new CommentManager( $this->bdd);
        $comments = $commentManager->getCommentsByPost($data['ID_post']);

        return new PostEntity($data['ID_post'], $data['title'], $data['Post_Content'], $data['Post_Date'], $data['ID_Admin'],
            $data['slug'], $data['image'], $comments);
    }

    /*
     * @param string $slug
     */
    public function getPostBySlug($slug) {
        $req = $this->bdd->prepare("SELECT * FROM post where slug = ?");
        $req->execute(array($slug));
        $data = $req->fetch();

        // Récupération des commentaires du post
        $commentManager = new CommentManager( $this->bdd);
        $comments = $commentManager->getCommentsByPost($data['ID_post']);

        return new PostEntity($data['ID_post'], $data['title'], $data['Post_Content'], $data['Post_Date'], $data['ID_Admin'],
            $data['slug'], $data['image'], $comments);
    }


    public function createPost(PostEntity $post) {
        $sql = 'INSERT INTO post (title, Post_Content, Post_Date, ID_Admin, slug, image)
        VALUES (:title, :content, :date, :idadmin, :slug, :image)';

        $req = $this->bdd->prepare($sql);

        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':date', $post->getDate());
        $req->bindValue(':idadmin', $post->getUser());
        $req->bindValue(':slug', $post->getSlug());
        $req->bindValue(':image', $post->getImage());

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->bdd->errorInfo();
        }
    }


    public function updatePost(PostEntity $post)  {

        $sql = "UPDATE post 
        set title = :title, Post_Content = :content, slug = :slug, image = :image where ID_post = :id";

        $req = $this->bdd->prepare($sql);

        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':slug', $post->getSlug());
        $req->bindValue(':id', $post->getId());
        $req->bindValue(':image', $post->getImage());

        $modified = $req->execute();

        if(!$modified){
            echo "Erreur modification" . $this->bdd->errorInfo();
        }
    }

    public function deletePost($id) {
        $req = "DELETE FROM post where ID_post = '$id'";
        $this->bdd->exec($req);
    }
}