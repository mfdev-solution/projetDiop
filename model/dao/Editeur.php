<?php
require_once "Connexion.php";

require_once dirname(__FILE__) . "/../domaine/EditeurDomaine.php";
class Editeur{

    protected $bd;

    public function __construct()
    {
      $this->bd = (new Connexion())->getConnexion();
    }
    //lister, ajouter, supprimer ou modifier

    //$nom, $role, $login, $passwd, $prenom
    public function listArticle(){
      $req = "select * from article";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_OBJ);
      return $data;
    }
    public function ajouterArticle($art){
        $req =  "insert into article (titre,id_cat,categorie,contenu,dateCreation,dateModification) values(?,?,?,?,?,?)";
        $stmt = $bd->prepare($req);
        return $stmt->execute([$art->nom,$art->prenom,$art->login,$art->login,$art->password,$art->role]);

    }
    public function supprimerArticle($id){
        $req = "delete from article WHERE id = ?";
        return $this->bd->prepare($req)->execute([$id]);

    }
    public function modifierArticle($id,$art){
        $req = "update article set titre=?,id_cat=?,categorie=?,contenu=?,dateCreation=?,dateModification=? where id = ?";
        $stmt = $bd->prepare($req);
        return $stmt->execute([$art->titre,$art->id_cat,$art->categorie,$art->contenu,$art->dateCreation,$art->dateModification,$id]);


    } 

    //fonction liees aux categories
    public function listCategorie(){
        $req = "select * from categorie";
        $resutl = $this->bd->query($req);
        return $resutl->fetchAll(PDO::FETCH_OBJ);

    }
    public function ajouterCategorie($categorie){
        $req = "insert into categorie (nom)value(?)";
        $stmt = $bd->prepare($req);
        return $stmt->execute($categorie->nom);

    }
    public function supprimerCategorie(){

        $req = "delete from categorie WHERE id = ?";
        return $this->bd->prepare($req)->execute([$id]);

    }
    public function modifierCategorie($id , $cat){
        $req = "update categorie set nom=? where id=?";
        $stmt = $bd->prepare($req);
        return $stmt->execute([$cat->nom,$id]);
    } 


}