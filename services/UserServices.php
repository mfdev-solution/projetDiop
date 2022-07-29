<?php
class UserServices{
    public function __construct(){}
    public function hash_password($password) {
        return password_hash($password , PASSWORD_DEFAULT) ;
    }
    public function verifier_password($password, $password_hash) {
        return password_verify($password, $password_hash ) ;
    }

    public function login($users,$username, $password) {
        foreach($users as $user) {
            if($user->login == $username && $this->verifier_password($password , $user->passwd)) {
                return $user;
            }
        }
        return false;
    }
    public function secureLogin($param) {
        $param = htmlspecialchars($param);
        $param = htmlentities($param);
        $param = trim($param);
        return $param;
    }

}