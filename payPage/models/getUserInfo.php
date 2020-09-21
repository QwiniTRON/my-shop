<?php

function checkToken($dbc, $token){
    $sqlToken = getSqlCheckToken($_COOKIE["token"]);
    $queryResult = $dbc->query($sqlToken);
    $response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
    return $response;
}



?>