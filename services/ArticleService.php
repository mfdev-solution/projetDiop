<?php

class ArticleService{



    public function calculLimmit($page,$coucntArt)
    {
     $nbarticleParPage = 6;   
     //$nbPages =  ceil($coucntArt / $nbarticleParPage);
     return $nbarticleParPage*$page;
    }
    public function controlePage($page,$coucntArt){
        if($page<0){
            $page=0;
        }elseif(($page*6)>$coucntArt){
            $page=$page-1;
        }
        return $page;
    }

}