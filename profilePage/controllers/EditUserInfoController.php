<?php
    require_once "models/editUserInfo.php";

    $statusEditUserInfo = 0;



    if(isset($_POST["paswBut"]) AND !empty($_POST["password"]) AND !empty($_POST["rpassword"]) ){
        $oldUserPassword = getUserPassword($dbc, $_SESSION["userdata"][0]["id"]);
        if($oldUserPassword){
            $oldUserPassword = $oldUserPassword[0]["password"];
        }
        $compareResult = password_verify($_POST["password"], $oldUserPassword);
        if($compareResult){
            $newPasswordHash = password_hash($_POST["rpassword"], PASSWORD_DEFAULT);
            UpdatePassword($dbc, $_SESSION["userdata"][0]["id"], $newPasswordHash);
            $statusEditUserInfo = 1;
        }
    }

    if(isset($_POST["fioBut"]) AND !empty($_POST["fio"])){
        if($_POST["fio"] != $_SESSION["userdata"][0]["fio"] ){
            $queryResult = UpdateFio($dbc, $_SESSION["userdata"][0]["id"], $_POST["fio"]);
            if($queryResult){
                $_SESSION["userdata"][0]["fio"] = $_POST["fio"];
                $statusEditUserInfo = 2;
            }
        }
    }

    if(isset($_POST["adresBut"]) AND !empty($_POST["adres"])){
        if($_POST["adres"] != $_SESSION["userdata"][0]["adress"] ){
            $queryResult = UpdateAdress($dbc, $_POST["adres"], $_SESSION["userdata"][0]["id"] );
            if($queryResult){
                $_SESSION["userdata"][0]["adress"] = $_POST["adres"];
                $statusEditUserInfo = 3;
            }
        }
    }

    if(isset($_POST["PhoneBut"]) AND !empty($_POST["phone"])){
        if($_POST["phone"] != $_SESSION["userdata"][0]["phone"] ){
            $queryResult = UpdatePhone($dbc, $_SESSION["userdata"][0]["id"], $_POST["phone"]);
            if($queryResult){
                $_SESSION["userdata"][0]["phone"] = $_POST["phone"];
                $statusEditUserInfo = 4;
            }
        }
    }

    if(isset($_POST["mailBut"]) AND !empty($_POST["mail"])){
        if($_POST["mail"] != $_SESSION["userdata"][0]["mail"] ){
            $queryResult = UpdateMail($dbc, $_SESSION["userdata"][0]["id"], $_POST["mail"]);
            if($queryResult){
                $_SESSION["userdata"][0]["mail"] = $_POST["mail"];
                $statusEditUserInfo = 5;
            }
        }
    }







?>