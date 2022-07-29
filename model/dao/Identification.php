<?php
require_once "Connexion.php";

class Identification{
    private $bd;

   public function __construct()
   {
      $this->bd = (new Connexion())->getConnexion();
   }

    public function getUsers() {
        $req = "select * from user";
        $stmt = $this->bd->query($req);
        return $stmt->fetchAll(PDO::FETCH_OBJ);   
    }


}