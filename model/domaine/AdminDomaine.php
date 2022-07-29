<?php

class AdminDomaine extends GuestDomaine 
{
    
    public function __construct($nom, $role, $login, $passwd, $prenom){
        parrent::__construct($nom, $role, $login, $passwd, $prenom);
       // super($nom, $role, $login, $passwd, $prenom);
    }

}