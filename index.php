<?php
session_start();
ob_start();
require_once dirname(__FILE__) . "/controller/Controller.php";
require_once dirname(__FILE__) . "/controller/UserController.php";
include('view/head.php');
$controler = new Controller();
$userController = new UserController();
$controler->navController();
#Ajouter un ustilisateur
if(@isset($_REQUEST['adduser'])){
   $user = new stdClass();
   $user->nom = $_POST['nom'];
   $user->prenom = $_POST['prenom'];
   $user->login = $_POST['login'];
   $user->passwd = $_POST['passwd'];
   $user->role = $_POST['role'];
   $user->email = $_POST['email'];
   $userController->onAddUer($user);
}
#modifier les informations d'un utilisateur
if(@isset($_REQUEST['action'])&&$_GET['action']=='editUser'){

}
#Supprimer un utilisateur
if(@isset($_REQUEST['id'])&&$_GET['action']=='deleteUser'){
   $userController->onDeleteUser($_REQUEST['id']);

}
#ajouter categori
if(@isset($_POST['addCateg'])){
   $nom = $_POST['categName'];
   $controler->OnaddCategorie($nom);
}
#formulaire pour modifier un article
if(@isset($_GET['action'])&&$_GET['action']=='edit'){
   $controler->editArticleController($_GET['id']);
   die();
}
#supprimer un article
if(@isset($_GET['action'])&&$_GET['action']=='delete'){
   $controler->deleteArticleController($_GET['id']);
}
#supprimer une categorie
if(@isset($_GET['action'])&&$_GET['action']=='deletecat'){
   $controler->OnDeleteCategorieController($_GET['id']);
}
#modifier un article
if(@isset($_REQUEST['update'])){
   $article = new stdClass();
   $article->id = $_POST['id'];
   $article->titre = $_POST['titre'];
   $article->id_cat = $_POST['idCateg'];
   $article->categorie = $_POST['categorie'];
   $article->contenu = $_POST['contenu'];
   $controler->updateArticleController($article);
}
#sauvegarder un article
if(@isset($_REQUEST['save'])){
   $article = new stdClass();
   $article->titre = $_POST['titre'];
   $article->categorie = $_POST['categorie'];
   $article->contenu = $_POST['contenu'];
   $controler->addArticleController($article);
}
#formulaire pour ajouter un article
if(@isset($_REQUEST['add'])){
   $controler->saveArticleController();
   die();
}
#menu de navigation  
if(!empty($_REQUEST['login'])){
   $login = $_POST['login'];
   $passwd = $_POST['passwd'];
   $userController->identifierUser($login, $passwd);
}
#controle de page d'accueille
else if(@isset($_SESSION['valid'])){
   if (isset($_GET['categorie'], $_GET['id'])) {
      $controler->articleById($_GET['id'], $_GET['categorie']);
   } elseif (isset($_GET['categorie'])) {
      if ($controler->isCat($_GET['categorie'])) {
         $controler->articleByCateg($_GET['categorie'],isset($_GET['page'])?$_GET['page']:0);
      } else {
         echo "cette  categorie n\'existe pas";
      }
   } else {
      $controler->allArtcles(isset($_GET['page'])?$_GET['page']:0);
   }
}else{
   if (isset($_GET['categorie'], $_GET['id'])) {
      $controler->articleById($_GET['id'], $_GET['categorie']);
   } elseif (isset($_GET['categorie'])) {
      if ($controler->isCat($_GET['categorie'])) {
         $controler->articleByCateg($_GET['categorie'],isset($_GET['page'])?$_GET['page']:0);
      } else {
         echo "cette  categorie n\'existe pas";
      }
   } else {
      $controler->allArtcles(isset($_GET['page'])?$_GET['page']:0);
   }
}
include('./view/footer.php');
// ob_end_flush();