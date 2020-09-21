<?php
require_once "../modules/getUserInfo.php";

// token
if(!empty($_COOKIE["token"])){
    $response = checkToken($dbc, $_COOKIE["token"]);
    if(count($response) > 0){
        $statusLogin = 1;
        $_SESSION["userdata"] = $response;
    }
}else{
    header("Location: /index.php");
}


?>