<?php
require_once "models/payModel.php";

if(!empty($_POST["id"]) AND !empty($_POST["count"])){
    if(!empty($_POST["cash"])){
        $resultQuery = addOrder($dbc, $_SESSION["userdata"][0]["id"], $_POST["count"], $_GET["id"], null, $_SESSION);
        if($resultQuery){
            header("Location: /payPage/pay.php?succsess=" . urlencode(1));
        }else{
            header("Location: /payPage/pay.php?succsess=" . urlencode(2));
        }
    }else{
        if(!empty($_POST["card"])){
            $resultQuery = addOrder($dbc, $_SESSION["userdata"][0]["id"], $_POST["count"], $_GET["id"], str_replace(" ", "", $_POST["card"]) , $_SESSION);
            if($resultQuery){
                header("Location: /payPage/pay.php?succsess=" . urlencode(1));
            }else{
                header("Location: /payPage/pay.php?succsess=" . urlencode(2));
            }
        }else{
            $statusError = 4; // не пришла карта для оплаты
        }
    }
}



?>