<?php


class AdminUserManager extends Model
{

    /* Vérifier si l'utilisateur existe */
    public function getUser($user, $mdp) {
            $req = $this->_connexion->prepare("SELECT * FROM adminuser WHERE Username = :user AND Password = :mdp");
            $req->bindValue(':user', $user, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch();

            if($data){
                return true;
            }else{
                return false;
            }
    }

    public function getIdUser($username) {
        $req = $this->_connexion->prepare("SELECT ID_Admin FROM adminuser WHERE Username = :username");
        $req->bindValue(':username', $username);
        $req->execute();
        return $req->fetch();
    }
}