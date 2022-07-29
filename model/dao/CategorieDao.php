<?php
require_once "Connexion.php";
require_once dirname(__FILE__) . "/../domaine/Categorie.php";
class CategorieDao
{
   private $bd;

   public function __construct()
   {
      $this->bd = (new Connexion())->getConnexion();
   }
   public function getCategorie()
   {
      $req = "select * from categorie";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_CLASS, 'Categorie');
      return $data;
   }
   public function updateCategorie($category){
      $req = "update categorie set nom = ? where id = ? ";
      $stmt = $this->bd->prepare($req);
      return $stmt->execute([$category->nom,$category->id]);

   }
   public function deleteCategorie($id){
      $req = "delete from categorie where id = ?";
      $stmt = $this->bd->prepare($req);
      return $stmt->execute([$id]);

   }
   public function addCategorie($category){
      $req = "insert into categorie(nom) value(?)";
      $stmt = $this->bd->prepare($req);
      return $stmt->execute([$category]);
   }
   
   
}
