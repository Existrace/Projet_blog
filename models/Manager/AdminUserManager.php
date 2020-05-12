<?php

class AdminUserManager extends ManagerMaster
{

    /* Vérifier si l'utilisateur existe */
    public function verifyUser($user) {
            $req = $this->bdd->prepare("SELECT * FROM adminuser WHERE Username = :user");
            $req->bindValue(':user', $user, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch();

            if($data){
                return true;
            }else{
                return false;
            }
    }

    public function getUser($user) {
        $req = $this->bdd->prepare("SELECT * FROM adminuser WHERE Username = :user");
        $req->bindValue(':user', $user);
        $req->execute();
        $data = $req->fetch();
        return new AdminUserEntity($data['ID_Admin'], $data['Username'], $data['Password'], $data['User_Email']);
    }
}