<?php
require_once "Connexion.php";

require_once "/var/www/html/projetDiop/model/domaine/EditeurDomaine.php";
require_once  "Editeur.php";
require_once "/var/www/html/projetDiop/services/UserServices.php";

class Admin extends Editeur{
    //private $db;
    //protected $service;
    public function __construct(){
        //$this->db = (new Connexion())->getConnexion();
        parent::__construct();
        
    }

    //create a new user
    public function createUser($user){
        $user->passwd = password_hash($user->passwd ,PASSWORD_DEFAULT);
        $req = "insert into user (nom,prenom,login,passwd,role ) value(?,?,?,?,?)";
        return $this->bd->prepare($req)->execute([$user->nom,$user->prenom,$user->login,$user->passwd,$user->role]);

    }
    //list users
    public function listUsers(){
        $req = "select * from user";
        $stmt = $this->bd->query($req);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //update a user
    public function updateUser($id,$user){
        $req = " update user set nom=?,prenom=?,login=? ,passwd=?,role=? where id=?";
        $stmt = $this->bd->prepare($req);
        return $stmt->execute([$user->nom,$user->prenom,$user->login,$user->passwd,$user->role,$id]);

    }
    //delete a user
    public function deleteUser($id){
        $req = "delete from user where id = ?";
        return $this->bd->prepare($req)->execute([$id]);
    }

}