<?php

require_once "sql/ProfileSql.php";

function UpdateFio($dbc, $userid, $newFio){
    $updateSql = getSqlUpdateFio($newFio, $userid);
    $queryResult = $dbc->query($updateSql);
    return $queryResult;
}

function UpdateAdress($dbc, $newadress, $userid){
    $updateSql = getSqlUpdateAdress($newadress, $userid);
    $queryResult = $dbc->query($updateSql);
    return $queryResult;
}

function UpdatePhone($dbc, $userid, $newPhone){
    $updateSql = getSqlUpdatePhone($newPhone, $userid);
    $queryResult = $dbc->query($updateSql);
    return $queryResult;
}

function UpdatePassword($dbc, $userid, $newPassword){
    $updateSql = getSqlUpdatePassword($newPassword, $userid);
    $queryResult = $dbc->query($updateSql);
    return $queryResult;
}

function UpdateMail($dbc, $userid, $newMail){
    $updateSql = getSqlUpdateMail($newMail, $userid);
    $queryResult = $dbc->query($updateSql);
    return $queryResult;
}

function getUserPassword($dbc, $userid){
    $updateSql = getSqlUserPassword($userid);
    $queryResult = $dbc->query($updateSql);
    if($queryResult){
        return $queryResult->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}

?>























