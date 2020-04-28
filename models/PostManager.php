<?php


class PostManager extends Model
{

    public function getPosts() {
        $req = "SELECT * FROM post ORDER BY Post_Date DESC";
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


    public function createPost($title, $content, $idAuthor, $slug) {
        /*$req = $this->_connexion->prepare
        ("INSERT INTO post (title, post_content, post_date, id_admin)
        VALUES ('$title', '$content', '$date', '$author')");
        $this->_connexion->exec($req);*/

        $sql = "INSERT INTO post (title, Post_Content, Post_Date, ID_Admin, slug)
        VALUES (:title, :content, NOW(), :idadmin, :slug)";

        $req = $this->_connexion->prepare($sql);

        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':idadmin', $idAuthor);
        $req->bindValue(':slug', $slug);

        $inserted = $req->execute();

        if(!$inserted){
            echo "Erreur création" . $this->_connexion->errorInfo();
        }
    }


    public function updatePost($id, $title, $content)  {
        $req = "UPDATE post set title = '$title', Post_Content = '$content' where ID_post = '$id'";
        $this->_connexion->exec($req);
    }

    public function deletePost($id) {
        $req = "DELETE FROM post where ID_post = '$id'";
        $this->_connexion->exec($req);
    }
}