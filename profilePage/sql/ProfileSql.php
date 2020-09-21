<?php

// check token
function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}
// 
function getSqlUpdatePassword(string $password, string $userid): string{
    $password = pg_escape_string($password);
    $userid = pg_escape_string($userid);
    return "UPDATE users SET password = '{$password}' where id = '{$userid}';";
}
// 
function getSqlUpdateMail(string $mail, string $userid): string{
    $mail = pg_escape_string($mail);
    $userid = pg_escape_string($userid);
    return "update users set mail = '{$mail}' where id = '{$userid}'";
}
//
function getSqlUpdateFio(string $fio, string $userid): string{
    $fio = pg_escape_string($fio);
    $userid = pg_escape_string($userid);
    return "update users set fio = '{$fio}' where id = '{$userid}';";
}

function getSqlUpdatePhone(string $phone, string $userid): string{
    $phone = pg_escape_string($phone);
    $userid = pg_escape_string($userid);
    return "UPDATE users SET phone = '{$phone}' where id = '{$userid}';";
}

//
function getSqlUpdateAdress(string $adress, string $userid): string{
    $adress = pg_escape_string($adress);
    $userid = pg_escape_string($userid);
    return "update users set adress = '{$adress}' where id = '{$userid}'";
}

function getSqlUserPassword(string $userid): string{
    $userid = pg_escape_string($userid);
    return "SELECT password FROM users WHERE id  = '{$userid}'";
}


?>