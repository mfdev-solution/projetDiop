<?php

require_once "GuestDomaine.php";
class EditeurDomaine extends GuestDomaine
{
    
    public function __construct($nom, $role, $login, $passwd, $prenom){
        parent::__construct($nom, $role, $login, $passwd, $prenom);
        //super($nom, $role, $login, $passwd, $prenom);
    }

}