<?php
require_once './model/dao/Admin.php';
require_once './model/domaine/EditeurDomaine.php';
require_once "/var/www/html/projetDiop/model/dao/ArticleDao.php";
require_once "/var/www/html/projetDiop/controller/UserController.php";
require_once "/var/www/html/projetDiop/services/UserServices.php";
require_once "/var/www/html/projetDiop/services/ArticleService.php";
// require_once"./services/UserServices.php";

$admin = new Admin();
$articleDao = new ArticleDao();
$controller = new UserController();
$editeur = new EditeurDomaine("Diop", "admin", "diop", "passer", "Moustapha");
$user_services = new UserServices();
// var_dump($admin->createUser($editeur));
$count = $articleDao->countArticle();
var_dump($count);
//var_dump($admin->updateUser(1,$editeur));
// var_dump($admin->deleteUser(1));
// $article
// var_dump($admin->listCategorie());
//$categorie = new Categorie();
// $service = new UserServices();
// $passwd =  $service->hash_password("fall");

// echo $service->verifier_password("fall",$passwd)?"true":"false";
// var_dump($controller->identifierUser("fall","passer"));
//$test =  "    test <script> alert('test');</script>";   
//trim($test);
// $test =  $user_services->secureLogin($test);
// echo $test;