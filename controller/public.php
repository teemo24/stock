<?php
switch($route){
    // case in_array($route,["home","/"]):
    //     include "view/public/home.php";
    // break;
    case "login":
        if($_SERVER['REQUEST_METHOD'] == 'POST'):
            $username = getifset($_POST['username']);
            $pass = md5(getifset($_POST['pass']));
            if($db->isLoginCorrect($username,$pass)){
                $status = $db->selectWhere("users","*","where username = '$username'")[0];
                if($status['status'] == "on"){
                    $data = $db->selectWhere("users","*","where username = '$username' && password = '$pass'")[0];
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $data["role"];
                    $_SESSION['user_id'] = $data["id"];
                    header('Location: '.URI.'home');
                }
            }
        endif;
        include "view/public/login.php";
    break;
    default:
    // die($route);
        header('Location: '.URI.'login');
        // include "view/404.php";
}