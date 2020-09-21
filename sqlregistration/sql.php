<?php

function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlCheckPhone(string $phone): string{
    $phone = pg_escape_string($phone);
    return "select * from users where phone = '{$phone}';";
}

function getSqlCheckMail( string $mail): string{
    $mail = pg_escape_string($mail);
    return "select * from users where mail = '{$mail}';";
}

function getSqlCreateUser( string $password, string $mail, string $adress, string $fio, string $phone){
    $password = pg_escape_string($password);
    $mail = pg_escape_string($mail);
    $adress = pg_escape_string($adress);
    $fio = pg_escape_string($fio);
    $phone = pg_escape_string($phone);
    return "INSERT INTO users (password, mail, adress, fio, phone) VALUES
    ('{$password}', '{$mail}', '{$adress}', '{$fio}', '{$phone}');";
}

?>