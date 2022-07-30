<?php
require_once "/var/www/html/projetDiop/model/dao/Identification.php";
require_once "/var/www/html/projetDiop/services/UserServices.php";
require_once "/var/www/html/projetDiop/model/dao/Admin.php";


class UserController{
    protected $userService;
    protected $userAdmin;
    public function __construct(){
        $this->userService = new UserServices();
        $this->userAdmin =  new Admin();
      }

    public function identifierUser($login , $passwd){
        $login = $this->userService->secureLogin($login);
        $passwd = $this->userService->secureLogin($passwd);
        $users =( new Identification())->getUsers();
        $user = $this->userService->login($users,$login,$passwd);
        if($user){
            $_SESSION['valid'] = true;
            $_SESSION['user'] = $user;
            header("Location:index.php");
            // echo "<sript> location.replace('index.php'); </sript>";
        }else{
            header("Location:./view/login.php");
        }
    }
    public function onAddUer($user){
        $user->passwd = $this->userService->hash_password($user->passwd);
        if($this->userAdmin->createUser($user)){
            header("Location:./view/admin.php");
        }else{
            echo "Error: add user failed";
        }
    }

    
}
?>