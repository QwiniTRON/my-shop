<?php
session_start();
require_once "./connectDB.php";
require_once "./sqllogin/sql.php";
// проверка есть ли токен, если есть то перекидывание на главную и запись в сессию id 
// 

// статусы 1 - ошибка данные не дошли 
//         2 - данного пользователя нет или что-то введено не верно 

// todo обработка ошибок


$status = 0;

if(!empty($_COOKIE["token"])){
    $sql = getSqlCheckToken($_COOKIE["token"]);
    $queryResult = $dbc->query($sql);
    $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
    if(count($response) > 0){
        header("Location: index.php");
    }
}



if( !empty($_POST["login"]) AND !empty($_POST["password"])){
    $login = $_POST["login"];
    $password = $_POST["password"];

    // db
    $sql = getSqlCheckUser($login);
    $queryResult = $dbc->query($sql);
    $userData = $queryResult->fetchAll(PDO::FETCH_ASSOC);

    if(count($userData)>0){
        if(password_verify($password, $userData[0]["password"])){
            // установка токена
            $hash = password_hash(time(), PASSWORD_DEFAULT);
            setcookie("token", $hash, time() + 60*60*24*7, "/");
            $sql = getSqlSetTokenUser($userData[0]["id"], $hash);
            $queryResult = $dbc->query($sql);
            $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["userdata"] = $userData;
            $_SESSION["oldLogin"] = true;

            header("Location: index.php");
        }else{
            $status = 2;
        }

    }else{
        $status = 2;
    }

}else{
    if(count($_POST) == 0){

    }else{
        $status = 1;
    }
}
?>

