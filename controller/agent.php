<?php
switch($route){
    case "":
    case "home":
    case "login":
    case "accueil":
        include "view/admin/home.php";
    break;
    /*-----------   ARTICLES   --------*/
    
    
    /*-----------   ACHATS   --------*/
    
    
    /*-----------   VENTES   --------*/
    
    

    /*-----------   Category   --------*/
    
    
    /*-----------   Emplacement   --------*/
    case "emplacements":
        include "view/admin/emplacement/index.php";
    break;
   
    

    default:
        include "view/404.php";
}