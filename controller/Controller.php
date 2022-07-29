<?php
require_once dirname(__FILE__) . "/../model/dao/CategorieDao.php";
require_once dirname(__FILE__) . "/../model/dao/ArticleDao.php";
require_once dirname(__FILE__) . "/../view/navView.php";
require_once dirname(__FILE__) . "/../view/bodyView.php";
require_once "/var/www/html/projetDiop/services/ArticleService.php";

class Controller
{
   private $articleService;
   private $catDao;
   public function __construct()
   {
      $this->articleService = new ArticleService();
      $this->catDao = new CategorieDao();
   }
   public function navController()
   {
      nav($this->catDao->getCategorie());
   }
   public function allArtcles($page)
   {
      $articles = new ArticleDao();
      $nbArticle = $articles->countArticle();
      $page = $this->articleService->controlePage($page,$nbArticle);
      $debut = $this->articleService->calculLimmit($page,$nbArticle);
      showArticles($articles->getAllArticles($debut),$page,ceil($nbArticle/6)-1);
   }
   public function isCat($cat)
   {
      $categories = $this->catDao->getCategorie();
      foreach ($categories as $categ) {
         if ($categ->nom == $cat)
            return true;   
      }
      return false;
   }
   public function articleByCateg($categ,$page)
   {
      $articles = new ArticleDao();
      $nbArticle = $articles->countArticle();
      $page = $this->articleService->controlePage($page,$nbArticle);
      $debut = $this->articleService->calculLimmit($page,$nbArticle);
      showArticles($articles->getArticleByCat($categ,0),$page,ceil($nbArticle/6)-1);
   }
   public function articleById($id_art, $categ)
   {
      $articles = new ArticleDao();
      //$result = $articles->getArticleById($id_art, $categ);
      showArticleById($articles->getArticleByIdAndCateg($id_art, $categ));
   }
   public function editArticleController($id){
      $articleDao = new ArticleDao();
      editForm($articleDao->getArticleById($id));
   }
   public function deleteArticleController($id){
      $articleDao = new ArticleDao();
      $articleDao->deleteArticle($id);
      header('Location:index.php');
      die();
   }
   public function updateArticleController($article) {
      $articleDao = new ArticleDao();
      if($articleDao->updateArticle($article)){

         header('Location:index.php');
         die();
      }else{
         echo "updateArticle failed";
      die();
      }
   }
   #ajouter une categorie
   public function OnaddCategorie($name){
      if($this->catDao->addCategorie($name))
      header('Location:./view/editeur.php');
      else{
         echo "addCategorie failed";
      }
      die();
   }
   #supprimer une categorie
   public function OnDeleteCategorieController($id){
      if($this->catDao->deleteCategorie($id)){
         header('Location:./view/editeur.php');
      }else{
         echo "deleteCategorie failed";
      }
      die();
   }
   #ajouter un article
   public function addArticleController($article){
      $articleDao = new ArticleDao();
      if($articleDao->addArticle($article)){
         header('Location:index.php');
      }else{
         echo "updateArticle failed";
      }
      die();
   }
   #formulaire pour ajouter un article
   public function saveArticleController(){
      addForm();
   }
}
