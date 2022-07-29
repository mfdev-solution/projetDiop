<?php
class GuestDomaine{

    public $id;
    public $nom;
    public $role;
    public $login;
    public $passwd;
    public $prenom;

    public function __construct( $nom, $role, $login, $passwd, $prenom){
        $this->nom = $nom;
        $this->role = $role;
        $this->login = $login;
        $this->passwd = $passwd;
        $this->prenom = $prenom;
    }
}