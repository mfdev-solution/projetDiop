<?php
require_once "Connexion.php";
require_once dirname(__FILE__) . "/../domaine/Article.php";
class ArticleDao
{
   private $bd;

   public function __construct()
   {
      $this->bd = (new Connexion())->getConnexion();
   }
   public function getAllArticles($debut)
   {
      $req = "select ar.id ,ar.titre,ar.categorie,ar.contenu,cat.nom from article ar , categorie cat where  cat.id = ar.id_cat order by ar.dateCreation desc limit $debut,6";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_OBJ);
      return $data;
   }
   public function getArticleByCat($categ,$limit)
   {
      $req = "select  * from categorie cat,article ar where categorie = '$categ' and cat.id = ar.id_cat limit $limit,6";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_OBJ);
      return $data;
   }
   public function getArticleById($id){
      $req = "select  * from article where id = $id ";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_OBJ);
      return $data;
   }
   public function getArticleByIdAndCateg($id, $categ)
   {
      $req = "select  * from article ar where id = $id and id_cat = (select id from categorie where nom = '$categ') ";
      $resutl = $this->bd->query($req);
      $data = $resutl->fetchAll(PDO::FETCH_OBJ);
      return $data;
   }
   public function deleteArticle($id){
      $req = "delete from article where id = ?";
      $stmt = $this->bd->prepare($req);
      return $stmt->execute([$id]);
   }
   public function addArticle($article){
      $req = "insert into article(titre,id_cat,categorie,contenu) value(?,?,?,?)";
      $stmt = $this->bd->prepare($req);
      $id_cat = $this->getIdByCategory($article->categorie);
      return $stmt->execute([$article->titre,$id_cat,$article->categorie,$article->contenu]);
   }
   public function  updateArticle($article){
      $req = "update article set titre =?,id_cat =?,categorie =?,contenu =? where id = ?";
      $stmt =$this->bd->prepare($req);
      return $stmt->execute([$article->titre,$article->id_cat,$article->categorie,$article->contenu,$article->id]);
   }
   private function getIdByCategory($categorie){
      $req = "select  id from categorie where nom=?";
      $stmt =$this->bd->prepare($req);
      return $stmt->execute([$categorie]);

   }
   public function countArticle(){
      $req = "select count(*) as nbArticle from article ";
      return $this->bd->query($req)->fetchAll(PDO::FETCH_ASSOC)[0]["nbArticle"];
   }
}
