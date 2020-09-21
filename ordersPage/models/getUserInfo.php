<?php

function checkToken($dbc, $token){
    $sqlToken = getSqlCheckToken($_COOKIE["token"]);
    $queryResult = $dbc->query($sqlToken);
    $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
    return $response;
}

function getUserOrders($dbc, $userid){
    $ordersSql = getSqlOrdersUser($userid);
    $queryResult = $dbc->query($ordersSql);
    if($queryResult){
        $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }else{
        return $queryResult;
    }
   
}


?>