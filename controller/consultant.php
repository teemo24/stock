<?php
switch($route){
    case "":
    case "home":
    case "login":
    case "accueil":
        include "view/admin/home.php";
    break;
    /*-----------   ARTICLES   --------*/
    case "catalogue":
        include "view/admin/article/index.php";
    break;
    case "catalogue/article/show":
        include "view/admin/article/read.php";
    break;
    
    /*-----------   ACHATS   --------*/
    case "achats":
        include "view/admin/achats/index.php";
    break;
    case "achats/show":
        include "view/admin/achats/read.php";
    break;
    
    /*-----------   VENTES   --------*/
    case "ventes":
        include "view/admin/ventes/index.php";
    break;
    case "ventes/show":
        include "view/admin/ventes/read.php";
    break;
    

    /*-----------   Category   --------*/
    case "categories":
        include "view/admin/category/index.php";
    break;
    case "categories/show":
        include "view/admin/category/read.php";
    break;
    
    /*-----------   Emplacement   --------*/
    case "emplacements":
        include "view/admin/emplacement/index.php";
    break;
    case "emplacements/show":
        include "view/admin/emplacement/read.php";
    break;
    

    default:
        include "view/404.php";
}