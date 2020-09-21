<?php



function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlCheckUser(string $login): string{
    $login = pg_escape_string($login);
    return "SELECT * FROM users WHERE mail='{$login}'";
}

function getSqlSetTokenUser(string $id, string $token): string{
    $token = pg_escape_string($token);
    $id = pg_escape_string($id);
    return "UPDATE users SET token='{$token}' WHERE id::text = '{$id}';";
}

?>