<?php
session_start();
require_once "./sqlregistration/sql.php";
require_once "./connectDB.php";

// статусы 1 - данные введены не все, 2 - ткой mail уже есть, 3 - такой номер уже есть, 4 - вы успешно зарагистрированы
$status = 0;

if(!empty($_COOKIE["token"])){
    $sql = getSqlCheckToken($_COOKIE["token"]);
    $queryResult = $dbc->query($sql);
    $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
    if(count($response) > 0){
        header("Location: index.php");
    }
}

if(!empty($_POST["email"]) AND !empty($_POST["login"]) AND !empty($_POST["phone"]) AND !empty($_POST["adress"]) AND !empty($_POST["fio"])){
    // check mail
    $sql = getSqlCheckMail($_POST["email"]);
    $queryResult = $dbc->query($sql);
    $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
    if(count($response) == 0){
        // check phone
        $sql = getSqlCheckPhone($_POST["phone"]);
        $queryResult = $dbc->query($sql);
        $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);

        // registration
        if(count($response) == 0){
            $sql = getSqlCreateUser( password_hash($_POST["login"], PASSWORD_DEFAULT), $_POST["email"], $_POST["adress"], $_POST["fio"], $_POST["phone"]);
            $queryResult = $dbc->query($sql);
            $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
            $status = 4;
        }else{
            $status = 3;
        }

    }else{
        $status = 2;
    }

}else{
    if(empty($_POST["email"]) AND empty($_POST["login"]) AND empty($_POST["phone"]) AND empty($_POST["adress"]) AND empty($_POST["fio"])){

    }else{
        $status = 1;
    }
}

?>