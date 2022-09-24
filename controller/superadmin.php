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
    case "catalogue/article/create":
        include "view/admin/article/create.php";
        break;
    case "catalogue/article/update":
        include "view/admin/article/update.php";
    break;
    case "catalogue/article/delete":
        include "view/admin/article/delete.php";
    break;
    /*-----------   ACHATS   --------*/
    case "achats":
        include "view/admin/achats/index.php";
    break;
    case "achats/show":
        include "view/admin/achats/read.php";
    break;
    case "achats/create":
        include "view/admin/achats/create.php";
        break;
    case "achats/update":
        include "view/admin/achats/update.php";
    break;
    case "achats/delete":
        include "view/admin/achats/delete.php";
    break;

    /*-----------   VENTES   --------*/
    case "ventes":
        include "view/admin/ventes/index.php";
    break;
    case "ventes/show":
        include "view/admin/ventes/read.php";
    break;
    case "ventes/create":
        include "view/admin/ventes/create.php";
        break;
    case "ventes/update":
        include "view/admin/ventes/update.php";
    break;
    case "ventes/delete":
        include "view/admin/ventes/delete.php";
    break;

    /*-----------   USERS   --------*/
    case "users":
        include "view/admin/users/index.php";
    break;
    case "users/show":
        include "view/admin/users/read.php";
    break;
    case "users/create":
        include "view/admin/users/create.php";
        break;
    case "users/update":
        include "view/admin/users/update.php";
    break;
    case "users/delete":
        include "view/admin/users/delete.php";
    break;

    /*-----------   Category   --------*/
    case "categories":
        include "view/admin/category/index.php";
    break;
    case "categories/show":
        include "view/admin/category/read.php";
    break;
    case "categories/create":
        include "view/admin/category/create.php";
        break;
    case "categories/update":
        include "view/admin/category/update.php";
    break;
    case "categories/delete":
        include "view/admin/category/delete.php";
    break;

    /*-----------   Emplacement   --------*/
    case "emplacements":
        include "view/admin/emplacement/index.php";
    break;
    case "emplacements/show":
        include "view/admin/emplacement/read.php";
    break;
    case "emplacements/create":
        include "view/admin/emplacement/create.php";
        break;
    case "emplacements/update":
        include "view/admin/emplacement/update.php";
    break;
    case "emplacements/delete":
        include "view/admin/emplacement/delete.php";
    break;

 /*-----------   Offre   --------*/
    case "offre":
        include "view/admin/offre/index.php";
    break;
    case "offre/show":
        include "view/admin/offre/read.php";
    break;
    case "offre/create":
        include "view/admin/offre/create.php";
        break;
    case "offre/update":
        include "view/admin/offre/update.php";
    break;
    case "offre/delete":
        include "view/admin/offre/delete.php";
    break;

     /*-----------   SOCIETE   --------*/
    case "societe":
        include "view/admin/societe/index.php";
    break;
    case "societe/show":
        include "view/admin/societe/read.php";
    break;
    case "societe/create":
        include "view/admin/societe/create.php";
        break;
    case "societe/update":
        include "view/admin/societe/update.php";
    break;
    case "societe/delete":
        include "view/admin/societe/delete.php";
    break;




    /*-------------- AJAX -----------------*/


    case "achats/ajax/code":
    case "ventes/ajax/code":
        if(isset($_GET['code'])){
            $code_article = $_GET['code'];
            $codes = $db->execute("SELECT code_article,designation FROM articles WHERE code_article LIKE '$code_article%' ")->fetch_all(MYSQLI_ASSOC);          
            foreach($codes as $code):
                echo "<option value='".$code['code_article']."' data-designation='".$code['designation']."'>".$code['code_article']."</option>";
            endforeach;
        }
    break;
    case "achats/ajax/designation":
    case "ventes/ajax/designation":
        if(isset($_GET['code'])){
            $code_article = $_GET['code'];
            $code = $db->execute("SELECT designation FROM articles WHERE code_article LIKE '$code_article%' ")->fetch_all(MYSQLI_ASSOC);
            if(!empty($code)) echo $code[0]['designation'];
        }
    break;

    
     /*-----------   PERSONNEL   --------*/

    case "personnel/create":
        include "view/admin/personnel/create.php";
    break;
    case "personnel/delete":
        include "view/admin/personnel/delete.php";
    break;




    default:
        include "view/404.php";
}