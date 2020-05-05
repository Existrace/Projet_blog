<?php


class PostManager extends Model
{

    public function getPosts() {
        $req = "SELECT ID_post, title, Post_Content, Post_Date, slug, image, (SELECT count(comment.ID_comment) 
        FROM comment WHERE comment.ID_post=post.ID_post) AS nb_comments FROM post ORDER BY Post_Date DESC";
        $req = $this->_connexion->query($req);
        return $req->fetchAll();

    }

    public function getPostById($id) {
        $req = $this->_connexion->prepare("SELECT * FROM post where ID_post = ?");
        $req->execute(array($id));
        return $req->fetch();
    }

    /*
     * @param string $slug
     */
    public function getPostBySlug($slug) {
        $req = $this->_connexion->prepare("SELECT * FROM post where slug = ?");
        $req->execute(array($slug));
        return $req->fetch();
    }


    public function createPost($title, $content, $idAuthor, $slug, $image) {
        $sql = "INSERT INTO post (title, Post_Content, Post_Date, ID_Admin, slug, image)
        VALUES (:title, :content, NOW(), :idadmin, :slug, :image)";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':idadmin', $idAuthor);
        $req->bindValue(':slug', $slug);
        $req->bindValue(':image', $image);

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->_connexion->errorInfo();
        }
    }


    public function updatePost($id, $title, $content, $slug, $image)  {

        $sql = "UPDATE post set title = :title, Post_Content = :content, slug = :slug, image = :image  where ID_post = :id";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':slug', $slug);
        $req->bindValue(':id', $id);
        $req->bindValue(':image', $image);

        $modified = $req->execute();

        if(!$modified){
            echo "Erreur modification" . $this->_connexion->errorInfo();
        }
    }

    public function deletePost($id) {
        $req = "DELETE FROM post where ID_post = '$id'";
        $this->_connexion->exec($req);
    }
}